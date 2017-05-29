<?php

namespace ElasticExportSchuheDE\Generator;

use ElasticExport\Helper\ElasticExportCoreHelper;
use Plenty\Modules\DataExchange\Contracts\CSVPluginGenerator;
use Plenty\Modules\Helper\Services\ArrayHelper;
use Plenty\Modules\Item\DataLayer\Models\Record;
use Plenty\Modules\Item\DataLayer\Models\RecordList;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\Attribute\Contracts\AttributeValueNameRepositoryContract;
use Plenty\Modules\Item\Attribute\Models\AttributeValueName;
use Plenty\Modules\Item\Property\Contracts\PropertySelectionRepositoryContract;
use Plenty\Modules\Item\Property\Models\PropertySelection;


/**
 * Class SchuheDE
 * @package ElasticExportSchuheDE\Generator
 */
class SchuheDE extends CSVPluginGenerator
{
    const SCHUHE_DE = 141.00;

    /**
     * @var ElasticExportCoreHelper $elasticExportCoreHelper
     */
    private $elasticExportCoreHelper;

    /**
     * @var ArrayHelper $arrayHelper
     */
    private $arrayHelper;

    /**
     * @var AttributeValueNameRepositoryContract $attributeValueNameRepository
     */
    private $attributeValueNameRepository;

    /**
     * @var PropertySelectionRepositoryContract $propertySelectionRepository
     */
    private $propertySelectionRepository;

    /**
     * @var array $itemPropertyCache
     */
    private $itemPropertyCache = [];

    /**
     * @var array $variations
     */
    private $variations = [];

    /**
     * @var array $idlVariations
     */
    private $idlVariations = [];


    /**
     * SchuheDE constructor.
     *
     * @param ArrayHelper $arrayHelper
     * @param AttributeValueNameRepositoryContract $attributeValueNameRepository
     * @param PropertySelectionRepositoryContract $propertySelectionRepository
     */
    public function __construct(
        ArrayHelper $arrayHelper,
        AttributeValueNameRepositoryContract $attributeValueNameRepository,
        PropertySelectionRepositoryContract $propertySelectionRepository
    )
    {
        $this->arrayHelper = $arrayHelper;
        $this->attributeValueNameRepository = $attributeValueNameRepository;
        $this->propertySelectionRepository = $propertySelectionRepository;
    }

