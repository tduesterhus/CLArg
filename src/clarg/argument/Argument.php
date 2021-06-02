<?php declare(strict_types=1);

namespace clarg;

class Argument implements IArgument {

    private string $long;
    private string $short;
    private array $values = [];

    public function __construct(string $long, string $short, string ...$values) {
        $this->long = $long;
        $this->short = $short;
        $this->values = $values;
    }

    public function getLong(): string {
        return $this->long;
    }

    public function getShort(): string {
        return $this->short;
    }

    public function count(): int {
        return count($this->values);
    }

    public function getValue(int $index = 0): string {
        if (!array_key_exists($index, $this->values)) {
            throw new ArgumentException();
        }
        return $this->values[$index];
    }

    public function getValueAsInt(int $index = 0): int {
        return intval($this->getValue($index));
    }

    public function getValueAsFloat(int $index = 0): float {
        return floatval($this->getValue($index));
    }

    public function hasIndex(int $index): bool {
        return array_key_exists($index, $this->values);
    }

}