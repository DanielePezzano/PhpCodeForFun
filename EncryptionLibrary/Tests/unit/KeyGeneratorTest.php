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
    public function testFileExists()
    {
            $this->tester->assertFileExists('KeyGenerator.php');        
    }
    
    public function testDefaultKeyGeneration(){
        $this->tester->assertTrue(KeyGenerator::CreateKeyGenerator()->GenerateKey()!="");        
    }
    
    public function testKeyGenerationForAllChiper(){
        foreach (openssl_get_cipher_methods() as $method) {
            $this->tester->assertTrue(KeyGenerator::CreateKeyGenerator($method)->GenerateKey()!="");
        }
    }
}