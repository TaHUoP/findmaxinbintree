<?php

namespace TaHUoP\Contracts\Structures\BTree;


use TaHUoP\Structures\BTree\BTree;

interface Renderer
{
    public function render(BTree $tree);
}