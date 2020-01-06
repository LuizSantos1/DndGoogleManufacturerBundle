<?php

declare(strict_types=1);

namespace Dnd\Google\Manufacturer\Component\Model;

/**
 * Class GoogleImportExport
 *
 * @package   Dnd\Google\Manufacturer\Component\Model
 * @author    Agence Dn'D <contact@dnd.fr>
 * @copyright 2020 Agence Dn'D
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @link      https://www.dnd.fr/
 */
final class GoogleImportExport
{
    /**
     * Description ACCEPTANCE_LOW const
     *
     * @var string ACCEPTANCE_LOW
     */
    const ACCEPTANCE_LOW = 'low';
    /**
     * Description ACCEPTANCE_MEDIUM const
     *
     * @var string ACCEPTANCE_MEDIUM
     */
    const ACCEPTANCE_MEDIUM = 'medium';
    /**
     * Description ACCEPTANCE_HIGH const
     *
     * @var string ACCEPTANCE_HIGH
     */
    const ACCEPTANCE_HIGH = 'high';

    /**
     * Description GOOGLE_ATTR_ID const
     *
     * @var string GOOGLE_ATTR_ID
     */
    const GOOGLE_ATTR_ID = 'g:id';
    /**
     * Description GOOGLE_ATTR_BRAND const
     *
     * @var string GOOGLE_ATTR_BRAND
     */
    const GOOGLE_ATTR_BRAND = 'g:brand';
    /**
     * Description GOOGLE_ATTR_DESCRIPTION const
     *
     * @var string GOOGLE_ATTR_DESCRIPTION
     */
    const GOOGLE_ATTR_DESCRIPTION = 'g:description';
    /**
     * Description GOOGLE_ATTR_TITLE const
     *
     * @var string GOOGLE_ATTR_TITLE
     */
    const GOOGLE_ATTR_TITLE = 'g:title';
    /**
     * Description GOOGLE_ATTR_GTIN const
     *
     * @var string GOOGLE_ATTR_GTIN
     */
    const GOOGLE_ATTR_GTIN = 'g:gtin';
    /**
     * Description GOOGLE_ATTR_MPN const
     *
     * @var string GOOGLE_ATTR_MPN
     */
    const GOOGLE_ATTR_MPN = 'g:mpn';
    /**
     * Description GOOGLE_ATTR_PAGE_URL const
     *
     * @var string GOOGLE_ATTR_PAGE_URL
     */
    const GOOGLE_ATTR_PAGE_URL = 'g:product_page_url';
    /**
     * Description GOOGLE_ATTR_DISCLOSURE_DATE const
     *
     * @var string GOOGLE_ATTR_DISCLOSURE_DATE
     */
    const GOOGLE_ATTR_DISCLOSURE_DATE = 'g:disclosure_date';
    /**
     * Description GOOGLE_ATTR_RELEASE_DATE const
     *
     * @var string GOOGLE_ATTR_RELEASE_DATE
     */
    const GOOGLE_ATTR_RELEASE_DATE = 'g:release_date';
    /**
     * Description GOOGLE_ATTR_SUGGESTED_RETAIL_PRICE const
     *
     * @var string GOOGLE_ATTR_SUGGESTED_RETAIL_PRICE
     */
    const GOOGLE_ATTR_SUGGESTED_RETAIL_PRICE = 'g:suggested_retail_price';
    /**
     * Description GOOGLE_ATTR_PRODUCT_NAME const
     *
     * @var string GOOGLE_ATTR_PRODUCT_NAME
     */
    const GOOGLE_ATTR_PRODUCT_NAME = 'g:product_name';
    /**
     * Description GOOGLE_ATTR_PRODUCT_LINE const
     *
     * @var string GOOGLE_ATTR_PRODUCT_LINE
     */
    const GOOGLE_ATTR_PRODUCT_LINE = 'g:product_line';
    /**
     * Description GOOGLE_ATTR_PRODUCT_TYPE const
     *
     * @var string GOOGLE_ATTR_PRODUCT_TYPE
     */
    const GOOGLE_ATTR_PRODUCT_TYPE = 'g:product_type';
    /**
     * Description GOOGLE_ATTR_ITEM_GROUP_ID const
     *
     * @var string GOOGLE_ATTR_ITEM_GROUP_ID
     */
    const GOOGLE_ATTR_ITEM_GROUP_ID = 'g:item_group_id';
    /**
     * Description GOOGLE_ATTR_COLOR const
     *
     * @var string GOOGLE_ATTR_COLOR
     */
    const GOOGLE_ATTR_COLOR = 'g:color';
    /**
     * Description GOOGLE_ATTR_VIDEO_LINK const
     *
     * @var string GOOGLE_ATTR_VIDEO_LINK
     */
    const GOOGLE_ATTR_VIDEO_LINK = 'g:video_link';
    /**
     * Description GOOGLE_ATTR_ADDITIONAL_IMAGE_LINK const
     *
     * @var string GOOGLE_ATTR_ADDITIONAL_IMAGE_LINK
     */
    const GOOGLE_ATTR_ADDITIONAL_IMAGE_LINK = 'g:additional_image_link';
    /**
     * Description GOOGLE_ATTR_PRODUCT_DETAIL const
     *
     * @var string GOOGLE_ATTR_PRODUCT_DETAIL
     */
    const GOOGLE_ATTR_PRODUCT_DETAIL = 'g:product_detail';
    /**
     * Description GOOGLE_ATTR_FEATURE_DESCRIPTION const
     *
     * @var string GOOGLE_ATTR_FEATURE_DESCRIPTION
     */
    const GOOGLE_ATTR_FEATURE_DESCRIPTION = 'g:feature_description';
    /**
     * Description GOOGLE_ATTR_HEADLINE const
     *
     * @var string GOOGLE_ATTR_HEADLINE
     */
    const GOOGLE_ATTR_HEADLINE = 'g:headline';
    /**
     * Description GOOGLE_ATTR_TEXT const
     *
     * @var string GOOGLE_ATTR_TEXT
     */
    const GOOGLE_ATTR_TEXT = 'g:text';
    /**
     * Description GOOGLE_ATTR_IMAGE_LINK const
     *
     * @var string GOOGLE_ATTR_IMAGE_LINK
     */
    const GOOGLE_ATTR_IMAGE_LINK = 'g:image_link';
    /**
     * Description GOOGLE_ATTR_SECTION_NAME const
     *
     * @var string GOOGLE_ATTR_SECTION_NAME
     */
    const GOOGLE_ATTR_SECTION_NAME = 'g:section_name';
    /**
     * Description GOOGLE_ATTR_NAME const
     *
     * @var string GOOGLE_ATTR_NAME
     */
    const GOOGLE_ATTR_NAME = 'g:attribute_name';
    /**
     * Description GOOGLE_ATTR_VALUE const
     *
     * @var string GOOGLE_ATTR_VALUE
     */
    const GOOGLE_ATTR_VALUE = 'g:attribute_value';

