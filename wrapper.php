<?php
header('Content-Type: text/html; charset=utf-8');
echo '<div style="font-family: monospace; font-size: 11px;">';

function debug()
{
	$args = func_get_args();
	$format = array_shift($args);
	echo date('c') . ' ';
	vprintf($format, $args);
	echo "<br>\n";
}

require('io/stream/Stream.php');
require('io/stream/AbstractConfigurableStream.php');
require('io/stream/EmbeddedProviderProvider.php');
require('io/stream/EmbeddedResouceProvider.php');
require('io/stream/PhpBuiltinStreamProvider.php');
require('io/wrapper/Wrappers.php');
require('io/wrapper/FileWrapper.php');
require('io/PathProviderMapper.php');

\IO\Wrapper\Wrappers::register();

$fp = fopen("file://" . __DIR__ . '/random.file', "r+");
var_dump($fp);
if ($fp)
{
	rewind($fp);
	while (!feof($fp)) {
		echo fgets($fp);
	}
	fclose($fp);
}
