<?php
require_once __DIR__ . '/../clxapi/Clx_Logger.php';

class Clx_LoggerTest extends PHPUnit_Framework_TestCase {

    private $logger;

    const filePath = "./logs/log.txt";

    public function setUp()
    {
        $this->logger = Clx_Logger::getInstance();
    }

    public function testGetInstance()
    {
        $this->assertInstanceOf( 'Clx_Logger', $this->logger);
    }

    public function testCreatingFileOnFirstLog()
    {
        $this->assertFileNotExists( self::filePath );
        $this->logger->log('test');
        $this->assertFileExists( self::filePath );
    }

    public function testAppendingToFile()
    {
        $this->logger->log('test1');
        $this->logger->log('test2');
        $this->logger->log('test3');
        $this->logger->log('test4');
        $this->assertCount(4, file( self::filePath ));

    }

    public function testLogInfo()
    {
        $this->logger->log('test', Clx_Logger::INFO);
        $expected = file_get_contents( self::filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| INFO: test)$/', $expected );
    }

    public function testLogDebug()
    {
        $this->logger->log('test', Clx_Logger::DEBUG);
        $expected = file_get_contents( self::filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| DEBUG: test)$/', $expected );
    }

    public function testLogWarn()
    {
        $this->logger->log('test', Clx_Logger::WARN);
        $expected = file_get_contents( self::filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| WARN: test)$/', $expected );
    }

    public function testLogError()
    {
        $this->logger->log('test', Clx_Logger::ERROR);
        $expected = file_get_contents( self::filePath );

        $this->assertRegExp('/^(\d{2})-(\d{2})-(\d{2}) (\d{2}):(\d{2}):(\d{2}) (\| ERROR: test)$/', $expected );
    }

    
    public function tearDown()
    {
        if ( file_exists( self::filePath ))
        {
            unlink( self::filePath );
        }
        Clx_Logger::reset();
    }

}

?>