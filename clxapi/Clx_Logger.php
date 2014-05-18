<?php

class Clx_Logger 
{
    const INFO = 'INFO';
    const DEBUG = 'DEBUG';
    const WARN = 'WARN';
    const ERROR = 'ERROR';

    /**
     * @var null|Clx_Logger
     */
    private static $_instance = null;

    /*
     * @var string
     */
    private $path = "./logs/log.txt";

    /**
     * Private constructor for singleton use.
     */
    private function __construct(){}

    /**
     * @return Clx_Logger|null
     */
    public static function getInstance()
    {
        if ( self::$_instance === null )
        {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * @param string $path
     */
    public function setLogFile( $path )
    {
        $this->path = $path;
    }

    /**
     * @param string $message
     * @param \const|string $level
     */
    public function log( $message, $level = self::INFO )
    {
        $message = sprintf("%s | %s: %s\n", date('m-d-y H:i:s'), $level, $message);
        file_put_contents( $this->path, $message, FILE_APPEND );
    }

    public static function reset()
    {
        self::$_instance = NULL;
    }

} 