<?php declare(strict_types=1);

namespace clarg;

class OptionalParameter extends AbstractParameter {

    public function isMandatory(): bool {
        return false;
    }

    public function getType(): string {
        return "optional";
    }

}