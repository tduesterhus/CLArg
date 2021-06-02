<?php declare(strict_types=1);

namespace clarg;

abstract class AbstractParameter implements IParameter {

    private string $long;
    private string $short;
    private int $numArgs;
    private string $description;

    public function __construct(string $long, string $short, int $numArgs, string $description) {
        $this->long = $long;
        $this->short = $short;
        $this->numArgs = $numArgs;
        $this->description = $description;
    }

    public function matches(string $name): bool {
        return $name === $this->short || $name === $this->long;
    }

    public function getLong(): string {
        return $this->long;
    }

    public function getShort(): string {
        return $this->short;
    }

    public function getArgCount(): int {
        return $this->numArgs;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function toArgument(array $args): IArgument {
        return new Argument($this->long, $this->short, ...$args);
    }

    public function extractArgument(\ArrayIterator $iterator): IArgument {
        $counter = 0;
        $args = [];
        while ($iterator->valid() && $counter < $this->numArgs) {
            $args[] = $iterator->current();
            $iterator->next();
        }
        return $this->toArgument($args);
    }

}