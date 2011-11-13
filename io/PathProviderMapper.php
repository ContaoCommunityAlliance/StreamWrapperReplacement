<?php

namespace IO;

class PathProviderMapping
{
	/**
	 * Path maps.
	 *
	 * @var array
	 */
	protected static $map = array();

	/**
	 * Settings map.
	 *
	 * @var array
	 */
	protected static $settings = array();

	/**
	 * Register a path mapping.
	 *
	 * @static
	 * @param $path string
	 * @param $provider string
	 * @return void
	 */
	public static function register($path, $provider, $settings = false)
	{
		if (isset(self::$map[$path])) {
			throw new Exception(sprintf("Could not redefine path mapping '%s' with '%s', because '%s' is allready a registered provider!", $path, $provider, self::$map[$path]));
		}
		self::$map[$path] = $provider;
		krsort(self::$map);
	}

	/**
	 * Unregister a path mapping.
	 *
	 * @static
	 * @param $path
	 * @return void
	 */
	public static function unregister($path)
	{
		unset(self::$map[$path]);
	}

	/**
	 * Get registered mappings.
	 * @static
	 * @return array
	 */
	public static function getRegistered()
	{
		return self::$map;
	}

	/**
	 * Get a provider class name to a specific path.
	 *
	 * @static
	 * @param $absolute string
	 * @return null|string
	 */
	public static function findProvider($absolute)
	{
		foreach (self::$map as $path => $provider)
		{
			if (substr($absolute, 0, strlen($path)) == $path) {
				return array(
					'path'=>$path,
					'class'=>$provider,
					'settings'=>isset(self::$settings[$path]) ? self::$settings[$path] : false
				);
			}
		}
		return array(
			'path' => '',
			'class' => '\IO\Stream\PhpBuiltinStreamProvider',
			'settings' => false
		);
	}
}
