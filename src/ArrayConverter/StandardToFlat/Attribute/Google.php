<?php

declare(strict_types=1);

namespace Dnd\Bundle\GoogleManufacturerBundle\ArrayConverter\StandardToFlat\Attribute;

use Akeneo\Pim\Enrichment\Component\Product\Connector\ArrayConverter\StandardToFlat\ProductLocalized as PimProductLocalized;
use Akeneo\Pim\Enrichment\Component\Product\Localization\Localizer\AttributeConverterInterface;
use Akeneo\Pim\Structure\Component\AttributeTypes;
use Akeneo\Pim\Structure\Component\Model\AttributeInterface;
use Akeneo\Pim\Structure\Component\Repository\AttributeRepositoryInterface;
use Akeneo\Tool\Component\Connector\ArrayConverter\ArrayConverterInterface;
use Dnd\Bundle\GoogleManufacturerBundle\Exception\GoogleManufacturerException;
use Dnd\Bundle\GoogleManufacturerBundle\Model\GoogleImportExport;
use Dnd\Bundle\GoogleManufacturerBundle\Renderer\PublicFileRenderer;
use Dnd\Bundle\GoogleManufacturerBundle\Validator\Constraints\FieldValidator;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class Google
 *
 * @package   Dnd\Bundle\GoogleManufacturerBundle\ArrayConverter\StandardToFlat\Attribute
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2020 Agence Dn'D
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
class Google extends PimProductLocalized implements ArrayConverterInterface
{
    /**
     * Description PATTERN_ATTRIBUTE_KEY_EXTRACTOR const
     *
     * @var string PATTERN_ATTRIBUTE_KEY_EXTRACTOR
     */
    private const PATTERN_ATTRIBUTE_KEY_EXTRACTOR = '/^(?P<attribute_key>%s)((?P<with_locale>\-[a-z]{2}\_[A-Z]{2})(?P<with_scope>\-.*)?)?/i';
    /**
     * Description $publicFileRenderer field
     *
     * @var PublicFileRenderer $publicFileRenderer
     */
    private $publicFileRenderer;
    /**
     * Description $violations field
     *
     * @var ConstraintViolationListInterface $violations
     */
    private $violations;

    /**
     * Google constructor
     *
     * @param ArrayConverterInterface     $converter
     * @param AttributeConverterInterface $localizer
     * @param PublicFileRenderer          $fileRenderer
     *
     * @return void
     */
    public function __construct(
        ArrayConverterInterface $converter,
        AttributeConverterInterface $localizer,
        PublicFileRenderer $fileRenderer
    ) {
        parent::__construct($converter, $localizer);

        $this->publicFileRenderer = $fileRenderer;
    }

    /** @var string[] GOOGLE_MAPPING_ATTRIBUTES */
    const GOOGLE_MAPPING_ATTRIBUTES = [
        // Mandatory
        GoogleImportExport::GOOGLE_ATTR_ID                      => GoogleImportExport::ATTR_IDENTIFIER,
        GoogleImportExport::GOOGLE_ATTR_GTIN                    => GoogleImportExport::ATTR_GTIN,
        GoogleImportExport::GOOGLE_ATTR_TITLE                   => GoogleImportExport::ATTR_TITLE,
        GoogleImportExport::GOOGLE_ATTR_BRAND                   => GoogleImportExport::ATTR_BRAND,
        GoogleImportExport::GOOGLE_ATTR_DESCRIPTION             => GoogleImportExport::ATTR_DESCRIPTION,
        GoogleImportExport::GOOGLE_ATTR_IMAGE_LINK              => GoogleImportExport::ATTR_IMAGE_LINK,
        // Optional
        GoogleImportExport::GOOGLE_ATTR_MPN                     => GoogleImportExport::ATTR_MPN,
        GoogleImportExport::GOOGLE_ATTR_PRODUCT_NAME            => GoogleImportExport::ATTR_PRODUCT_NAME,
        GoogleImportExport::GOOGLE_ATTR_PRODUCT_LINE            => GoogleImportExport::ATTR_PRODUCT_LINE,
        GoogleImportExport::GOOGLE_ATTR_PRODUCT_TYPE            => GoogleImportExport::ATTR_PRODUCT_TYPE,
        GoogleImportExport::GOOGLE_ATTR_ADDITIONAL_IMAGE_LINK   => GoogleImportExport::ATTR_ADDITIONAL_IMAGE_LINK,
        GoogleImportExport::GOOGLE_ATTR_VIDEO_LINK              => GoogleImportExport::ATTR_VIDEO_LINK,
        GoogleImportExport::GOOGLE_ATTR_PAGE_URL                => GoogleImportExport::ATTR_PRODUCT_PAGE_URL,
        GoogleImportExport::GOOGLE_ATTR_DISCLOSURE_DATE         => GoogleImportExport::ATTR_DISCLOSURE_DATE,
        GoogleImportExport::GOOGLE_ATTR_RELEASE_DATE            => GoogleImportExport::ATTR_RELEASE_DATE,
        GoogleImportExport::GOOGLE_ATTR_SUGGESTED_RETAIL_PRICE  => GoogleImportExport::ATTR_SUGGESTED_RETAIL_PRICE,
        // Grouped
        GoogleImportExport::GOOGLE_ATTR_PRODUCT_DETAIL          => GoogleImportExport::ATTR_PRODUCT_DETAILS,
        GoogleImportExport::GOOGLE_ATTR_FEATURE_DESCRIPTION     => GoogleImportExport::ATTR_FEATURE_DESCRIPTIONS,
        // Variant
        GoogleImportExport::GOOGLE_ATTR_ITEM_GROUP_ID           => GoogleImportExport::ATTR_ITEM_GROUP_ID,
        GoogleImportExport::GOOGLE_ATTR_COLOR                   => GoogleImportExport::ATTR_COLOR,
    ];
    /** @var string[] GOOGLE_MAPPING_GROUPED_ATTRIBUTES  */
    const GOOGLE_MAPPING_GROUPED_ATTRIBUTES = [
        GoogleImportExport::GOOGLE_ATTR_HEADLINE     => GoogleImportExport::ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE,
        GoogleImportExport::GOOGLE_ATTR_TEXT         => GoogleImportExport::ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT,
        GoogleImportExport::GOOGLE_ATTR_IMAGE_LINK   => GoogleImportExport::ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK,
        GoogleImportExport::GOOGLE_ATTR_SECTION_NAME => GoogleImportExport::ATTR_PRODUCT_DETAILS_SECTION_NAME,
        GoogleImportExport::GOOGLE_ATTR_NAME         => GoogleImportExport::ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME,
        GoogleImportExport::GOOGLE_ATTR_VALUE        => GoogleImportExport::ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE,
    ];

