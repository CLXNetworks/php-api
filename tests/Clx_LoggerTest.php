<?php
require_once __DIR__ . '/../clxapi/Clx_Logger.php';

class Clx_LoggerTest extends PHPUnit_Framework_TestCase {

    private $logger;

    private $filePath;

    public function setUp()
    {
        $this->filePath =  __DIR__ . "/logs/log.txt";

        $this->logger = Clx_Logger::getInstance();
        $this->logger->setLogFile( $this->filePath );
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf( 'Clx_Logger', $this->logger);
    }

    public function testCreatingFileOnFirstLog()
    {
        $this->assertFileNotExists( $this->filePath );
        $this->logger->log('test');
        $this->assertFileExists( $this->filePath );
    }

    public function testAppendingToFile()
    {
        $this->logger->log('test1');
        $this->logger->log('test2');
        $this->logger->log('test3');
        $this->logger->log('test4');
        $this->assertCount(4, file( $this->filePath ));

    }

    public function testLogInfo()
    {
        $this->logger->log('test', Clx_Logger::INFO);
        $expected = file_get_contents( $this->filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| INFO: test)$/', $expected );
    }

    public function testLogDebug()
    {
        $this->logger->log('test', Clx_Logger::DEBUG);
        $expected = file_get_contents( $this->filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| DEBUG: test)$/', $expected );
    }

    public function testLogWarn()
    {
        $this->logger->log('test', Clx_Logger::WARN);
        $expected = file_get_contents( $this->filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| WARN: test)$/', $expected );
    }

    public function testLogError()
    {
        $this->logger->log('test', Clx_Logger::ERROR);
        $expected = file_get_contents( $this->filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| ERROR: test)$/', $expected );
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