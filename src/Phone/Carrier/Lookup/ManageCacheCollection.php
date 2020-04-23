<?php

namespace Yosmy\Phone\Carrier\Lookup;

use Yosmy\Mongo;

/**
 * @di\service({
 *     private: true
 * })
 */
class ManageCacheCollection extends Mongo\BaseManageCollection
{
    /**
     * @di\arguments({
     *     uri: "%mongo_uri%",
     *     db:  "%mongo_db%"
     * })
     *
     * @param string $uri
     * @param string $db
     */
    public function __construct(
        string $uri,
        string $db
    ) {
        parent::__construct(
            $uri,
            $db,
            'yosmy_phone_carrier_lookup_caches',
            [
                'typeMap' => array(
                    'root' => Cache::class,
                ),
            ]
        );
    }
}
