<?php declare(strict_types=1);

namespace clarg;

class CommandCollection implements \IteratorAggregate, \Countable {

    private array $list = [];

    public function add(ICommand $command): void {
        $this->list[$command->getIdentifier()] = $command;
    }

    public function hasCommand(string $name): bool {
        return array_key_exists($name, $this->list);
    }

    public function getCommand(string $name): ICommand {
        return $this->list[$name];
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator($this->list);
    }

    public function count(): int {
        return count($this->list);
    }
}