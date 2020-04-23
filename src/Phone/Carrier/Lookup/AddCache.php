<?php

namespace Yosmy\Phone\Carrier\Lookup;

use Yosmy\Mongo;

/**
 * @di\service()
 */
class AddCache
{
    /**
     * @var ManageCacheCollection
     */
    private $manageCollection;

    /**
     * @param ManageCacheCollection $manageCollection
     */
    public function __construct(
        ManageCacheCollection $manageCollection
    ) {
        $this->manageCollection = $manageCollection;
    }

    /**
     * @param string $provider
     * @param string $country
     * @param string $prefix
     * @param string $number
     * @param array  $response
     */
    public function add(
        string $provider,
        string $country,
        string $prefix,
        string $number,
        array $response
    ) {
        $this->manageCollection->insertOne([
            '_id' => uniqid(),
            'provider' => $provider,
            'country' => $country,
            'prefix' => $prefix,
            'number' => $number,
            'response' => $response,
            'date' => new Mongo\DateTime(time() * 1000),
        ]);
    }
}