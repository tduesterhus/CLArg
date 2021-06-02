<?php declare(strict_types=1);

namespace clarg;

interface IColor {

    public function asForeground(): string;
    public function asBackground(): string;

}