<?php declare(strict_types=1);

namespace clarg;

class ArgumentCollection implements \IteratorAggregate, \Countable {

    private $args = [];

    public function add(IArgument $argument): void {
        $this->args[] = $argument;
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator($this->args);
    }

    public function count(): int {
        return count($this->args);
    }
}