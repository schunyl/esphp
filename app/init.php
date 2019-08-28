<?php

require_once 'vendor/autoload.php';

//$indexParams = [
//    'index' => 'my_index',
//    'body' => [
//        'settings' => [
//            'number_of_shards' => 5,
//            'number_of_replicas' => 1
//        ]
//    ]
//];

/**
 * $hosts = ["IP_ADD":"PORT"]
 */
$hosts = ["172.16.238.1:9200"];
$client = Elasticsearch\ClientBuilder::create()
    ->setSSLVerification(false)
    ->setHosts($hosts)->build();

