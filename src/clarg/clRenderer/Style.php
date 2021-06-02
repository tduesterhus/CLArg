<?php declare(strict_types=1);

namespace clarg;

class Style {

    const NORMAL = '0';
    const BOLD = '1';
    const UNDERLINE = '4';

    private IColor $fgColor;
    private IColor $bgColor;

    private string $fontWeight;

    public function __construct(IColor $fgColor, IColor $bgColor, string $fontWeight = self::NORMAL) {
        $this->fgColor = $fgColor;
        $this->bgColor = $bgColor;
        $this->fontWeight = $fontWeight;
    }

    public function getFgColor(): IColor {
        return $this->fgColor;
    }

    public function getBgColor(): IColor {
        return $this->bgColor;
    }

    public function asString(): string {
        return sprintf("\e[0%s%s%sm", $this->fontWeight, $this->fgColor->asForeground(), $this->bgColor->asBackground());
    }

    public static function default(): string {
        return "\e[0m";
    }

}