<?php declare(strict_types=1);

namespace clarg;

class FlagParameter extends AbstractParameter {

    public function isMandatory(): bool {
        return false;
    }

    public function getType(): string {
        return "flag";
    }

}