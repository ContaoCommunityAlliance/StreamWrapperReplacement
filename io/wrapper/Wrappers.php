<?php

namespace IO\Wrapper;

class Wrappers
{
	// TODO maybe a registry is better?!
	protected static $wrappers = array
	(
		'file' => '\\IO\\Wrapper\\FileWrapper'
	);

	public static function register()
	{
		$protocols = func_get_args();
		if (count($protocols) == 1 && is_array($protocols[0]))
		{
			$protocols = $protocols[0];
		}
		if (count($protocols) == 0)
		{
			$protocols = array_keys(self::$wrappers);
		}

		// re-register all wrappers
		foreach ($protocols as $protocol)
		{
			debug("Register '%s' wrapper for protocol %s", self::$wrappers[$protocol], $protocol);

			// unregister builtin wrapper
			stream_wrapper_unregister($protocol);

			// register the AllWrapper
			stream_wrapper_register($protocol, self::$wrappers[$protocol], 0) or die(sprintf("Failed to register '%s' protocol", $protocol));
		}
	}

	public static function unregister()
	{
		$protocols = func_get_args();
		if (count($protocols) == 1 && is_array($protocols[0]))
		{
			$protocols = $protocols[0];
		}
		if (count($protocols) == 0)
		{
			$protocols = array_keys(self::$wrappers);
		}

		// re-register all wrappers
		foreach ($protocols as $protocol)
		{
			debug("Unregister '%s' wrapper from protocol %s", self::$wrappers[$protocol], $protocol);

			// unregister builtin wrapper
			stream_wrapper_unregister($protocol);

			// register the AllWrapper
			stream_wrapper_restore($protocol);
		}
	}
}
