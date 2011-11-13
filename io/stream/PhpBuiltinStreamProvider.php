<?php

namespace IO\Stream;

/**
 * Php builtin stream wrapper provider.
 *
 * @author   Tristan Lins <tristan.lins@infinitysoft.de>
 * @package  FlexStream API
 */
class PhpBuiltinStreamProvider extends EmbeddedResourceProvider
{
	public function __construct($base, $settings)
	{
		parent::__construct($base, $settings);
	}

	/* --- Stream operations ------------------------------------------------ */

	/**
	 * @return bool|int
	 */
	public function stream_open($path, $mode, $options, &$opened_path)
	{
		if (preg_match('#^(\w+):#', $path, $match))
		{
			$protocol = $match[1];
		}
		else
		{
			$protocol = 'file';
		}

		// unregister the AllWrapper
		\IO\Wrapper\Wrappers::unregister($this->protocol);

		debug("Open builtin stream for '%s'", $path);
		
		// open with builtin wrapper
		$this->resource = fopen($path, $mode, $options);

		// re-register the AllWrapper
		\IO\Wrapper\Wrappers::register($this->protocol);

		return $this->resource ? true : false;
	}

}
