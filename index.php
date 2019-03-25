<?php

use TaHUoP\Structures\BTree\Importers\RandomImporter;
use TaHUoP\Structures\BTree\Renderers\HTMLRenderer;

require __DIR__  . '/vendor/autoload.php';

$importer = new RandomImporter(
    $_GET['nodes_num'] ?: 31,
    $_GET['min_node_value'] ?: 0,
    $_GET['max_node_value'] ?: 20
);
$renderer = new HTMLRenderer();

$tree = $importer->import();
var_dump($tree->findMaxSum()['sum']);
$renderer->render($tree);