    /**
     * Description ATTR_URL const
     *
     * @var string ATTR_URL
     */
    const ATTR_URL = 'googleUrl';
    /**
     * Description ATTR_ACCEPTANCE const
     *
     * @var string ATTR_ACCEPTANCE
     */
    const ATTR_ACCEPTANCE = 'googleAcceptance';
    /**
     * Description ATTR_IDENTIFIER const
     *
     * @var string ATTR_IDENTIFIER
     */
    const ATTR_IDENTIFIER = 'googleId';
    /**
     * Description ATTR_BRAND const
     *
     * @var string ATTR_BRAND
     */
    const ATTR_BRAND = 'googleBrand';
    /**
     * Description ATTR_TITLE const
     *
     * @var string ATTR_TITLE
     */
    const ATTR_TITLE = 'googleTitle';
    /**
     * Description ATTR_DESCRIPTION const
     *
     * @var string ATTR_DESCRIPTION
     */
    const ATTR_DESCRIPTION = 'googleDescription';
    /**
     * Description ATTR_GTIN const
     *
     * @var string ATTR_GTIN
     */
    const ATTR_GTIN = 'googleGtin';
    /**
     * Description ATTR_MPN const
     *
     * @var string ATTR_MPN
     */
    const ATTR_MPN = 'googleMpn';
    /**
     * Description ATTR_DISCLOSURE_DATE const
     *
     * @var string ATTR_DISCLOSURE_DATE
     */
    const ATTR_DISCLOSURE_DATE = 'googleDisclosureDate';
    /**
     * Description ATTR_RELEASE_DATE const
     *
     * @var string ATTR_RELEASE_DATE
     */
    const ATTR_RELEASE_DATE = 'googleReleaseDate';
    /**
     * Description ATTR_SUGGESTED_RETAIL_PRICE const
     *
     * @var string ATTR_SUGGESTED_RETAIL_PRICE
     */
    const ATTR_SUGGESTED_RETAIL_PRICE = 'googleSuggestedRetailPrice';
    /**
     * Description ATTR_PRODUCT_NAME const
     *
     * @var string ATTR_PRODUCT_NAME
     */
    const ATTR_PRODUCT_NAME = 'googleProductName';
    /**
     * Description ATTR_PRODUCT_LINE const
     *
     * @var string ATTR_PRODUCT_LINE
     */
    const ATTR_PRODUCT_LINE = 'googleProductLine';
    /**
     * Description ATTR_PRODUCT_TYPE const
     *
     * @var string ATTR_PRODUCT_TYPE
     */
    const ATTR_PRODUCT_TYPE = 'googleProductType';
    /**
     * Description ATTR_ITEM_GROUP_ID const
     *
     * @var string ATTR_ITEM_GROUP_ID
     */
    const ATTR_ITEM_GROUP_ID = 'googleItemGroupId';
    /**
     * Description ATTR_COLOR const
     *
     * @var string ATTR_COLOR
     */
    const ATTR_COLOR = 'googleColor';
    /**
     * Description ATTR_IMAGE_LINK const
     *
     * @var string ATTR_IMAGE_LINK
     */
    const ATTR_IMAGE_LINK = 'googleImageLink';
    /**
     * Description ATTR_ADDITIONAL_IMAGE_LINK const
     *
     * @var string ATTR_ADDITIONAL_IMAGE_LINK
     */
    const ATTR_ADDITIONAL_IMAGE_LINK = 'googleAdditionalImageLink';
    /**
     * Description ATTR_VIDEO_LINK const
     *
     * @var string ATTR_VIDEO_LINK
     */
    const ATTR_VIDEO_LINK = 'googleVideoLink';
    /**
     * Description ATTR_PRODUCT_PAGE_URL const
     *
     * @var string ATTR_PRODUCT_PAGE_URL
     */
    const ATTR_PRODUCT_PAGE_URL = 'googleProductPageUrl';
    /**
     * Description ATTR_FEATURE_DESCRIPTIONS const
     *
     * @var string ATTR_FEATURE_DESCRIPTIONS
     */
    const ATTR_FEATURE_DESCRIPTIONS = 'googleFeatureDescription';
    /**
     * Description ATTR_PRODUCT_DETAILS const
     *
     * @var string ATTR_PRODUCT_DETAILS
     */
    const ATTR_PRODUCT_DETAILS = 'googleProductDetail';

    /**
     * Description ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE const
     *
     * @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE
     */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_HEADLINE = 'googleFeatureDescriptionHeadline';
    /**
     * Description ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT const
     *
     * @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT
     */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_TEXT = 'googleFeatureDescriptionText';
    /**
     * Description ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK const
     *
     * @var string ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK
     */
    const ATTR_PRODUCT_FEATURE_DESCRIPTION_IMAGE_LINK = 'googleFeatureDescriptionImageLink';
    /**
     * Description ATTR_PRODUCT_DETAILS_SECTION_NAME const
     *
     * @var string ATTR_PRODUCT_DETAILS_SECTION_NAME
     */
    const ATTR_PRODUCT_DETAILS_SECTION_NAME = 'googleProductDetailSectionName';
    /**
     * Description ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME const
     *
     * @var string ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME
     */
    const ATTR_PRODUCT_DETAILS_ATTRIBUTE_NAME = 'googleProductDetailAttributeName';
    /**
     * Description ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE const
     *
     * @var string ATTR_PRODUCT_DETAILS_ATTRIBUTE_VALUE
     */
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
