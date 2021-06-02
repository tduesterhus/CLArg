<?php declare(strict_types=1);

namespace clarg;

class ParameterCollection implements \IteratorAggregate, \Countable {

    private $parameterListLong = [];
    private $parameterListShort = [];

    public function add(IParameter $param): void {
        $this->parameterListLong[$param->getLong()] = $param;
        $this->parameterListShort[$param->getShort()] = $param;
    }

    public function hasParameter(string $name): bool {
        return array_key_exists($name, $this->parameterListShort) || array_key_exists($name, $this->parameterListLong);
    }

    public function getParameter(string $name): IParameter {
        if (array_key_exists($name, $this->parameterListLong)) {
            return $this->parameterListLong[$name];
        }
        if (array_key_exists($name, $this->parameterListShort)) {
            return $this->parameterListShort[$name];
        }
        throw new ParameterCollectionException("No parameter for name '" . $name . "' found!");
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator(array_values($this->parameterListLong));
    }

    public function count(): int {
        return count($this->parameterListShort);
    }

}