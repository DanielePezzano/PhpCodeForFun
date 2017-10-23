<?php

use EncriptionLib\Client\EncryptClient;
use EncriptionLib\KeyGenerator;

require_once('Client/EncryptClient.php');

class EncryptionTest extends \Codeception\Test\Unit {

    protected $tester;
    protected $testoOriginale = "mio testo da criptare";

    protected function _before() {
        
    }

    protected function _after() {
        
    }

    public function testCAMELLIA128ECB() {
        $this->DoTesting("CAMELLIA-128-ECB");
    }

    public function testCAMELLIA128OFB() {
        $this->DoTesting("CAMELLIA-128-OFB");
    }

    public function testCAMELLIA192CBC() {
        $this->DoTesting("CAMELLIA-192-CBC");
    }

    public function testCAMELLIA192CFB() {
        $this->DoTesting("CAMELLIA-192-CFB");
    }

    public function testCAMELLIA192CFB1() {
        $this->DoTesting("CAMELLIA-192-CFB1");
    }

    public function testCAMELLIA192CFB8() {
        $this->DoTesting("CAMELLIA-192-CFB8");
    }

    public function testCAMELLIA192ECB() {
        $this->DoTesting("CAMELLIA-192-ECB");
    }

    public function testCAMELLIA192OFB() {
        $this->DoTesting("CAMELLIA-192-OFB");
    }

    public function testCAMELLIA256CBC() {
        $this->DoTesting("CAMELLIA-256-CBC");
    }

    public function testCAMELLIA256CFB() {
        $this->DoTesting("CAMELLIA-256-CFB");
    }

    public function testCAMELLIA256CFB1() {
        $this->DoTesting("CAMELLIA-256-CFB1");
    }

    public function testCAMELLIA256CFB8() {
        $this->DoTesting("CAMELLIA-256-CFB8");
    }

    public function testCAMELLIA256ECB() {
        $this->DoTesting("CAMELLIA-256-ECB");
    }

    public function testCAMELLIA256OFB() {
        $this->DoTesting("CAMELLIA-256-OFB");
    }

    public function testCAST5CBC() {
        $this->DoTesting("CAST5-CBC");
    }

    public function testCAST5CFB() {
        $this->DoTesting("CAST5-CFB");
    }

    public function testCAST5ECB() {
        $this->DoTesting("CAST5-ECB");
    }

    public function testCAST5OFB() {
        $this->DoTesting("CAST5-OFB");
    }

    public function testDESCBC() {
        $this->DoTesting("DES-CBC");
    }

    public function testDESCFB() {
        $this->DoTesting("DES-CFB");
    }

    public function testDESCFB1() {
        $this->DoTesting("DES-CFB1");
    }

    public function testDESCFB8() {
        $this->DoTesting("DES-CFB8");
    }

    public function testDESECB() {
        $this->DoTesting("DES-ECB");
    }

    public function testDESEDE() {
        $this->DoTesting("DES-EDE");
    }

    public function testDESEDECBC() {
        $this->DoTesting("DES-EDE-CBC");
    }

    public function testDESEDECFB() {
        $this->DoTesting("DES-EDE-CFB");
    }

    public function testDESEDEOFB() {
        $this->DoTesting("DES-EDE-OFB");
    }

    public function testDESEDE3() {
        $this->DoTesting("DES-EDE3");
    }

    public function testDESEDE3CBC() {
        $this->DoTesting("DES-EDE3-CBC");
    }

    public function testDESEDE3CFB() {
        $this->DoTesting("DES-EDE3-CFB");
    }

    public function testDESEDE3CFB8() {
        $this->DoTesting("DES-EDE3-CFB8");
    }

    public function testDESEDE3OFB() {
        $this->DoTesting("DES-EDE3-OFB");
    }

    public function testDESOFB() {
        $this->DoTesting("DES-OFB");
    }

    public function testDESXCBC() {
        $this->DoTesting("DESX-CBC");
    }

