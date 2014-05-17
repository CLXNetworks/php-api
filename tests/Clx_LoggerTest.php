<?php
require_once __DIR__ . '/../clxapi/Clx_Logger.php';

class Clx_LoggerTest extends PHPUnit_Framework_TestCase {

    private $filePath = "./logs/log.txt";

    public function testGetInstance()
    {
        $logger = Clx_Logger::getInstance();

        $this->assertInstanceOf( 'Clx_Logger', $logger);
    }


    public function testCreatingFileOnFirstLog()
    {
        $logger = Clx_Logger::getInstance();

        $this->assertFileNotExists( $this->filePath );
        $logger->log('test');
        $this->assertFileExists( $this->filePath );
    }

    public function testAppendingToFile()
    {
        $logger = Clx_Logger::getInstance();
        $logger->log('test1');
        $logger->log('test2');
        $logger->log('test3');
        $logger->log('test4');
        $this->assertCount(4, file( $this->filePath ));

    }

    public function tearDown()
    {
        if ( file_exists( $this->filePath ))
        {
            unlink( $this->filePath );
        }
        Clx_Logger::reset();
    }

}

?>