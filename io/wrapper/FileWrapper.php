<?php

namespace IO\Wrapper;

class FileWrapper extends \IO\Stream\EmbeddedProviderProvider
{
	/**
	 * @return bool
	 */
	public function stream_open($path, $mode, $options, &$opened_path)
	{
		$spec = \IO\PathProviderMapping::findProvider($path);

		debug("Open stream for path '%s' with provider '%s' from base path '%s'.", $path, $spec['class'], $spec['path']);

		$this->provider = new $spec['class']($spec['path'], $spec['settings'], 'file');
		return $this->provider->stream_open(substr($path, strlen($spec['path'])), $mode, $options, $opened_path);
	}
}
