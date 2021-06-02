<?php declare(strict_types=1);

namespace clarg;

class CommandExecutor {

    /** @var ICommand */
    private ICommand $command;
    /** @var ArgumentCollection */
    private ArgumentCollection $args;

    public function __construct(ICommand $command, ArgumentCollection $args) {
        $this->command = $command;
        $this->args = $args;
    }

    public function execute(): int {
        return $this->command->execute($this->args);
    }

}