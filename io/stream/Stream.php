<?php

namespace IO\Stream;


/**
 * Stream interface that reflects a php stream wrapper.
 *
 * @author   Tristan Lins <tristan.lins@infinitysoft.de>
 * @package  FlexStream API
 */
interface Stream
{
	/**
	 * @return bool
	 */
	public function dir_opendir($path, $options);

	/**
	 * @return bool
	 */
	public function dir_closedir();

	/**
	 * @return string
	 */
	public function dir_readdir();

	/**
	 * @return bool
	 */
	public function dir_rewinddir();

	/**
	 * @return bool
	 */
	public function mkdir($path, $mode, $options);

	/**
	 * @return bool
	 */
	public function rename($path_from, $path_to);

	/**
	 * @return bool
	 */
	public function rmdir($path, $options);

	/**
	 * @return resource
	 */
	public function stream_cast($cast_as);

	/**
	 * @return void
	 */
	public function stream_close();

	/**
	 * @return bool
	 */
	public function stream_eof();

	/**
	 * @return bool
	 */
	public function stream_flush();

	/**
	 * @return bool
	 */
	public function stream_lock($operation);

	/**
	 * @return bool
	 */
	public function stream_metadata($path, $option, $var);

	/**
	 * @return bool
	 */
	public function stream_open($path, $mode, $options, &$opened_path);

	/**
	 * @return string
	 */
	public function stream_read($count);

	/**
	 * @return bool
	 */
	public function stream_seek($offset, $whence = SEEK_SET);

	/**
	 * @return bool
	 */
	public function stream_set_option($option, $arg1, $arg2);

	/**
	 * @return array
	 */
	public function stream_stat();

	/**
	 * @return int
	 */
	public function stream_tell();

	/**
	 * @return int
	 */
	public function stream_write($data);

	/**
	 * @return bool
	 */
	public function unlink($path);

	/**
	 * @return array
	 */
	public function url_stat($path, $flags);
}
