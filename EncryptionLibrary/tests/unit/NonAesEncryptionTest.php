<?php

use EncriptionLib\Client\EncryptClient;
use EncriptionLib\KeyGenerator;

require_once('Client/EncryptClient.php');

class NonAesEncryptionTest extends \Codeception\Test\Unit {

    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $type = EncryptClient::General;
    protected $testoOriginale = "mio testo da criptare";

    protected function _before() {
        
    }

    protected function _after() {
        
    }

    /*

      [28] => 
      [29] => 
      [30] => 
     
     */

//    public function testAES128CFB() {
//        $this->DoTesting("AES-128-CFB");
//    }
//
//    public function testAES128CBC() {
//        $_chiper = "AES-128-CBC";
//        $this->DoTesting($_chiper);
//    }
//
//    public function testAES128CFB1() {
//        $this->DoTesting("AES-128-CFB1");
//    }
//
//    public function testAES128CFB8() {
//        $this->DoTesting("AES-128-CFB8");
//    }
//
//    public function testAES128CTR() {
//        $this->DoTesting("AES-128-CTR");
//    }
//
//    public function testAES128ECB() {
//        $this->DoTesting("AES-128-ECB");
//    }
//
//    public function testAES128OFB() {
//        $this->DoTesting("AES-128-OFB");
//    }
//
//    public function testAES128XTS() {
//        $this->DoTesting("AES-128-XTS");
//    }
//    
//    //
//    public function testAES192CBC() {
//        $this->DoTesting("AES-192-CBC");
//    }
//    
//    public function testAES192CFB(){
//        $this->DoTesting("AES-192-CFB");
//    }
//    
//    public function testAES192CFB1(){
//        $this->DoTesting("AES-192-CFB1");
//    }
//    
//    public function testAES192CFB8(){
//        $this->DoTesting("AES-192-CFB8");
//    }
//    
//    public function testAES192CTR(){
//        $this->DoTesting("AES-192-CTR");
//    }
//    
//    public function testAES192ECB(){
//        $this->DoTesting("AES-192-ECB");
//    }
//    
//    public function testAES192OFB(){
//        $this->DoTesting("AES-192-OFB");
//    }
//    
//    public function testAES256CBC(){
//        $this->DoTesting("AES-256-CBC");
//    }
//    
//    public function testAES256CFB(){
//        $this->DoTesting("AES-256-CFB");
//    }
//    
//    public function testAES256CFB1(){
//        $this->DoTesting("AES-256-CFB1");
//    }
//    
//    public function testAES256CFB8(){
//        $this->DoTesting("AES-256-CFB8");
//    }
//    
//    public function testAES256CTR(){
//        $this->DoTesting("AES-256-CTR");
//    }
//    
//    public function testAES256ECB(){
//        $this->DoTesting("AES-256-ECB");
//    }
//    
//    public function testAES256OFB(){
//        $this->DoTesting("AES-256-OFB");
//    }
//    
//    public function testAES256XTS(){
//        $this->DoTesting("AES-256-XTS");
//    }
//    
//    public function testBFCBC(){
//        $this->DoTesting("BF-CBC");
//    }
//    
//    public function testBFCFB(){
//        $this->DoTesting("BF-CFB");
//    }
//    
//    public function testBFECB(){
//        $this->DoTesting("BF-ECB");
//    }
//    
//    public function testBFOFB(){
//        $this->DoTesting("BF-OFB");
//    }
//    
//    public function testCAMELLIA128CBC(){
//        $this->DoTesting("CAMELLIA-128-CBC");
//    }
//    
//    public function testCAMELLIA128CFB(){
//        $this->DoTesting("CAMELLIA-128-CFB");
//    }
//    
//    public function testCAMELLIA128CFB1(){
//        $this->DoTesting("CAMELLIA-128-CFB1");
//    }
//    
//    public function testCAMELLIA128CFB8(){
//        $this->DoTesting("CAMELLIA-128-CFB8");
//    }
    