    /**
     * Generates and populates the data into the CSV file.
     *
     * @param array $resultData
     * @param array $formatSettings
     * @param array $filter
     */
    protected function generatePluginContent($resultData, array $formatSettings = [], array $filter = [])
    {
        $this->elasticExportCoreHelper = pluginApp(ElasticExportCoreHelper::class);

        if(is_array($resultData) && count($resultData['documents']) > 0)
        {
            $settings = $this->arrayHelper->buildMapFromObjectList($formatSettings, 'key', 'value');

            $this->setDelimiter(";");

            $this->addCSVContent([
                'Identnummer',
                'Artikelnummer',
                'Herstellerartikelnummer',
                'Artikelname',
                'Artikelbeschreibung',
                'Bild' . '(er)',
                '360 Grad',
                'Bestand',
                'Farbe',
                'Farbe Suche I',
                'Farbe Suche II',
                'Hersteller Farbbezeichnung',
                'GG Größengang',
                'Größe',
                'Marke',
                'Saison',
                'EAN',
                'Währung',
                'Versandkosten',
                'Info Versandkosten',
                'Preis' . ' (UVP)',
                'reduzierter Preis',
                'Grundpreis',
                'Grundpreis Einheit',
                'Kategorien',
                'Link',
                'Anzahl Verkäufe',
                'Schuhbreite',
                'Absatzhöhe',
                'Absatzform',
                'Schuhspitze',
                'Obermaterial',
                'Schaftweite',
                'Schafthöhe',
                'Materialzusammensetzung',
                'Besonderheiten',
                'Verschluss',
                'Innenmaterial',
                'Sohle',
                'Größenhinweis',
                'Wechselfussbett',
                'Wasserdicht',
                'Promotion',
                'URL Video',
                'Steuersatz',
                'ANWR schuh Trend',
            ]);

            //Generates a RecordList form the ItemDataLayer for the given variations
            $idlResultList = $this->generateIdlList($resultData, $settings, $filter);

            //Creates an array with the variationId as key to surpass the sorting problem
            if(isset($idlResultList) && $idlResultList instanceof RecordList)
            {
                $this->createIdlArray($idlResultList);
            }

            foreach($resultData['documents'] as $variation)
            {
                $variationAttributes = $this->getVariationAttributes($variation, $settings);

                if($this->handled($variation['data']['item']['id'], $variationAttributes))
                {
                    continue;
                }

                $itemName = strlen($this->elasticExportCoreHelper->getName($variation, $settings, 256)) <= 0 ? $variation['id'] : $this->elasticExportCoreHelper->getName($variation, $settings, 256);

                $rrp = $this->elasticExportCoreHelper->getRecommendedRetailPrice($this->idlVariations[$variation['id']]['variationRecommendedRetailPrice.price'], $settings);
                $price = $this->idlVariations[$variation['id']]['variationRetailPrice.price'];

                $rrp = $rrp > $price ? $rrp : $price;
                $price = $rrp > $price ? $price : $rrp;

                $basePriceList = $this->elasticExportCoreHelper->getBasePriceList($variation, (float) $this->idlVariations[$variation['id']]['variationRetailPrice.price'], $settings->get('lang'));

                $deliveryCost = $this->elasticExportCoreHelper->getShippingCost($variation['data']['item']['id'], $settings);
                if(!is_null($deliveryCost))
                {
                    $deliveryCost = number_format((float)$deliveryCost, 2, '.', '');
                }
                else
                {
                    $deliveryCost = '';
                }

                $data = [
                    'Identnummer'                   => $variation['id'],
                    'Artikelnummer'                 => $this->idlVariations[$variation['id']]['variationBase.customNumber'],
                    'Herstellerartikelnummer'       => $variation['data']['variation']['model'],
                    'Artikelname'                   => $itemName,
                    'Artikelbeschreibung'           => $this->elasticExportCoreHelper->getDescription($variation, $settings, 256),
                    'Bild' . '(er)'                 => $this->getImages($variation, $settings, ';'),
                    '360 Grad'                      => $this->getProperty($variation, $settings, '360_view_url'),
                    'Bestand'                       => $this->getStock($variation),
                    'Farbe'                         => $this->getProperty($variation, $settings, 'color'),
                    'Farbe Suche I'                 => $this->getProperty($variation, $settings, 'color_1'),
                    'Farbe Suche II'                => $this->getProperty($variation, $settings, 'color_2'),
                    'Hersteller Farbbezeichnung'    => $this->getProperty($variation, $settings, 'producer_color'),
                    'GG Größengang'                 => $this->getProperty($variation, $settings, 'size_range'),
                    'Größe'                         => $this->getProperty($variation, $settings, 'size'),
                    'Marke'                         => $this->elasticExportCoreHelper->getExternalManufacturerName((int)$variation['data']['item']['manufacturer']['id']),
                    'Saison'                        => $this->getProperty($variation, $settings, 'season'),
                    'EAN'                           => $this->elasticExportCoreHelper->getBarcodeByType($variation, $settings->get('barcode')),
                    'Währung'                       => $this->getCurrency($variation),
                    'Versandkosten'                 => $deliveryCost,
                    'Info Versandkosten'            => $this->getProperty($variation, $settings, 'shipping_costs_info'),
                    'Preis' . ' (UVP)'              => number_format((float)$rrp, 2, '.', ''),
                    'reduzierter Preis'             => number_format((float)$price, 2, '.', ''),
                    'Grundpreis'                    => $this->elasticExportCoreHelper->getBasePrice($variation, $this->idlVariations[$variation['id']], $settings->get('lang')),
                    'Grundpreis Einheit'            => $basePriceList['lot'],
                    'Kategorien'                    => $this->elasticExportCoreHelper->getCategory((int)$variation['data']['defaultCategories'][0]['id'], $settings->get('lang'), $settings->get('plentyId')),
                    'Link'                          => $this->elasticExportCoreHelper->getUrl($variation, $settings),
                    'Anzahl Verkäufe'               => $this->getProperty($variation, $settings, 'sold_items'),
                    'Schuhbreite'                   => $this->getProperty($variation, $settings, 'shoe_width'),
                    'Absatzhöhe'                    => $this->getProperty($variation, $settings, 'heel_height'),
                    'Absatzform'                    => $this->getProperty($variation, $settings, 'heel_form'),
                    'Schuhspitze'                   => $this->getProperty($variation, $settings, 'shoe_tip'),
                    'Obermaterial'                  => $this->getProperty($variation, $settings, 'upper_material'),
                    'Schaftweite'                   => $this->getProperty($variation, $settings, 'calf_size'),
                    'Schafthöhe'                    => $this->getProperty($variation, $settings, 'calf_height'),
                    'Materialzusammensetzung'       => $this->getProperty($variation, $settings, 'material_composition'),
                    'Besonderheiten'                => $this->getProperty($variation, $settings, 'features'),
                    'Verschluss'                    => $this->getProperty($variation, $settings, 'fastener'),
                    'Innenmaterial'                 => $this->getProperty($variation, $settings, 'interior_material'),
                    'Sohle'                         => $this->getProperty($variation, $settings, 'sole'),
                    'Größenhinweis'                 => $this->getProperty($variation, $settings, 'size_advice'),
                    'Wechselfussbett'               => $this->getProperty($variation, $settings, 'removable_insole'),
                    'Wasserdicht'                   => $this->getProperty($variation, $settings, 'waterproof'),
                    'Promotion'                     => $this->getProperty($variation, $settings, 'promotion'),
                    'URL Video'                     => $this->getProperty($variation, $settings, 'video_url'),
                    'Steuersatz'                    => $this->getProperty($variation, $settings, 'tax'),
                    'ANWR schuh Trend'              => $this->getProperty($variation, $settings, 'shoe_trend'),
                ];

                $this->addCSVContent(array_values($data));
            }
        }
    }

