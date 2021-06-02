<?php declare(strict_types=1);

namespace clarg;

class ClOutLinux implements IClOut {

    public function write(string $text, Style $font): void {
        echo sprintf("%s%s%s", $font->asString(), $text, Style::default());
    }

}