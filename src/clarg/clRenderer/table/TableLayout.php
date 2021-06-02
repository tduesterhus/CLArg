<?php declare(strict_types=1);

namespace clarg;

class TableLayout {

    /** @var Row[] */
    private array $rows = [];
    private int $col_count = 0;
    private array $col_width = [];
    private int $offset;

    public function __construct($offset = 2) {
        $this->offset = $offset;
    }

    public function addRow(Row $row): void {
        $this->rows[] = $row;
        $this->col_count = max($this->col_count, $row->count());
        /** @var Cell $cell */
        foreach($row as $cell) {
            $this->col_width[] = $cell->getWidth();
        }
    }

    public function render(IClOut $out): void {
        $default = new Style(
            new ColorOriginal(ColorOriginal::NONE),
            new ColorOriginal(ColorOriginal::NONE)
        );
        foreach($this->rows as $row) {
            $height = $row->getHeight();
            for($i = 0; $i < $height; $i++) {
                $k = 0;
                /** @var Cell $cell */
                foreach($row as $cell) {
                    if ($i < $cell->count()) {
                        $line = $cell->getLine($i);
                        $spaces = str_repeat(' ', $this->col_width[$k] - strlen($line) + $this->offset);
                        $out->write($line . $spaces, $cell->getStyle());
                    } else {
                        $spaces = str_repeat(' ', $this->col_width[$k] + $this->offset);
                        $out->write($spaces, $cell->getStyle());
                    }
                    $k++;
                }
                $out->write("\n", $default);
            }
        }
    }

}