    /**
     * Get property.
     *
     * @param  array    $variation
     * @param  KeyValue $settings
     * @param  string   $property
     * @return string
     */
    private function getProperty($variation, KeyValue $settings, string $property):string
    {
        $variationAttributes = $this->getVariationAttributes($variation, $settings);

        if(array_key_exists($property, $variationAttributes))
        {
            return $variationAttributes[$property];
        }

        $itemPropertyList = $this->getItemPropertyList($variation);

        if(array_key_exists($property, $itemPropertyList))
        {
            return $itemPropertyList[$property];
        }

        return '';
    }

    /**
     * Get item properties.
     *
     * @param   array   $variation
     * @return  array<string,string>
     */
    private function getItemPropertyList($variation):array
    {
        if(!array_key_exists($variation['data']['item']['id'], $this->itemPropertyCache))
        {
            $characterMarketComponentList = $this->elasticExportCoreHelper->getItemCharactersByComponent($this->idlVariations[$variation['id']], self::SCHUHE_DE);

            $list = [];

            if(count($characterMarketComponentList))
            {
                foreach($characterMarketComponentList as $data)
                {
                    if((string) $data['characterValueType'] != 'file' && (string) $data['characterValueType'] != 'empty' && (string) $data['externalComponent'] != "0")
                    {
                        if((string) $data['characterValueType'] == 'selection')
                        {
                            $propertySelection = $this->propertySelectionRepository->findOne((int) $data['characterValue'], 'de');
                            if($propertySelection instanceof PropertySelection)
                            {
                                $list[(string) $data['externalComponent']] = (string) $propertySelection->name;
                            }
                        }
                        else
                        {
                            $list[(string) $data['externalComponent']] = (string) $data['characterValue'];
                        }

                    }
                }
            }

            $this->itemPropertyCache[$variation['data']['item']['id']] = $list;
        }

        return $this->itemPropertyCache[$variation['data']['item']['id']];
    }

    /**
     * Get available stock.
     *
     * @param  array    $variation
     * @return int
     */
    private function getStock($variation):int
    {
        $lowStockLimit = 10;
        $stock = 0;

        $stockLimitation = $variation['data']['variation']['stockLimitation'];
        $stockNet = $this->idlVariations[$variation['id']]['variationStock.stockNet'];

        // Item stock
        if((int) $stockLimitation == 1 && (int) $stockNet <= 0)
        {
            $stock = 0;
        }
        elseif(	(int) $stockLimitation == 1 &&
            $lowStockLimit > 0 &&
            (int) $stockNet > 0 &&
            (int) $stockNet <= $lowStockLimit
        )
        {
            $stock = 1;
        }
        elseif((int) $stockNet > 0)
        {
            $stock = (int) $stockNet;
        }
        else
        {
            $stock = $lowStockLimit;
        }

        return $stock;
    }

    /**
     * Get variation attributes.
     *
     * @param  array    $variation
     * @param  KeyValue $settings
     * @return array<string,string>
     */
    private function getVariationAttributes($variation, KeyValue $settings)
    {
        $variationAttributes = [];

        foreach($variation['data']['attributes'] as $variationAttribute)
        {
            $attributeValueName = $this->attributeValueNameRepository->findOne($variationAttribute['valueId'], $settings->get('lang'));

            if($attributeValueName instanceof AttributeValueName)
            {
                if($attributeValueName->attributeValue->attribute->amazonAttribute == 'Color')
                {
                    $variationAttributes['color'][] = $attributeValueName->name;
                }

                if($attributeValueName->attributeValue->attribute->amazonAttribute == 'Size')
                {
                    $variationAttributes['size'][] = $attributeValueName->name;
                }
            }
        }

        $list = [];

        foreach($variationAttributes as $key => $value)
        {
            if(is_array($value) && count($value))
            {
                $list[$key] = implode(', ', $value);
            }
        }

        return $list;
    }

