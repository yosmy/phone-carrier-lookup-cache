<?php

namespace Yosmy\Phone\Carrier\Lookup;

/**
 * @di\service()
 */
class PickCache
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
     *
     * @return Cache
     *
     * @throws NonexistentCacheException
     */
    public function pick(
        string $provider,
        string $country,
        string $prefix,
        string $number
    ): Cache {
        /** @var Cache $cache */
        $cache = $this->manageCollection->findOne([
            'provider' => $provider,
            'country' => $country,
            'prefix' => $prefix,
            'number' => $number,
        ]);

        if (!$cache) {
            throw new NonexistentCacheException();
        }

        return $cache;
    }
}