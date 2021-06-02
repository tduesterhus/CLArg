<?php declare(strict_types=1);

namespace clarg;

use Exception;
use Traversable;

class Row implements \IteratorAggregate, \Countable {

    /** @var Cell[] */
    private array $data = [];
    private int $height = 0;

    public function __construct(Cell ...$data) {
        $this->data = $data;
        foreach($data as $cell) {
            $this->height = max($this->height, $cell->getHeight());
        }
    }

    public function at(int $index): Cell {
        return $this->data[$index];
    }

    public function count(): int {
        return count($this->data);
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator($this->data);
    }

    public function getHeight(): int {
        return $this->height;
    }
}