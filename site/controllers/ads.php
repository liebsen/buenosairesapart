<?php 

require __DIR__ . '/../../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__ . '/../../');
$dotenv->load();

return function($kirby, $pages, $page) {

    $items = [];
    foreach($page->children()->visible() as $item){
        $items[] = $item;
    }
    return [
        'items'   => $items
    ];
};