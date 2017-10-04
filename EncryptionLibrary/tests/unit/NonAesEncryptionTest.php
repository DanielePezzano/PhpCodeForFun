<?php

use EncriptionLib\Client\EncryptClient;
use EncriptionLib\KeyGenerator;

require_once('Client/EncryptClient.php');

class NonAesEncryptionTest extends \Codeception\Test\Unit {

    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $testoOriginale = "mio testo da criptare";

    protected function _before() {
        
    }

    protected function _after() {
        
    }
//
//    public function testDesEDE3Cfb1() {
//        $type = EncryptClient::General;
//        $_chiper = "DES-EDE3-CFB1";
//        $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
//        $_key = $keyGen->GenerateKey();
//        $_iv = $keyGen->GenerateIV();
//        $_tag = null;
//        $lengt = openssl_cipher_iv_length($_chiper);
//        $cryptor = EncryptClient::CreateClient($this->testoOriginale, $type, $_chiper, $_iv, $_key, $_tag);
//        $encrypted = $cryptor->CryptMyData();
//        $this->tester->assertNotEmpty($encrypted, "METODO : $_chiper \r\n");
//        $decrypted = $cryptor->DecryptMyData($encrypted);
//        $this->tester->assertEquals($this->testoOriginale, $decrypted, "------METODO: $_chiper--------\r\n");
//    }

    // tests
    public function testNonEasEncryption() {
        $type = EncryptClient::General;
        $i = 0;
        foreach (openssl_get_cipher_methods() as $_chiper) {
            if (strtolower(substr($_chiper, 0, 3)) != "aes" && strtolower($_chiper)!="des-ede3-cfb1") {
                $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
                $_key = $keyGen->GenerateKey();
                $_tag = (strpos($_chiper, 'GCM') || strpos($_chiper, 'CCM')) ? $keyGen->GenerateKey() : null;
                $_iv = $keyGen->GenerateIV();


                $cryptor = EncryptClient::CreateClient($this->testoOriginale, $type, $_chiper, $_iv, $_key, $_tag);
                $encrypted = $cryptor->CryptMyData();
//                $this->tester->assertNotEmpty($encrypted, "METODO : $_chiper \r\n");
//                $decrypted = $cryptor->DecryptMyData($encrypted);
//                $this->tester->assertFalse(is_bool($decrypted));
//                $this->tester->assertEquals($this->testoOriginale, $decrypted, "------METODO $i: $_chiper--------\r\n");
            }
            $i++;
        }
    }
}
