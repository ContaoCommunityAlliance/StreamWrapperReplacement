<?php

namespace IO\Stream;

abstract class AbstractConfigurableStream implements Stream
{
	/**
	 * @var string
	 */
	protected $base;

	/**
	 * @var array
	 */
	protected $settings;

	/**
	 * @var string
	 */
	protected $protocol;

	/**
	 * @param $base
	 * @param $settings
	 * @param string $protocol
	 */
	public function __construct($base = '', $settings = false, $protocol = 'file')
	{
		$this->base = $base;
		$this->settings = $settings;
		$this->protocol = $protocol;
	}
}
