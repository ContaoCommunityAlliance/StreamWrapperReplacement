<?php

namespace IO\Stream;

abstract class EmbeddedProviderProvider extends AbstractConfigurableStream
{
	/**
	 * @var IO\Stream\Stream
	 */
	protected $provider = null;

	/**
	 * @return bool
	 */
	public function dir_opendir($path, $options)
	{
		return $this->provider->dir_opendir($path, $options);
	}

	/**
	 * @return bool
	 */
	public function dir_closedir()
	{
		return $this->provider->dir_closedir();
	}

	/**
	 * @return string
	 */
	public function dir_readdir()
	{
		return $this->provider->dir_readdir();
	}

	/**
	 * @return bool
	 */
	public function dir_rewinddir()
	{
		return $this->provider->dir_rewinddir();
	}

	/**
	 * @return bool
	 */
	public function mkdir($path, $mode, $options)
	{
		return $this->provider->mkdir($path, $mode, $options);
	}

	/**
	 * @return bool
	 */
	public function rename($path_from, $path_to)
	{
		return $this->provider->rename($path_from, $path_to);
	}

	/**
	 * @return bool
	 */
	public function rmdir($path, $options)
	{
		return $this->provider->rmdir($path, $options);
	}

	/**
	 * @return resource
	 */
	public function stream_cast($cast_as)
	{
		return $this->provider->stream_cast($cast_as);
	}

	/**
	 * @return void
	 */
	public function stream_close()
	{
		return $this->provider->stream_close();
	}

	/**
	 * @return bool
	 */
	public function stream_eof()
	{
		return $this->provider->stream_eof();
	}

	/**
	 * @return bool
	 */
	public function stream_flush()
	{
		return $this->provider->stream_flush();
	}

	/**
	 * @return bool
	 */
	public function stream_lock($operation)
	{
		return $this->provider->stream_lock($operation);
	}

	/**
	 * @return bool
	 */
	public function stream_metadata($path, $option, $var)
	{
		return $this->provider->stream_metadata($path, $option, $var);
	}

	/**
	 * @return string
	 */
	public function stream_read($count)
	{
		return $this->provider->stream_read($count);
	}

	/**
	 * @return bool
	 */
	public function stream_seek($offset, $whence = SEEK_SET)
	{
		debug('seek: %s, %s', $offset, $whence);

		return $this->provider->stream_seek($offset, $whence);
	}

	/**
	 * @return bool
	 */
	public function stream_set_option($option, $arg1, $arg2)
	{
		return $this->provider->stream_set_option($option, $arg1, $arg2);
	}

	/**
	 * @return array
	 */
	public function stream_stat()
	{
		return $this->provider->stream_stat();
	}

	/**
	 * @return int
	 */
	public function stream_tell()
	{
		return $this->provider->stream_tell();
	}

	/**
	 * @return int
	 */
	public function stream_write($data)
	{
		return $this->provider->stream_write($data);
	}

	/**
	 * @return bool
	 */
	public function unlink($path)
	{
		return $this->provider->unlink($path);
	}

	/**
	 * @return array
	 */
	public function url_stat($path, $flags)
	{
		return $this->provider->url_stat($path, $flags);
	}
}
