<?php

namespace TaHUoP\Structures\BTree;

class BNode
{
    const LEFT_SIDE = 'left';
    const RIGHT_SIDE = 'right';

    /**
     * @var BNode
     */
    private $left_child;

    /**
     * @var BNode
     */
    private $right_child;

    /**
     * @var int
     */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @param string $side
     *
     * @return null|BNode
     */
    private function getChild(string $side) : ?BNode
    {
        return $this->{$side . '_child'};
    }

    /**
     * @param string $side
     *
     * @param BNode $node
     */
    private function setChild(string $side, BNode $node) : void
    {
        $this->{$side . '_child'} = $node;
    }

    /**
     * @return null|BNode
     */
    public function getLeftChild() : ?BNode
    {
        return $this->getChild(self::LEFT_SIDE);
    }

    /**
     * @param BNode $node
     */
    public function setLeftChild(BNode $node) : void
    {
        $this->setChild(self::LEFT_SIDE, $node);
    }
    
    /**
     * @return null|BNode
     */
    public function getRightChild() : ?BNode
    {
        return $this->getChild(self::RIGHT_SIDE);
    }

    /**
     * @param BNode $node
     */
    public function setRightChild(BNode $node) : void
    {
        $this->setChild(self::RIGHT_SIDE, $node);
    }

    /**
     * @return array
     */
    public function getChildren() : array
    {
        return [
            self::LEFT_SIDE => $this->left_child,
            self::RIGHT_SIDE => $this->right_child
        ];
    }

    /**
     * @return bool
     */
    public function hasChildren() : bool
    {
        return !empty(array_filter($this->getChildren()));
    }
    
    /**
     * @return int
     */
    public function getValue() : int
    {
        return $this->value;
    }

    /**
     * @param int $value
     */
    public function setValue(int $value) : void
    {
        $this->value = $value;
    }
}