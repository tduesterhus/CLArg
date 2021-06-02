<?php declare(strict_types=1);

namespace clarg;

interface IClOut {

    public function write(string $text, Style $font): void;

}