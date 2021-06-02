<?php declare(strict_types=1);

namespace clarg;

class ClRenderer implements IRenderer {

    private IClOut $out;
    private Style $nameStyle;
    private Style $descStyle;
    private Style $typeStyle;

    public function __construct(IClOut $out, Style $nameStyle, Style $descStyle, Style $typeStyle) {
        $this->out = $out;
        $this->nameStyle = $nameStyle;
        $this->descStyle = $descStyle;
        $this->typeStyle = $typeStyle;
    }

    public function renderParameter(ParameterCollection $parameter): void {
        $settings = $this->getTerminalSettings();

        $table = new TableLayout();
        /**
         * @var $param IParameter
         */
        foreach($parameter as $param) {
            $name = sprintf("-%s | --%s (#%d)", $param->getShort(), $param->getLong(), $param->getArgCount());
            #$this->out->write($name, $this->nameStyle);
            #$desc = sprintf("\t%s\n", $param->getDescription());
            #$this->out->write($desc, $this->descStyle);
            #$argCount = sprintf("\t[%s]\n", $param->getType());
            #$this->out->write($argCount, $this->typeStyle);
            $table->addRow(
                new Row(
                    new Cell($this->nameStyle, $name, '[' . $param->getType() . ']'),
                    new Cell($this->descStyle, $param->getDescription(), "Hallo", "Welt"),
                )
            );
            $table->render($this->out);
        }

        $legend = "\nLegend:\n";
        $legend .= "-<short_name>|--<long_name> (#<num_expected_arguments>)\t<description>\n";
        $legend .= "[<parameter_type>]\n";
        $this->out->write($legend, $this->descStyle);
    }

    public function renderCommands(CommandCollection $commands): void {

    }

    private function getTerminalSettings(): array {
        return [
            "width" => intval(exec('tput cols')),
            "height" => intval(exec('tput lines'))
        ];
    }
}