<?php

namespace TaHUoP\Contracts\Structures\BTree;


use TaHUoP\Structures\BTree\BTree;

interface Importer
{
    public function import() : BTree;
}