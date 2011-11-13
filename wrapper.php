<?php

class MyWrapper
{
	protected $parent;

	protected $length = 0;

	protected $registry;

	/** @return function */ public function __construct ()
	{ $GLOBALS['calls'][] = "__construct( " . print_r(func_get_args(), true) . ")\n";
		//$this->parent = new builtinplainfile();
		$this->registry = array();
	}
	
	/** @return bool */ public function dir_closedir ()
	{ $GLOBALS['calls'][] = "dir_closedir( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function dir_opendir ( $path , $options )
	{ $GLOBALS['calls'][] = "dir_opendir( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return string */ public function dir_readdir ()
	{ $GLOBALS['calls'][] = "dir_readdir( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function dir_rewinddir ()
	{ $GLOBALS['calls'][] = "dir_rewinddir( " . print_r(func_get_args(), true) . ")\n";
		return false;	
	}
	
	/** @return bool */ public function mkdir ( $path , $mode , $options )
	{ $GLOBALS['calls'][] = "mkdir( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function rename ( $path_from , $path_to )
	{ $GLOBALS['calls'][] = "rename( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function rmdir ( $path , $options )
	{ $GLOBALS['calls'][] = "rmdir( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return resource */ public function stream_cast ( $cast_as )
	{ $GLOBALS['calls'][] = "stream_cast( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return void */ public function stream_close ()
	{ $GLOBALS['calls'][] = "stream_close( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function stream_eof ()
	{ $GLOBALS['calls'][] = "stream_eof( " . print_r(func_get_args(), true) . ")\n";
		return ($this->length > 100);
	}
	
	/** @return bool */ public function stream_flush ()
	{ $GLOBALS['calls'][] = "stream_flush( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function stream_lock ( $operation )
	{ $GLOBALS['calls'][] = "stream_lock( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function stream_metadata ( $path , $option , $var )
	{ $GLOBALS['calls'][] = "stream_metadata( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function stream_open ( $path , $mode , $options , &$opened_path )
	{ $GLOBALS['calls'][] = "stream_open( " . print_r(func_get_args(), true) . ")\n";
		stream_wrapper_unregister('file');
		stream_wrapper_restore('file');
		var_dump($path, $mode);
		$this->parent = fopen($path, $mode);
		var_dump($this->parent);
		stream_wrapper_unregister('file');
		stream_wrapper_register('file', 'MyWrapper');
		var_dump($this->parent);
		return $this->parent ? true : false;
	}
	
	/** @return string */ public function stream_read ( $count )
	{ $GLOBALS['calls'][] = "stream_read( " . print_r(func_get_args(), true) . ")\n";
		$this->length += $count;
		return fread($this->parent, $count);
	}
	
	/** @return bool */ public function stream_seek ( $offset , $whence = SEEK_SET )
	{ $GLOBALS['calls'][] = "stream_seek( " . print_r(func_get_args(), true) . ")\n";
		return fseek($this->parent, $offset, $whence);
	}
	
	/** @return bool */ public function stream_set_option ( $option , $arg1 , $arg2 )
	{ $GLOBALS['calls'][] = "stream_set_option( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return array */ public function stream_stat ()
	{ $GLOBALS['calls'][] = "stream_stat( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return int */ public function stream_tell ()
	{ $GLOBALS['calls'][] = "stream_tell( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return int */ public function stream_write ( $data )
	{ $GLOBALS['calls'][] = "stream_write( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return bool */ public function unlink ( $path )
	{ $GLOBALS['calls'][] = "unlink( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
	
	/** @return array */ public function url_stat ( $path , $flags )
	{ $GLOBALS['calls'][] = "url_stat( " . print_r(func_get_args(), true) . ")\n";
		return false;
	}
}

$GLOBALS['calls'] = array();

stream_wrapper_unregister('file');
stream_wrapper_register("file", "MyWrapper", 0)
    or die("Failed to register protocol");

$myvar = "";

include('inc.php');

/*
for ($i=0; $i<1000000; $i++)
{
	$fp = fopen("file:///tmp/rand", "r+");

	rewind($fp);
	while (!feof($fp)) {
		echo fgets($fp);
	}
	fclose($fp);
}
*/

var_dump($GLOBALS['calls']);
exit;
