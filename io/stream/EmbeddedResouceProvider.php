<?php

namespace IO\Stream;

/**
 * Php builtin stream wrapper provider.
 *
 * @abstract
 * @author   Tristan Lins <tristan.lins@infinitysoft.de>
 * @package  FlexStream API
 */
abstract class EmbeddedResourceProvider extends AbstractConfigurableStream
{
	/**
	 * @var int
	 */
	protected $resource = false;

	/**
	 * @return int
	 */
	public function resource()
	{
		return $this->resource;
	}

	/* --- Directory operations --------------------------------------------- */

	/**
	 * @return bool
	 */
	public function dir_opendir($path, $options)
	{
		$this->resource = opendir($path, $options);
		return $this->resource ? true : false;
	}

	/**
	 * @return bool
	 */
	public function dir_closedir()
	{
		closedir($this->resource);
		return true;
	}

	/**
	 * @return string
	 */
	public function dir_readdir()
	{
		return readdir($this->resource);
	}

	/**
	 * @return bool
	 */
	public function dir_rewinddir()
	{
		return rewinddir($this->resource);
	}

	/* --- Generic operations ----------------------------------------------- */

	/**
	 * @return bool
	 */
	public function mkdir($path, $mode, $options)
	{
		return mkdir($path, $mode, $options);
	}

	/**
	 * @return bool
	 */
	public function rmdir($path, $options)
	{
		return rmdir($path, $options);
	}

	/**
	* @return bool
	*/
	public function rename($path_from, $path_to)
	{
		return rename($path_from, $path_to);
	}

	/**
	 * @return bool
	 */
	public function unlink($path)
	{
		throw new Exception("Not yet implemented.");
	}

	/* --- Stream operations ------------------------------------------------ */

	/**
	 * @return void
	 */
	public function stream_close()
	{
		if ($this->resource) fclose($this->resource);
	}

	/**
	 * @return resource
	 */
	public function stream_cast($cast_as)
	{
		throw new Exception('Not yet implemented!');
	}

	/**
	 * @return bool
	 */
	public function stream_eof()
	{
		return $this->resource ? feof($this->resource) : true;
	}

	/**
	 * @return bool
	 */
	public function stream_lock($operation)
	{
		return $this->resource ? flock($this->resource, $operation) : false;
	}

	/**
	 * @return bool
	 */
	public function stream_metadata($path, $option, $var)
	{
		return $this->resource ? stream_get_meta_data($this->resource) : false;
	}

	/**
	 * @return string
	 */
	public function stream_read($count)
	{
		return $this->resource ? fread($this->resource, $count) : false;
	}

	/**
	 * @return bool
	 */
	public function stream_seek($offset, $whence = SEEK_SET)
	{
		return $this->resource ? fseek($this->resource, $offset, $whence) : false;
	}

	/**
	 * @return bool
	 */
	public function stream_set_option($option, $arg1, $arg2)
	{
		throw new Exception("Not yet implemented.");
	}

	/**
	 * @return array
	 */
	public function stream_stat()
	{
		throw new Exception("Not yet implemented.");
	}

	/**
	 * @return int
	 */
	public function stream_tell()
	{
		throw new Exception("Not yet implemented.");
	}

	/**
	 * @return int
	 */
	public function stream_write($data)
	{
		return $this->resource ? fwrite($this->resource, $data) : false;
	}

	/**
	 * @return bool
	 */
	public function stream_flush()
	{
		return $this->resource ? fflush($this->resource) : false;
	}

	/* --- Url operations --------------------------------------------------- */

	/**
	 * @return array
	 */
	public function url_stat($path, $flags)
	{
		throw new Exception("Not yet implemented.");
	}
}
