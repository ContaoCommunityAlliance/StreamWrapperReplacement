<?php

namespace IO\Stream;

class RandomDevice extends AbstractConfigurableStream
{
	/**
	 * @param $base
	 * @param $settings
	 * @param string $protocol
	 */
	public function __construct($base = '', $settings = false, $protocol = 'file')
	{
		parent::__construct($base, $settings, $protocol);

		if (!isset($this->settings['length']))
		{
			$this->settings['length'] = 1024;
		}
		$this->settings['read'] = 0;
	}

	/**
	 * @return bool
	 */
	public function dir_opendir($path, $options)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function dir_closedir()
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return string
	 */
	public function dir_readdir()
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function dir_rewinddir()
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function mkdir($path, $mode, $options)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function rename($path_from, $path_to)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function rmdir($path, $options)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return resource
	 */
	public function stream_cast($cast_as)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return void
	 */
	public function stream_close()
	{
		// do nothink
	}

	/**
	 * @return bool
	 */
	public function stream_eof()
	{
		return $this->settings['read'] >= $this->settings['length'];
	}

	/**
	 * @return bool
	 */
	public function stream_flush()
	{
		// do nothink
	}

	/**
	 * @return bool
	 */
	public function stream_lock($operation)
	{
		// do nothink
	}

	/**
	 * @return bool
	 */
	public function stream_metadata($path, $option, $var)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function stream_open($path, $mode, $options, &$opened_path)
	{
		return true;
	}

	/**
	 * @return string
	 */
	public function stream_read($count)
	{
		$buffer = '';
		for ($i=0; $i<$count && $this->settings['read'] < $this->settings['length']; $i++, $this->settings['read']++)
		{
			$buffer .= chr(rand(65, 90));
		}
		return $buffer;
	}

	/**
	 * @return bool
	 */
	public function stream_seek($offset, $whence = SEEK_SET)
	{
		$this->settings['read'] = $offset;
	}

	/**
	 * @return bool
	 */
	public function stream_set_option($option, $arg1, $arg2)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return array
	 */
	public function stream_stat()
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return int
	 */
	public function stream_tell()
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return int
	 */
	public function stream_write($data)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return bool
	 */
	public function unlink($path)
	{
		throw new Exception('Not yet implemented');
	}

	/**
	 * @return array
	 */
	public function url_stat($path, $flags)
	{
		throw new Exception('Not yet implemented');
	}

}