<?php declare(strict_types=1);

namespace clarg;

interface IParameter {

    public function matches(string $name): bool;

    public function getArgCount(): int;

    public function toArgument(array $args): IArgument;

    public function getLong(): string;

    public function getShort(): string;

    public function getDescription(): string;

    public function getType(): string;

    public function isMandatory(): bool;

    public function extractArgument(\ArrayIterator $iterator): IArgument;

}