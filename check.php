<?php
//First time Run
require 'vendor/autoload.php';
$indexParams = [
    'index' => 'my_index',
    'body' => [
        'settings' => [
            'number_of_shards' => 5,
            'number_of_replicas' => 1
        ]
    ]
];

$client = Elasticsearch\ClientBuilder::create()
    ->setSSLVerification(false)
    ->setHosts(["172.16.238.1:9200"])->build();
$response = '';
try {
    /* Create the index */
    $response = $client->indices()->create($indexParams);
    print_r($response);

    print_r($response);

} catch(Exception $e) {
    echo "Exception : ".$e->getMessage();
}
die('End : Elastic Search');

?>
