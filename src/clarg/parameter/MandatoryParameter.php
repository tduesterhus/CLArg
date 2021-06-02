<?php declare(strict_types=1);

namespace clarg;

class MandatoryParameter extends AbstractParameter {

    public function isMandatory(): bool {
        return true;
    }

    public function getType(): string {
        return "mandatory";
    }

}