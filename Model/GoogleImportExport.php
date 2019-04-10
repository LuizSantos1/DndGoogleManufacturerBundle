<?php

namespace Dnd\Bundle\GoogleManufacturerBundle\Model;

/**
 * Class GoogleImportExport
 *
 * @category  Class
 * @package   Dnd\Bundle\GoogleManufacturerBundle\Model
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2018 Agence Dn'D
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
final class GoogleImportExport
{
    /** @var string ATTR_IDENTIFIER */
    const ATTR_IDENTIFIER = 'googleId';
    /** @var string ATTR_BRAND */
    const ATTR_BRAND = 'googleBrand';
    /** @var string ATTR_TITLE */
    const ATTR_TITLE = 'googleTitle';
    /** @var string ATTR_GTIN */
    const ATTR_GTIN = 'googleGtin';
    /** @var string ATTR_MPN */
    const ATTR_MPN = 'googleMpn';
    /** @var string ATTR_DISCLOSURE_DATE */
    const ATTR_DISCLOSURE_DATE = 'googleDisclosureDate';
    /** @var string ATTR_RELEASE_DATE */
    const ATTR_RELEASE_DATE = 'googleReleaseDate';
    /** @var string ATTR_SUGGESTED_RETAIL_PRICE */
    const ATTR_SUGGESTED_RETAIL_PRICE = 'googleSuggestedRetailPrice';
    /** @var string ATTR_PRODUCT_NAME */
    const ATTR_PRODUCT_NAME = 'googleProductName';
    /** @var string ATTR_PRODUCT_LINE */
    const ATTR_PRODUCT_LINE = 'googleProductLine';
    /** @var string ATTR_PRODUCT_TYPE */
    const ATTR_PRODUCT_TYPE = 'googleProductType';
    /** @var string ATTR_ITEM_GROUP_ID */
    const ATTR_ITEM_GROUP_ID = 'googleItemGroupId';
    /** @var string ATTR_COLOR */
    const ATTR_COLOR = 'googleColor';
    /** @var string ATTR_ADDITIONAL_IMAGE_LINK */
    const ATTR_ADDITIONAL_IMAGE_LINK = 'googleAdditionalImageLink';
    /** @var string ATTR_VIDEO_LINK */
    const ATTR_VIDEO_LINK = 'googleVideoLink';
    /** @var string ATTR_PRODUCT_PAGE_URL */
    const ATTR_PRODUCT_PAGE_URL = 'googleProductPageUrl';
    /** @var string ATTR_FEATURE_DESCRIPTIONS */
    const ATTR_FEATURE_DESCRIPTIONS = 'googleFeatureDescription';
    /** @var string ATTR_PRODUCT_DETAILS */
    const ATTR_PRODUCT_DETAILS = 'googleProductDetail';

    /** @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE = 'googleFeatureDescriptionHeadline';
    /** @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT = 'googleFeatureDescriptionText';
    /** @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK = 'googleFeatureDescriptionImageLink';
    /** @var string ATTR_PRODUCT_DETAILS_SECTION_NAME */
    const ATTR_PRODUCT_DETAILS_SECTION_NAME = 'googleProductDetailSectionName';
    /** @var string ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME */
    const ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME = 'googleProductDetailAttributeName';
    /** @var string ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE */
    const ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE = 'googleProductDetailAttributeValue';

    /**
     * Description getGroupedProductDetails function
     *
     * @return string[]
     */
    public function getGoogleProductDetail(): array
    {
        return [
            self::ATTR_PRODUCT_DETAILS_SECTION_NAME,
            self::ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME,
            self::ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE
        ];
    }

    /**
     * Description getGroupedFeatureDescription function
     *
     * @return string[]
     */
    public static function getGoogleFeatureDescription(): array
    {
        return [
            self::ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE,
            self::ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT,
            self::ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK
        ];
    }
}