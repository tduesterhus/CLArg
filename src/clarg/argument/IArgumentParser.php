<?php declare(strict_types=1);

namespace clarg;

interface IArgumentParser {

    public function parse(IParameter $parameter, \ArrayIterator $argIterator): IArgument;

}