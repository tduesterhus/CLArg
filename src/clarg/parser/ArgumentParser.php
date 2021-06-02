<?php declare(strict_types=1);

namespace clarg;

class ArgumentParser implements IClArgParser {

    private ParameterCollection $parameter;
    private ArgumentCollection $args;
    private CommandCollection $commands;
    private null|CommandExecutor $executor = null;
    private IRenderer $renderer;

    public function __construct(ParameterCollection $parameter, ClRenderer $renderer) {
        $this->parameter = $parameter;
        $this->commands = new CommandCollection();
        $this->args = new ArgumentCollection();
        $this->renderer = $renderer;
    }

    public function addCommand(ICommand $command): void {
        $this->commands->add($command);
    }

    public function parse(array $argv): void {
        $iterator = new \ArrayIterator($argv);
        $this->args = $this->extractArgs($this->parameter, $iterator);
    }

    private function extractArgs(ParameterCollection $parameter, \ArrayIterator $iterator, bool $allowCommands = true): ArgumentCollection {
        $resultArgs = new ArgumentCollection();
        while($iterator->valid()) {
            $currentValue = strval($iterator->current());
            if (strlen($currentValue) === 0) {
                $iterator->next();
                continue;
            }
            if ($currentValue === '--help' || $currentValue === '-h') {
                $this->printHelpAndExit("No reason");
            }
            if ($currentValue[0] === '-') {
                $valueTrimmed = trim($currentValue, '-');
                if ($parameter->hasParameter($valueTrimmed)) {
                    $param = $parameter->getParameter($valueTrimmed);
                    $iterator->next();
                    $resultArgs->add($param->extractArgument($iterator));
                }
            } elseif ($allowCommands === true) {
                if ($this->commands->hasCommand($currentValue)) {
                    $cmd = $this->commands->getCommand($currentValue);
                    $iterator->next();
                    $cmdArgs = $this->extractArgs($cmd->getExpectedParameter(), $iterator, false);
                    $this->executor = new CommandExecutor($cmd, $cmdArgs);
                }
            }
            $this->printHelpAndExit("Unknown Argument: '" . $currentValue . "'");
        }
        return $resultArgs;
    }

    private function printHelp(string $reason) {
        $this->renderer->renderCommands($this->commands);
        $this->renderer->renderParameter($this->parameter);
    }

    private function printHelpAndExit(string $reason) {
        $this->printHelp($reason);
        exit(0);
    }

}