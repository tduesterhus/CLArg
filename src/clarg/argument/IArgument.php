<?php declare(strict_types=1);

namespace clarg;

interface IArgument {

    public function getValue(int $index);

    public function count(): int;

}