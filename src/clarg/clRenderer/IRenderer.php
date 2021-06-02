<?php declare(strict_types=1);

namespace clarg;

interface IRenderer {

    public function renderParameter(ParameterCollection $parameter): void;

    public function renderCommands(CommandCollection $commands): void;

}