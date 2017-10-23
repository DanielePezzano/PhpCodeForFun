<?php
use EncriptionLib\Client\EncryptClient;

require_once('Client/EncryptClient.php');


class HashTest extends \Codeception\Test\Unit
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
        $this->tester->assertFileExists('Client/EncryptClient.php');
    }
    
    public function testSha256Hash(){
        $method = "sha256";
        $plainText = "Pzz!Dnl!0001";
        $encrypted = "28aaf057a501de45219fef77c4e298d2648b7e661c9b19265ab37ec69c849d08";
        $this->tester->assertEquals($encrypted, EncryptClient::CreateClient($plainText, $method)->CryptMyData());
    }
    
    public function testMd5Hash(){
        $method = "md5";
        $plainText = "Pzz!Dnl!0001";
        $encrypted = "0d00b46abd0abdcd38846757261b2daf";
        $this->tester->assertEquals($encrypted, EncryptClient::CreateClient($plainText, $method)->CryptMyData());
    }    
    
    public function testGetSupportedHasingAlogs(){
        $this->tester->assertTrue(is_array(EncryptClient::GetSupportedHasingAlogs()));
    }
}