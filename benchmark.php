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

function benchmark($stream) {
	$time = time();
	$reads = 0;
	while (time()-$time<10)
	{
		$data = fread($stream, 1024);
		$reads += strlen($data);
	}
	$sec = time()-$time;
	printf("reads %d of data in %d seconds: %f byte/sec<br>\n", $reads, $sec, $reads / $sec);
}

require('io/stream/Stream.php');
require('io/stream/AbstractConfigurableStream.php');
require('io/stream/EmbeddedProviderProvider.php');
require('io/stream/EmbeddedResouceProvider.php');
require('io/stream/PhpBuiltinStreamProvider.php');
require('io/stream/RandomDevice.php');
require('io/wrapper/Wrappers.php');
require('io/wrapper/FileWrapper.php');
require('io/PathProviderMapper.php');

$fp = fopen('file:///dev/zero', 'r');
benchmark($fp);
fclose($fp);

\IO\Wrapper\Wrappers::register();
\IO\PathProviderMapping::register('/dev/random', '\\IO\\Stream\\RandomDevice', array('length'=>10000));

$fp = fopen('file:///dev/zero', 'r');
benchmark($fp);
fclose($fp);