    /**
     * {@inheritdoc}
     *
     * @param mixed[] $productStandard
     * @param mixed[] $options
     *
     * @return mixed[]
     * @throws \Exception
     */
    public function convert(array $productStandard, array $options = []): array
    {
        /** @var mixed[] $convertedItem */
        $convertedItem = parent::convert($productStandard);
        /** @var mixed[]|bool $jobParameters */
        $jobParameters = $options['jobParameters'] ?? false;
        if (!$jobParameters) {
            return $convertedItem;
        }
        try {
            $this->map($convertedItem, $jobParameters, $options);
            $this->clean($convertedItem);
            if (isset($options['constraints']) && $options['constraints'] !== false) {
                $this->validate($convertedItem, $options);
            }
        } catch (ValidatorException $validatorException) {
            throw (new GoogleManufacturerException(
                sprintf('Product [%s] does not respect Google Standard. Reason: %s',
                    $productStandard['identifier'],
                    $validatorException->getMessage()
                )))->setViolations($this->violations);
        } catch (\Exception $exception) {
            throw GoogleManufacturerException::convertException($exception->getMessage());
        }

        return $convertedItem;
    }

    /**
     * Map attributes if value exist in product standard item
     *
     * @param mixed[] $convertedItem
     * @param mixed[] $jobParameters
     * @param mixed[] $options
     *
     * @return void
     */
    private function map(
        array &$convertedItem,
        array $jobParameters,
        array $options
    ): void {
        /**
         * @var string $googleKey
         * @var string $googleAttribute
         */
        foreach (self::GOOGLE_MAPPING_ATTRIBUTES as $googleKey => $googleAttribute) {
            if (!isset($jobParameters[$googleAttribute])) {
                continue;
            }
            /** @var string|mixed[] $pimAttribute */
            $pimAttribute = $attributeCode = $jobParameters[$googleAttribute];
            if (!is_scalar($pimAttribute)) {
                $this->injectGroupedAttributes($convertedItem, $pimAttribute, $googleKey, $googleAttribute, $options);

                continue;
            }
            if ($this->isScopableNorLocalizable($convertedItem, $pimAttribute)) {
                /** @var string $attributeCode */
                $attributeCode = $pimAttribute;
                /** @var string $pimAttribute */
                $pimAttribute = $this->isScopableNorLocalizable($convertedItem, $pimAttribute);
            }
            if (!isset($convertedItem[$pimAttribute])) {
                continue;
            }
            /** @var mixed $value */
            $value = $this->reformatValue($convertedItem[$pimAttribute], $attributeCode, $options);

            $convertedItem[$googleKey] = $value;
        }
    }

    /**
     * Clean the attributes not needed in the exported file
     *
     * @param mixed[] $convertedItem
     *
     * @return void
     */
    private function clean(
        array &$convertedItem
    ): void {
        /**
         * @var string $googleKey
         * @var string $googleAttribute
         */
        foreach ($convertedItem as $attributeKey => $attributeValue) {
            if (true === array_key_exists($attributeKey, self::GOOGLE_MAPPING_ATTRIBUTES)) {
                continue;
            }
            unset($convertedItem[$attributeKey]);
        }
    }

