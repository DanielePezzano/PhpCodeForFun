<?php
use EncriptionLib\KeyGenerator;
require('KeyGenerator.php');
class KeyGeneratorTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $this->tester->assertFileExists('KeyGenerator.php');
        $this->tester->assertTrue(KeyGenerator::CreateKeyGenerator()->GenerateKey()!="");        
    }
}