    public function testGOST2814789() {
        $this->DoTesting("GOST 28147-89");
    }

    public function testIDEACBC() {
        $this->DoTesting("IDEA-CBC");
    }

    public function testIDEACFB() {
        $this->DoTesting("IDEA-CFB");
    }

    public function testIDEAECB() {
        $this->DoTesting("IDEA-ECB");
    }

    public function testIDEAOFB() {
        $this->DoTesting("IDEA-OFB");
    }

    public function testRC240CBC() {
        $this->DoTesting("RC2-40-CBC");
    }

    public function testRC264CBC() {
        $this->DoTesting("RC2-64-CBC");
    }

    public function testRC2CBC() {
        $this->DoTesting("RC2-CBC");
    }

    public function testRC2CFB() {
        $this->DoTesting("RC2-CFB");
    }

    public function testRC2ECB() {
        $this->DoTesting("RC2-ECB");
    }

    public function testRC2OFB() {
        $this->DoTesting("RC2-OFB");
    }

    public function testRC4() {
        $this->DoTesting("RC4");
    }

    public function testRC440() {
        $this->DoTesting("RC4-40");
    }

    public function testRC4HMACMD5() {
        $this->DoTesting("RC4-HMAC-MD5");
    }

    public function testSEEDCBC() {
        $this->DoTesting("SEED-CBC");
    }

    public function testSEEDCFB() {
        $this->DoTesting("SEED-CFB");
    }

    public function testSEEDECB() {
        $this->DoTesting("SEED-ECB");
    }

    public function testSEEDOFB() {
        $this->DoTesting("SEED-OFB");
    }

    public function testaes128cbc() {
        $this->DoTesting("aes-128-cbc");
    }

    public function testaes128cfb() {
        $this->DoTesting("aes-128-cfb");
    }

    public function testaes128cfb1() {
        $this->DoTesting("aes-128-cfb1");
    }

    public function testaes128cfb8() {
        $this->DoTesting("aes-128-cfb8");
    }

    public function testaes128ctr() {
        $this->DoTesting("aes-128-ctr");
    }

    public function testaes128ecb() {
        $this->DoTesting("aes-128-ecb");
    }

    public function testaes128ofb() {
        $this->DoTesting("aes-128-ofb");
    }

    public function testaes128xts() {
        $this->DoTesting("aes-128-xts");
    }

    public function testaes192cbc() {
        $this->DoTesting("aes-192-cbc");
    }

    public function testaes192cfb() {
        $this->DoTesting("aes-192-cfb");
    }

    public function testaes192cfb1() {
        $this->DoTesting("aes-192-cfb1");
    }

    public function testaes192cfb8() {
        $this->DoTesting("aes-192-cfb8");
    }

    public function testaes192ctr() {
        $this->DoTesting("aes-192-ctr");
    }

    public function testaes192ecb() {
        $this->DoTesting("aes-192-ecb");
    }

    public function testaes192ofb() {
        $this->DoTesting("aes-192-ofb");
    }

    public function testaes256cbc() {
        $this->DoTesting("aes-256-cbc");
    }

    public function testaes256cfb() {
        $this->DoTesting("aes-256-cfb");
    }

    public function testaes256cfb1() {
        $this->DoTesting("aes-256-cfb1");
    }

    public function testaes256cfb8() {
        $this->DoTesting("aes-256-cfb8");
    }

    public function testaes256ctr() {
        $this->DoTesting("aes-256-ctr");
    }

    public function testaes256ecb() {
        $this->DoTesting("aes-256-ecb");
    }

    public function testaes256ofb() {
        $this->DoTesting("aes-256-ofb");
    }

    public function testaes256xts() {
        $this->DoTesting("aes-256-xts");
    }

    public function testbfcbc() {
        $this->DoTesting("bf-cbc");
    }

    public function testbfcfb() {
        $this->DoTesting("bf-cfb");
    }

