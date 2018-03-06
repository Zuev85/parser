<?php

require 'Curl/curl.php';
require 'phpquery/phpQuery/phpQuery.php';

$curl = new Curl();
$query = 'ryukzaki';
$responce = $curl->get('https://www.mykite.com.ua/ru/' . $query);

$doc = phpQuery::newDocument($rgesponce->body);

$products = $doc->find('.view-content .views-row');

foreach ($products as $product) {
    $pq = pq($product);

    echo $pq->find('.views-field.views-field-title')->text() . '<br>';
    echo $pq->find('.views-field.views-field-commerce-price')->text() . '<br>';
    echo $pq->find('.views-field.views-field-field-productphoto img')->attr('src') . '<br>';
    echo '<hr>';
}

phpQuery::unloadDocuments($doc);
?>