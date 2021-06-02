<?php declare(strict_types=1);

namespace clarg;

class Color256 implements IColor {

    const NONE = '';
    const BLACK = '30';
    const RED = '31';
    const GREEN = '32';
    const YELLOW = '33';
    const BLUE = '34';
    const MAGENTA = '35';
    const CYAN = '36';
    const LIGHT_GRAY = '37';
    const DARK_GRAY = '90';
    const LIGHT_RED = '91';
    const LIGHT_GREEN = '92';
    const LIGHT_YELLOW = '93';
    const LIGHT_BLUE = '94';
    const LIGHT_MAGENTA = '95';
    const LIGHT_CYAN = '96';
    const WHITE = '97';

    private string $color;

    public function __construct(string $color) {
        $this->color = $color;
    }

    public function asString(): string {
        return $this->color;
    }

    public function asForeground(): string {
        if ($this->color === self::NONE) {
            return '';
        }
        return ";38;5;" . $this->color;
    }

    public function asBackground(): string {
        if ($this->color === self::NONE) {
            return '';
        }
        return ";48;5;" . $this->color;
    }

}