    public function testbfecb() {
        $this->DoTesting("bf-ecb");
    }

    public function testbfofb() {
        $this->DoTesting("bf-ofb");
    }

    public function testcamellia128cbc() {
        $this->DoTesting("camellia-128-cbc");
    }

    public function testcamellia128cfb() {
        $this->DoTesting("camellia-128-cfb");
    }

    public function testcamellia128cfb1() {
        $this->DoTesting("camellia-128-cfb1");
    }

    public function testcamellia128cfb8() {
        $this->DoTesting("camellia-128-cfb8");
    }

    public function testgost89() {
        $this->DoTesting("gost89");
    }

    public function testgost89cnt() {
        $this->DoTesting("gost89-cnt");
    }

    public function testidaes256CCM() {
        $this->DoTestWithTag("id-aes256-CCM");
    }

    public function testidaes256GCM() {
        $this->DoTestWithTag("id-aes256-GCM");
    }

    public function testidaes192CCM() {
        $this->DoTestWithTag("id-aes192-CCM");
    }

    public function testidaes192GCM() {
        $this->DoTestWithTag("id-aes192-GCM");
    }

    public function testaes128ccm() {
        $this->DoTestWithTag("aes-128-ccm");
    }

    public function testaes128gcm() {
        $this->DoTestWithTag("aes-128-gcm");
    }

    public function testaes192ccm() {
        $this->DoTestWithTag("aes-192-ccm");
    }

    public function testaes192gcm() {
        $this->DoTestWithTag("aes-192-gcm");
    }

    public function testaes256ccm() {
        $this->DoTestWithTag("aes-256-ccm");
    }

//
    public function testaes256gcm() {
        $this->DoTestWithTag("aes-256-gcm");
    }

    public function testidaes128CCM() {
        $this->DoTestWithTag("id-aes128-CCM");
    }

    public function testidaes128GCM() {
        $this->DoTestWithTag("id-aes128-GCM");
    }

    public function testThisShouldRaiseException() {

        $this->tester->expectException(new Exception(EncriptionLib\Concrete\Encrypter::TagNeededForChiper), function() {
            $_chiper = "id-aes128-GCM";
            $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
            $_key = $keyGen->GenerateKey();
            $_iv = $keyGen->GenerateIV();
            EncryptClient::CreateClient($this->testoOriginale, $_chiper, $_iv, $_key);
        }
        );
    }

    private function DoTesting($_chiper) {
        $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
        $_key = $keyGen->GenerateKey();
        $_iv = $keyGen->GenerateIV();
        $cryptor = EncryptClient::CreateClient($this->testoOriginale, $_chiper, $_iv, $_key);
        $this->tester->assertNotNull($cryptor, "");
        $this->DecryptAndCompare($cryptor);
    }

    private function DoTestWithTag($_chiper) {
        $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
        $_key = $keyGen->GenerateKey();
        $_iv = $keyGen->GenerateIV();
        $tag = EncryptClient::CreateClient('MioTestoPerTag', 'sha256')->CryptMyData();
        $cryptor = EncryptClient::CreateClient($this->testoOriginale, $_chiper, $_iv, $_key, $tag);
        $this->tester->assertNotNull($cryptor, "");
        $this->DecryptAndCompare($cryptor);
    }

    private function DecryptAndCompare($cryptor) {
        $this->tester->assertTrue($cryptor->IsThisAnEncryptionAlgol());
        $crypted = $cryptor->CryptMyData();
        $this->tester->assertNotEmpty($crypted);
        $decrypted = $cryptor->DecryptMyData($crypted);
        $this->tester->assertNotEmpty($decrypted);
        $this->tester->assertEquals($decrypted, $this->testoOriginale, $decrypted);
    }

    public function testGetSupportedEncryptionAlgos(){
        $this->tester->assertTrue(is_array(EncryptClient::GetSupportedEncryptionAlgos()));
    }
}
