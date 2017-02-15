<?php

namespace ElasticExportSchuheDE\IDL_ResultList;

use Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract;
use Plenty\Modules\Helper\Models\KeyValue;
use Plenty\Modules\Item\DataLayer\Models\RecordList;


/**
 * Class SchuheDE
 * @package ElasticExportSchuheDE\IDL_ResultList
 */
class SchuheDE
{
    const SCHUHE_DE = 141.00;

    /**
     * Creates and retrieves the extra needed data from ItemDataLayer.
     *
     * @param array $variationIds
     * @param KeyValue $settings
     * @return RecordList|string
     */
    public function getResultList($variationIds, $settings)
    {
        if(is_array($variationIds) && count($variationIds) > 0)
        {
            $searchFilter = array(
                'variationBase.hasId' => array(
                    'id' => $variationIds
                )
            );

            $resultFields = array(

                'itemBase' => array(
                    'id',
                ),

                'variationBase' => array(
                    'id',
                    'customNumber',
                ),

                'itemPropertyList' => array(
                    'params' => array(),
                    'fields' => array(
                        'itemPropertyId',
                        'propertyId',
                        'propertyValue',
                        'propertyValueType',
                    ),
                ),

                'variationStock' => array(
                    'params' => array(
                        'type' => 'virtual',
                    ),
                    'fields' => array(
                        'stockNet',
                    ),
                ),

                'variationRetailPrice' => array(
                    'params' => array(
                        'referrerId' => $settings->get('referrerId') ? $settings->get('referrerId') : self::SCHUHE_DE,
                    ),
                    'fields' => array(
                        'price',
                        'currency',
                    ),
                ),

                'variationRecommendedRetailPrice' => array(
                    'params' => array(
                        'referrerId' => $settings->get('referrerId') ? $settings->get('referrerId') : self::SCHUHE_DE,
                    ),
                    'fields' => array(
                        'price',    // uvp
                    ),
                ),
            );

            $itemDataLayer = pluginApp(ItemDataLayerRepositoryContract::class);
            /**
             * @var ItemDataLayerRepositoryContract $itemDataLayer
             */
            $itemDataLayer = $itemDataLayer->search($resultFields, $searchFilter);

            return $itemDataLayer;
        }

        return '';
    }
}