    /**
     * Description validate function
     *
     * @param mixed[] $convertedItem
     * @param mixed[] $options
     *
     * @return void
     * @throws \Exception
     */
    private function validate(
        array $convertedItem,
        array $options = []
    ): void {
        /** @var ValidatorInterface $validator */
        $validator = $options['validator'] ?? Validation::createValidator();
        /** @var mixed[] $constraints */
        $constraints = $options['constraints'] ?? FieldValidator::getConstraints();
        /** @var ConstraintViolationListInterface $violations */
        $this->violations = $validator->validate($convertedItem, $constraints);
        if (!$this->violations || count($this->violations) === 0) {
            return;
        }
        /** @var string $message */
        $message = PHP_EOL . '';
        /** @var ConstraintViolationInterface $violation */
        foreach ($this->violations as $violation) {
            $message .= sprintf(
                '- %s %s Value: %s %s',
                $violation->getPropertyPath(),
                $violation->getMessage(),
                $violation->getInvalidValue(),
                PHP_EOL
            );
        }

        throw new ValidatorException($message);
    }

    /**
     * Description reformat function
     *
     * @param string  $value
     * @param string  $attributeCode
     * @param mixed[] $options
     *
     * @return string
     */
    private function reformatValue(
        string $value,
        string $attributeCode,
        array $options
    ): string {
        if (!isset($options['attributeRepository'])) {
            return $value;
        }
        /** @var AttributeRepositoryInterface $attributeRepository */
        $attributeRepository = $options['attributeRepository'];
        /** @var AttributeInterface|null $attribute */
        $attribute = $attributeRepository->findOneByIdentifier($attributeCode);
        if (!$attribute || false === $attribute instanceof AttributeInterface) {
            return $value;
        }
        /** @var string $type */
        $type = $attribute->getType();
        if (!$value) {
            return $value;
        }
        switch ($type) {
            case AttributeTypes::IMAGE:
                /** @var string|null $publicUrl */
                $publicUrl = $this->publicFileRenderer->getBrowserUrlPath($value);
                if ($publicUrl && $publicUrl !== '') {
                    $value = $publicUrl;
                }
                break;
            case AttributeTypes::TEXTAREA:
                $value = strip_tags($value);
                break;
        }

        return $value;
    }

    /**
     * When a grouped attribute is found, we inject the values in the current item
     *
     * @param mixed[] $convertedItem
     * @param mixed[] $mappedAttributes
     * @param string  $googleKey
     * @param string  $pimAttribute
     * @param mixed[] $options
     *
     * @return void
     */
    private function injectGroupedAttributes(
        array &$convertedItem,
        array $mappedAttributes,
        string $googleKey,
        string $pimAttribute,
        array $options = []
    ): void {
        /**
         * @var int     $index
         * @var mixed[] $mappedAttribute
         */
        foreach ($mappedAttributes as $index => $mappedAttribute) {
            /** @var string $method */
            $method = sprintf('get%s', ucfirst($pimAttribute));
            if (!method_exists(GoogleImportExport::class, $method)) {
                continue;
            }
            /** @var string[] $groupedAttributeCodes */
            $groupedAttributeCodes = call_user_func(GoogleImportExport::class . sprintf('::%s', $method));
            foreach ($groupedAttributeCodes as $groupedAttributeCode) {
                if (!array_key_exists($groupedAttributeCode, $mappedAttribute)) {
                    continue;
                }
                /** @var string|null $cursor */
                $cursor = array_search($groupedAttributeCode, self::GOOGLE_MAPPING_GROUPED_ATTRIBUTES);
                if (!$cursor || !isset($mappedAttribute[$groupedAttributeCode])) {
                    continue;
                }
                /** @var string[] $values */
                $values = [];
                foreach ($mappedAttribute[$groupedAttributeCode] as $mappedAttributeCode) {
                    /** @var string $attributeCode */
                    $attributeCode = $mappedAttributeCode;
                    if ($this->isScopableNorLocalizable($convertedItem, $mappedAttributeCode)) {
                        $mappedAttributeCode = $this->isScopableNorLocalizable($convertedItem, $mappedAttributeCode);
                    }
                    if (!isset($convertedItem[$mappedAttributeCode]) || is_null($convertedItem[$mappedAttributeCode])) {
                        continue;
                    }
                    $values[] = $this->reformatValue($convertedItem[$mappedAttributeCode], $attributeCode, $options) ?? '';
                }
                if (empty($values)) {
                    continue;
                }

                $convertedItem[$googleKey][$index][$cursor] = implode(',', $values);
            }
        }
    }

    /**
     * Description isScopableNorLocalizable function
     *
     * @param mixed[] $convertedItem
     * @param string  $attribute
     *
     * @return bool|string
     */
    private function isScopableNorLocalizable(array $convertedItem, string $attribute)
    {
        /**
         * @var string $attributeKey
         * @var mixed $value
         */
        foreach ($convertedItem as $attributeKey => $value) {
            preg_match(sprintf(self::PATTERN_ATTRIBUTE_KEY_EXTRACTOR, $attribute), $attributeKey, $matches);
            if (!$matches || !isset($matches['attribute_key'])) {
                continue;
            }
            $withLocale = $withScope = false;
            if (isset($matches['with_locale'])) {
                $withLocale = true;
            }
            if (isset($matches['with_scope'])) {
                $withScope = true;
            }
            if ($withScope || $withLocale) {
                return $attributeKey;
            }
        }

        return false;
    }
}