    public function testCAMELLIA128ECB(){$this->DoTesting("CAMELLIA-128-ECB");}
public function testCAMELLIA128OFB(){$this->DoTesting("CAMELLIA-128-OFB");}
public function testCAMELLIA192CBC(){$this->DoTesting("CAMELLIA-192-CBC");}
public function testCAMELLIA192CFB(){$this->DoTesting("CAMELLIA-192-CFB");}
public function testCAMELLIA192CFB1(){$this->DoTesting("CAMELLIA-192-CFB1");}
public function testCAMELLIA192CFB8(){$this->DoTesting("CAMELLIA-192-CFB8");}
public function testCAMELLIA192ECB(){$this->DoTesting("CAMELLIA-192-ECB");}
public function testCAMELLIA192OFB(){$this->DoTesting("CAMELLIA-192-OFB");}
public function testCAMELLIA256CBC(){$this->DoTesting("CAMELLIA-256-CBC");}
public function testCAMELLIA256CFB(){$this->DoTesting("CAMELLIA-256-CFB");}
public function testCAMELLIA256CFB1(){$this->DoTesting("CAMELLIA-256-CFB1");}
public function testCAMELLIA256CFB8(){$this->DoTesting("CAMELLIA-256-CFB8");}
public function testCAMELLIA256ECB(){$this->DoTesting("CAMELLIA-256-ECB");}
public function testCAMELLIA256OFB(){$this->DoTesting("CAMELLIA-256-OFB");}
public function testCAST5CBC(){$this->DoTesting("CAST5-CBC");}
public function testCAST5CFB(){$this->DoTesting("CAST5-CFB");}
public function testCAST5ECB(){$this->DoTesting("CAST5-ECB");}
public function testCAST5OFB(){$this->DoTesting("CAST5-OFB");}
public function testDESCBC(){$this->DoTesting("DES-CBC");}
public function testDESCFB(){$this->DoTesting("DES-CFB");}
public function testDESCFB1(){$this->DoTesting("DES-CFB1");}
public function testDESCFB8(){$this->DoTesting("DES-CFB8");}
public function testDESECB(){$this->DoTesting("DES-ECB");}
public function testDESEDE(){$this->DoTesting("DES-EDE");}
public function testDESEDECBC(){$this->DoTesting("DES-EDE-CBC");}
public function testDESEDECFB(){$this->DoTesting("DES-EDE-CFB");}
public function testDESEDEOFB(){$this->DoTesting("DES-EDE-OFB");}
public function testDESEDE3(){$this->DoTesting("DES-EDE3");}
public function testDESEDE3CBC(){$this->DoTesting("DES-EDE3-CBC");}
public function testDESEDE3CFB(){$this->DoTesting("DES-EDE3-CFB");}
public function testDESEDE3CFB1(){$this->DoTesting("DES-EDE3-CFB1");}
public function testDESEDE3CFB8(){$this->DoTesting("DES-EDE3-CFB8");}
public function testDESEDE3OFB(){$this->DoTesting("DES-EDE3-OFB");}
public function testDESOFB(){$this->DoTesting("DES-OFB");}
public function testDESXCBC(){$this->DoTesting("DESX-CBC");}
public function testGOST2814789(){$this->DoTesting("GOST 28147-89");}
public function testIDEACBC(){$this->DoTesting("IDEA-CBC");}
public function testIDEACFB(){$this->DoTesting("IDEA-CFB");}
public function testIDEAECB(){$this->DoTesting("IDEA-ECB");}
public function testIDEAOFB(){$this->DoTesting("IDEA-OFB");}
public function testRC240CBC(){$this->DoTesting("RC2-40-CBC");}
public function testRC264CBC(){$this->DoTesting("RC2-64-CBC");}
public function testRC2CBC(){$this->DoTesting("RC2-CBC");}
public function testRC2CFB(){$this->DoTesting("RC2-CFB");}
public function testRC2ECB(){$this->DoTesting("RC2-ECB");}
public function testRC2OFB(){$this->DoTesting("RC2-OFB");}
public function testRC4(){$this->DoTesting("RC4");}
public function testRC440(){$this->DoTesting("RC4-40");}
public function testRC4HMACMD5(){$this->DoTesting("RC4-HMAC-MD5");}
public function testSEEDCBC(){$this->DoTesting("SEED-CBC");}
public function testSEEDCFB(){$this->DoTesting("SEED-CFB");}
public function testSEEDECB(){$this->DoTesting("SEED-ECB");}
public function testSEEDOFB(){$this->DoTesting("SEED-OFB");}
public function testaes128cbc(){$this->DoTesting("aes-128-cbc");}
public function testaes128ccm(){$this->DoTesting("aes-128-ccm");}
public function testaes128cfb(){$this->DoTesting("aes-128-cfb");}
public function testaes128cfb1(){$this->DoTesting("aes-128-cfb1");}
public function testaes128cfb8(){$this->DoTesting("aes-128-cfb8");}
public function testaes128ctr(){$this->DoTesting("aes-128-ctr");}
public function testaes128ecb(){$this->DoTesting("aes-128-ecb");}
public function testaes128gcm(){$this->DoTesting("aes-128-gcm");}
public function testaes128ofb(){$this->DoTesting("aes-128-ofb");}
public function testaes128xts(){$this->DoTesting("aes-128-xts");}
public function testaes192cbc(){$this->DoTesting("aes-192-cbc");}
public function testaes192ccm(){$this->DoTesting("aes-192-ccm");}
public function testaes192cfb(){$this->DoTesting("aes-192-cfb");}
public function testaes192cfb1(){$this->DoTesting("aes-192-cfb1");}
public function testaes192cfb8(){$this->DoTesting("aes-192-cfb8");}
public function testaes192ctr(){$this->DoTesting("aes-192-ctr");}
public function testaes192ecb(){$this->DoTesting("aes-192-ecb");}
public function testaes192gcm(){$this->DoTesting("aes-192-gcm");}
public function testaes192ofb(){$this->DoTesting("aes-192-ofb");}
public function testaes256cbc(){$this->DoTesting("aes-256-cbc");}
public function testaes256ccm(){$this->DoTesting("aes-256-ccm");}
public function testaes256cfb(){$this->DoTesting("aes-256-cfb");}
public function testaes256cfb1(){$this->DoTesting("aes-256-cfb1");}
public function testaes256cfb8(){$this->DoTesting("aes-256-cfb8");}
public function testaes256ctr(){$this->DoTesting("aes-256-ctr");}
public function testaes256ecb(){$this->DoTesting("aes-256-ecb");}
public function testaes256gcm(){$this->DoTesting("aes-256-gcm");}
public function testaes256ofb(){$this->DoTesting("aes-256-ofb");}
public function testaes256xts(){$this->DoTesting("aes-256-xts");}
public function testbfcbc(){$this->DoTesting("bf-cbc");}
public function testbfcfb(){$this->DoTesting("bf-cfb");}
public function testbfecb(){$this->DoTesting("bf-ecb");}
public function testbfofb(){$this->DoTesting("bf-ofb");}
public function testcamellia128cbc(){$this->DoTesting("camellia-128-cbc");}
public function testcamellia128cfb(){$this->DoTesting("camellia-128-cfb");}
public function testcamellia128cfb1(){$this->DoTesting("camellia-128-cfb1");}
public function testcamellia128cfb8(){$this->DoTesting("camellia-128-cfb8");}
//public function testcamellia128ecb(){$this->DoTesting("camellia-128-ecb");}
//public function testcamellia128ofb(){$this->DoTesting("camellia-128-ofb");}
//public function testcamellia192cbc(){$this->DoTesting("camellia-192-cbc");}
//public function testcamellia192cfb(){$this->DoTesting("camellia-192-cfb");}
//public function testcamellia192cfb1(){$this->DoTesting("camellia-192-cfb1");}
//public function testcamellia192cfb8(){$this->DoTesting("camellia-192-cfb8");}
//public function testcamellia192ecb(){$this->DoTesting("camellia-192-ecb");}
//public function testcamellia192ofb(){$this->DoTesting("camellia-192-ofb");}
//public function testcamellia256cbc(){$this->DoTesting("camellia-256-cbc");}
//public function testcamellia256cfb(){$this->DoTesting("camellia-256-cfb");}
//public function testcamellia256cfb1(){$this->DoTesting("camellia-256-cfb1");}
//public function testcamellia256cfb8(){$this->DoTesting("camellia-256-cfb8");}
//public function testcamellia256ecb(){$this->DoTesting("camellia-256-ecb");}
//public function testcamellia256ofb(){$this->DoTesting("camellia-256-ofb");}
//public function testcast5cbc(){$this->DoTesting("cast5-cbc");}
//public function testcast5cfb(){$this->DoTesting("cast5-cfb");}
//public function testcast5ecb(){$this->DoTesting("cast5-ecb");}
//public function testcast5ofb(){$this->DoTesting("cast5-ofb");}
//public function testdescbc(){$this->DoTesting("des-cbc");}
//public function testdescfb(){$this->DoTesting("des-cfb");}
//public function testdescfb1(){$this->DoTesting("des-cfb1");}
//public function testdescfb8(){$this->DoTesting("des-cfb8");}
//public function testdesecb(){$this->DoTesting("des-ecb");}
//public function testdesede(){$this->DoTesting("des-ede");}
//public function testdesedecbc(){$this->DoTesting("des-ede-cbc");}
//public function testdesedecfb(){$this->DoTesting("des-ede-cfb");}
//public function testdesedeofb(){$this->DoTesting("des-ede-ofb");}
//public function testdesede3(){$this->DoTesting("des-ede3");}
//public function testdesede3cbc(){$this->DoTesting("des-ede3-cbc");}
//public function testdesede3cfb(){$this->DoTesting("des-ede3-cfb");}
//public function testdesede3cfb1(){$this->DoTesting("des-ede3-cfb1");}
//public function testdesede3cfb8(){$this->DoTesting("des-ede3-cfb8");}
//public function testdesede3ofb(){$this->DoTesting("des-ede3-ofb");}
//public function testdesofb(){$this->DoTesting("des-ofb");}
//public function testdesxcbc(){$this->DoTesting("desx-cbc");}
public function testgost89(){$this->DoTesting("gost89");}
public function testgost89cnt(){$this->DoTesting("gost89-cnt");}
public function testidaes128CCM(){$this->DoTesting("id-aes128-CCM");}
public function testidaes128GCM(){$this->DoTesting("id-aes128-GCM");}
public function testidaes128wrap(){$this->DoTesting("id-aes128-wrap");}
public function testidaes192CCM(){$this->DoTesting("id-aes192-CCM");}
public function testidaes192GCM(){$this->DoTesting("id-aes192-GCM");}
public function testidaes192wrap(){$this->DoTesting("id-aes192-wrap");}
public function testidaes256CCM(){$this->DoTesting("id-aes256-CCM");}
public function testidaes256GCM(){$this->DoTesting("id-aes256-GCM");}
public function testidaes256wrap(){$this->DoTesting("id-aes256-wrap");}
public function testidsmimealgCMS3DESwrap(){$this->DoTesting("id-smime-alg-CMS3DESwrap");}
//public function testideacbc(){$this->DoTesting("idea-cbc");}
//public function testideacfb(){$this->DoTesting("idea-cfb");}
//public function testideaecb(){$this->DoTesting("idea-ecb");}
//public function testideaofb(){$this->DoTesting("idea-ofb");}
//public function testrc240cbc(){$this->DoTesting("rc2-40-cbc");}
//public function testrc264cbc(){$this->DoTesting("rc2-64-cbc");}
//public function testrc2cbc(){$this->DoTesting("rc2-cbc");}
//public function testrc2cfb(){$this->DoTesting("rc2-cfb");}
//public function testrc2ecb(){$this->DoTesting("rc2-ecb");}
//public function testrc2ofb(){$this->DoTesting("rc2-ofb");}
//public function testrc4(){$this->DoTesting("rc4");}
//public function testrc440(){$this->DoTesting("rc4-40");}
//public function testrc4hmacmd5(){$this->DoTesting("rc4-hmac-md5");}
//public function testseedcbc(){$this->DoTesting("seed-cbc");}
//public function testseedcfb(){$this->DoTesting("seed-cfb");}
//public function testseedecb(){$this->DoTesting("seed-ecb");}
//public function testseedofb(){$this->DoTesting("seed-ofb");}

    
    private function DoTesting($_chiper) {
        $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
        $_key = $keyGen->GenerateKey();
        $_iv = $keyGen->GenerateIV();

        $cryptor = EncryptClient::CreateClient($this->testoOriginale, $this->type, $_chiper, $_iv, $_key);
        $this->tester->assertNotNull($cryptor, "");

        $crypted = $cryptor->CryptMyData();
        $this->tester->assertNotEmpty($crypted);
        $decrypted = $cryptor->DecryptMyData($crypted);
        $this->tester->assertNotEmpty($decrypted);
        $this->tester->assertEquals($decrypted, $this->testoOriginale, $decrypted);
    }

}
