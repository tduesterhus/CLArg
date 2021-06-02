<?php declare(strict_types=1);

namespace clarg;

class Cell implements \IteratorAggregate, \Countable {

    /** @var string[] */
    private array $lines;
    private Style $style;

    public function __construct(Style $style, string ...$lines) {
        $this->style = $style;
        $this->lines = $lines;
    }

    public function getWidth(): int {
        $len = 0;
        foreach($this->lines as $line) {
            $len = max($len, strlen($line));
        }
        return $len;
    }

    public function getHeight(): int {
        return count($this->lines);
    }

    public function getLine(int $index): string {
        return $this->lines[$index];
    }

    public function getStyle(): Style {
        return $this->style;
    }

    public function getIterator(): \ArrayIterator {
        return new \ArrayIterator($this->lines);
    }

    public function count(): int {
        return count($this->lines);
    }

    public static function splitText(string $text, int $maxLength): array {
        $length = strlen($text);
        $lines = [];
        $pos = $lastPos = 0;
        while ($pos < $length) {
            $nextPos = strpos($text, ' ', $pos);
            if ($nextPos === false) { // reached end of text
                $nextPos = $length;
            }
            if (($nextPos - $lastPos) > $maxLength) {
                if ($pos === $lastPos) { // word is too long so we split it
                    $pos += $maxLength;
                    $nextPos = $pos;
                    $line = substr($text, $lastPos, $maxLength);
                } else { // common case
                    $line = substr($text, $lastPos, $pos - $lastPos - 1);
                }
                $lastPos = $pos;
                $lines[] = $line;
            }
            $pos = $nextPos + 1;
        }
        if ($lastPos < $length) {
            $lines[] = substr($text, $lastPos);
        }
        return $lines;
    }
}