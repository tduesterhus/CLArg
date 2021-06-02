<?php declare(strict_types=1);

include_once __DIR__ . '/../src/autoload.php';

$clout = new \clarg\ClOutLinux();

$green = new \clarg\ColorOriginal(\clarg\ColorOriginal::GREEN);
$yellow = new \clarg\ColorOriginal(\clarg\ColorOriginal::YELLOW);
$noColor = new \clarg\ColorOriginal(\clarg\ColorOriginal::NONE);
$nameStyle = new \clarg\Style($green, $noColor, \clarg\Style::NORMAL);
$descStyle = new \clarg\Style($noColor, $noColor, \clarg\Style::NORMAL);
$typeStyle = new \clarg\Style($yellow, $noColor, \clarg\Style::NORMAL);

#$collection = new \clarg\ParameterCollection();
#$collection->add(new \clarg\MandatoryParameter('name', 'n', 2, 'Full name (first last)'));
#$renderer = new \clarg\ClRenderer($clout, $nameStyle, $descStyle, $typeStyle);
#$parser = new \clarg\ArgumentParser($collection, $renderer);
#$parser->parse($argv);

$result = \clarg\Cell::splitText('Hallo Welt, wie geht es dir?', 11);
var_dump($result);