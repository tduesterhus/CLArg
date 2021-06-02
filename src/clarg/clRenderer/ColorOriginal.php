<?php declare(strict_types=1);

namespace clarg;

class ColorOriginal implements IColor {

    const NONE = '';
    const BLACK = '0';
    const RED = '1';
    const GREEN = '2';
    const YELLOW = '3';
    const BLUE = '4';
    const MAGENTA = '5';
    const CYAN = '6';
    const LIGHT_GRAY = '7';

    const BACKGROUND_PREFIX = '4';
    const BACKGROUND_LIGHT_PREFIX = '10';

    const FOREGOUND_PREFIX = '3';
    const FOREGROUND_LIGHT_PREFIX = '9';

    private string $color;
    private string $prefix;

    public function __construct(string $color, string $prefix = self::FOREGOUND_PREFIX) {
        $this->color = $color;
        $this->prefix = $prefix;
    }

    public function asString(): string {
        return $this->color;
    }

    public function asForeground(): string {
        if ($this->color === self::NONE) {
            return '';
        }
        return ";" . $this->prefix . '' . $this->color;
    }

    public function asBackground(): string {
        if ($this->color === self::NONE) {
            return '';
        }
        return ";" . $this->prefix . '' . $this->color;
    }

}