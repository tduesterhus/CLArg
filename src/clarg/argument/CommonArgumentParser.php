<?php declare(strict_types=1);

namespace clarg;

class CommonArgumentParser implements IArgumentParser {

    public function parse(IParameter $parameter, \ArrayIterator $argIterator): IArgument {
        $counter = 0;
        $args = [];
        while ($argIterator->valid() && $counter < $parameter->getArgCount()) {
            $args[] = $argIterator->current();
            $argIterator->next();
        }
        return $parameter->toArgument($args);
    }
}