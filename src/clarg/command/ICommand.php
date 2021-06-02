<?php declare(strict_types=1);

namespace clarg;

interface ICommand {

    public function getIdentifier(): string;

    public function getDescription(): string;

    public function getExpectedParameter(): ParameterCollection;

    public function execute(ArgumentCollection $args): int;
}