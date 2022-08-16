<?php

require __DIR__.'/vendor/autoload.php';


use Monolog\Logger;
use Monolog\Handler\StreamHandler;

spl_autoload_register(function (string $className) {
    require_once $className . '.php';
});


// $endpoint = 'http://127.0.0.1:8000/api/v1/offers';
$endpoint = file_get_contents('test.json');

$reader = new Reader();
$offersCollection = $reader->read($endpoint);
$productIterator = $offersCollection->getIterator();


$subcommands = [
    
    'count_by_price_range' => function (Iterator $productIterator, array $argv) 
    {
            return new PriceRangeIterator($productIterator, $argv[2], $argv[3]);
    },
    'count_by_vendor_id' => function (Iterator $productIterator, array $argv) 
    {
            return new VendorIdIterator($productIterator, $argv[2]);
    }
];


$count = iterator_count($subcommands[$argv[1]]($productIterator, $argv));

switch($argv[1]){

    case 'count_by_price_range':
        echo $count . " offer(s) match the price range you provided.";
        $logMessage = "Price Range Request From " . $argv[2] . " to " . $argv[3] . " on " . date('d-m-y') . ", returned a count of ". $count;
        break;
    
    case 'count_by_vendor_id':
        echo $count . " vendor(s) match the vendor id you provided.";
        $logMessage = "Request Using Vendor Id " . $argv[2] . " on " . date('d-m-y') . ", returned a count of ". $count;
        break;
}

$logger = new Logger('Json-CLI Logger');
$logger->pushHandler(new StreamHandler(__DIR__.'/var/logs/json-cli.log'));
$logger->info($logMessage);