    /**
     * Check if attributes were already handled.
     *
     * @param  int  $itemId
     * @param  array<string,string> $variationAttributes
     * @return bool
     */
    private function handled(int $itemId, array $variationAttributes):bool
    {
        $attributes = $this->hashAttributes($itemId, $variationAttributes);

        if(in_array($attributes, $this->variations))
        {
            return true;
        }

        $this->variations[] = $attributes;

        return false;
    }

    /**
     * Generate attributes hash.
     *
     * @param  int  $itemId
     * @param  array<string,string> $variationAttributes
     * @return string
     */
    private function hashAttributes(int $itemId, array $variationAttributes):string
    {
        $attributes = (string) $itemId;

        if(count($variationAttributes))
        {
            $attributes .= implode(';', $variationAttributes);
        }

        return $attributes;
    }

    /**
     * Get list of categories.
     *
     * @param  array    $variation
     * @param  KeyValue $settings
     * @return string
     */
    private function getCategories($variation, KeyValue $settings):string
    {
        $categoryList = [];

        // go though the list of the category details
        foreach($variation['data']['categories']['all'] as $category)
        {
            // pass the category id to construct the category path
            $category = $this->elasticExportCoreHelper->getCategory((int)$category['id'], $settings->get('lang'), $settings->get('plentyId'));

            if(strlen($category))
            {
                $categoryList[] = $category;
            }
        }

        return implode(';', $categoryList);
    }

    /**
     * Get images.
     *
     * @param  array    $variation
     * @param  KeyValue $settings
     * @param  string   $separator  = ','
     * @param  string   $imageType  = 'normal'
     * @return string
     */
    public function getImages($variation, KeyValue $settings, string $separator = ',', string $imageType = 'normal'):string
    {
        $list = $this->elasticExportCoreHelper->getImageList($variation, $settings, $imageType);

        if(count($list))
        {
            return implode($separator, $list);
        }

        return '';
    }

    /**
     * Get the RetailPrice currency of the variation.
     *
     * @param array $variation
     * @return string
     */
    private function getCurrency($variation):string
    {
        //Greb the information from the IDL RetailPrice currency
        if(strlen($this->idlVariations[$variation['id']]['variationRetailPrice.currency']) > 0)
        {
            return $this->idlVariations[$variation['id']]['variationRetailPrice.currency'];
        }

        return '';
    }

    /**
     * Creates a list of Records from the given variations.
     *
     * @param array     $resultData
     * @param KeyValue  $settings
     * @param array     $filter
     * @return RecordList|string
     */
    private function generateIdlList($resultData, $settings, $filter)
    {
        //Create a List of all VariationIds
        $variationIdList = array();
        foreach($resultData['documents'] as $variation)
        {
            $variationIdList[] = $variation['id'];
        }

        //Get the missing fields in ES from IDL(ItemDataLayer)
        if(is_array($variationIdList) && count($variationIdList) > 0)
        {
            /**
             * @var \ElasticExportSchuheDE\IDL_ResultList\SchuheDE $idlResultList
             */
            $idlResultList = pluginApp(\ElasticExportSchuheDE\IDL_ResultList\SchuheDE::class);

            //Return the list of results for the given variation ids
            return $idlResultList->getResultList($variationIdList, $settings, $filter);
        }

        return '';
    }

    /**
     * Creates an array with the rest of data needed from the IDL(ItemDataLayer).
     *
     * @param RecordList $idlResultList
     */
    private function createIdlArray($idlResultList)
    {
        if($idlResultList instanceof RecordList)
        {
            foreach($idlResultList as $idlVariation)
            {
                if($idlVariation instanceof Record)
                {
                    $this->idlVariations[$idlVariation->variationBase->id] = [
                        'itemBase.id' => $idlVariation->itemBase->id,
                        'variationBase.id' => $idlVariation->variationBase->id,
                        'variationBase.customNumber' => $idlVariation->variationBase->customNumber,
                        'itemPropertyList' => $idlVariation->itemPropertyList,
                        'variationStock.stockNet' => $idlVariation->variationStock->stockNet,
                        'variationRetailPrice.price' => $idlVariation->variationRetailPrice->price,
                        'variationRetailPrice.currency' => $idlVariation->variationRetailPrice->currency,
                        'variationRecommendedRetailPrice.price' => $idlVariation->variationRecommendedRetailPrice->price,
                    ];
                }
            }
        }
    }
}
