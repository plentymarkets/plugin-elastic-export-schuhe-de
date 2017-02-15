<?php

namespace ElasticExportSchuheDE\Filter;

use Plenty\Modules\DataExchange\Contracts\FiltersForElasticSearchContract;
use Plenty\Plugin\Application;


/**
 * Class SchuheDE
 * @package ElasticExportSchuheDE\Filter
 */
class SchuheDE extends FiltersForElasticSearchContract
{
    /**
     * @var Application $app
     */
    private $app;


    /**
     * SchuheDE constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Pass an empty array to the filter, because is not needed anymore.
     *
     * @return array
     */
    public function generateElasticSearchFilter():array
    {
        $searchFilter = array();

        return $searchFilter;
    }
}