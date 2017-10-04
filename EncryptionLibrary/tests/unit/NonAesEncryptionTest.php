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
      [30] => CAMELLIA-128-CFB8
      [31] => CAMELLIA-128-ECB
      [32] => CAMELLIA-128-OFB
      [33] => CAMELLIA-192-CBC
      [34] => CAMELLIA-192-CFB
      [35] => CAMELLIA-192-CFB1
      [36] => CAMELLIA-192-CFB8
      [37] => CAMELLIA-192-ECB
      [38] => CAMELLIA-192-OFB
      [39] => CAMELLIA-256-CBC
      [40] => CAMELLIA-256-CFB
      [41] => CAMELLIA-256-CFB1
      [42] => CAMELLIA-256-CFB8
      [43] => CAMELLIA-256-ECB
      [44] => CAMELLIA-256-OFB
      [45] => CAST5-CBC
      [46] => CAST5-CFB
      [47] => CAST5-ECB
      [48] => CAST5-OFB
      [49] => DES-CBC
      [50] => DES-CFB
      [51] => DES-CFB1
      [52] => DES-CFB8
      [53] => DES-ECB
      [54] => DES-EDE
      [55] => DES-EDE-CBC
      [56] => DES-EDE-CFB
      [57] => DES-EDE-OFB
      [58] => DES-EDE3
      [59] => DES-EDE3-CBC
      [60] => DES-EDE3-CFB
      [61] => DES-EDE3-CFB1
      [62] => DES-EDE3-CFB8
      [63] => DES-EDE3-OFB
      [64] => DES-OFB
      [65] => DESX-CBC
      [66] => GOST 28147-89
      [67] => IDEA-CBC
      [68] => IDEA-CFB
      [69] => IDEA-ECB
      [70] => IDEA-OFB
      [71] => RC2-40-CBC
      [72] => RC2-64-CBC
      [73] => RC2-CBC
      [74] => RC2-CFB
      [75] => RC2-ECB
      [76] => RC2-OFB
      [77] => RC4
      [78] => RC4-40
      [79] => RC4-HMAC-MD5
      [80] => SEED-CBC
      [81] => SEED-CFB
      [82] => SEED-ECB
      [83] => SEED-OFB
      [84] => aes-128-cbc
      [85] => aes-128-ccm
      [86] => aes-128-cfb
      [87] => aes-128-cfb1
      [88] => aes-128-cfb8
      [89] => aes-128-ctr
      [90] => aes-128-ecb
      [91] => aes-128-gcm
      [92] => aes-128-ofb
      [93] => aes-128-xts
      [94] => aes-192-cbc
      [95] => aes-192-ccm
      [96] => aes-192-cfb
      [97] => aes-192-cfb1
      [98] => aes-192-cfb8
      [99] => aes-192-ctr
      [100] => aes-192-ecb
      [101] => aes-192-gcm
      [102] => aes-192-ofb
      [103] => aes-256-cbc
      [104] => aes-256-ccm
      [105] => aes-256-cfb
      [106] => aes-256-cfb1
      [107] => aes-256-cfb8
      [108] => aes-256-ctr
      [109] => aes-256-ecb
      [110] => aes-256-gcm
      [111] => aes-256-ofb
      [112] => aes-256-xts
      [113] => bf-cbc
      [114] => bf-cfb
      [115] => bf-ecb
      [116] => bf-ofb
      [117] => camellia-128-cbc
      [118] => camellia-128-cfb
      [119] => camellia-128-cfb1
      [120] => camellia-128-cfb8
      [121] => camellia-128-ecb
      [122] => camellia-128-ofb
      [123] => camellia-192-cbc
      [124] => camellia-192-cfb
      [125] => camellia-192-cfb1
      [126] => camellia-192-cfb8
      [127] => camellia-192-ecb
      [128] => camellia-192-ofb
      [129] => camellia-256-cbc
      [130] => camellia-256-cfb
      [131] => camellia-256-cfb1
      [132] => camellia-256-cfb8
      [133] => camellia-256-ecb
      [134] => camellia-256-ofb
      [135] => cast5-cbc
      [136] => cast5-cfb
      [137] => cast5-ecb
      [138] => cast5-ofb
      [139] => des-cbc
      [140] => des-cfb
      [141] => des-cfb1
      [142] => des-cfb8
      [143] => des-ecb
      [144] => des-ede
      [145] => des-ede-cbc
      [146] => des-ede-cfb
      [147] => des-ede-ofb
      [148] => des-ede3
      [149] => des-ede3-cbc
      [150] => des-ede3-cfb
      [151] => des-ede3-cfb1
      [152] => des-ede3-cfb8
      [153] => des-ede3-ofb
      [154] => des-ofb
      [155] => desx-cbc
      [156] => gost89
      [157] => gost89-cnt
      [158] => id-aes128-CCM
      [159] => id-aes128-GCM
      [160] => id-aes128-wrap
      [161] => id-aes192-CCM
      [162] => id-aes192-GCM
      [163] => id-aes192-wrap
      [164] => id-aes256-CCM
      [165] => id-aes256-GCM
      [166] => id-aes256-wrap
      [167] => id-smime-alg-CMS3DESwrap
      [168] => idea-cbc
      [169] => idea-cfb
      [170] => idea-ecb
      [171] => idea-ofb
      [172] => rc2-40-cbc
      [173] => rc2-64-cbc
      [174] => rc2-cbc
      [175] => rc2-cfb
      [176] => rc2-ecb
      [177] => rc2-ofb
      [178] => rc4
      [179] => rc4-40
      [180] => rc4-hmac-md5
      [181] => seed-cbc
      [182] => seed-cfb
      [183] => seed-ecb
      [184] => seed-ofb
     */

    public function testAES128CFB() {
        $this->DoTesting("AES-128-CFB");
    }

    public function testAES128CBC() {
        $_chiper = "AES-128-CBC";
        $this->DoTesting($_chiper);
    }

    public function testAES128CFB1() {
        $this->DoTesting("AES-128-CFB1");
    }

    public function testAES128CFB8() {
        $this->DoTesting("AES-128-CFB8");
    }

    public function testAES128CTR() {
        $this->DoTesting("AES-128-CTR");
    }

    public function testAES128ECB() {
        $this->DoTesting("AES-128-ECB");
    }

    public function testAES128OFB() {
        $this->DoTesting("AES-128-OFB");
    }

    public function testAES128XTS() {
        $this->DoTesting("AES-128-XTS");
    }
    
    //
    public function testAES192CBC() {
        $this->DoTesting("AES-192-CBC");
    }
    
    public function testAES192CFB(){
        $this->DoTesting("AES-192-CFB");
    }
    
    public function testAES192CFB1(){
        $this->DoTesting("AES-192-CFB1");
    }
    
    public function testAES192CFB8(){
        $this->DoTesting("AES-192-CFB8");
    }
    
    public function testAES192CTR(){
        $this->DoTesting("AES-192-CTR");
    }
    
    public function testAES192ECB(){
        $this->DoTesting("AES-192-ECB");
    }
    
    public function testAES192OFB(){
        $this->DoTesting("AES-192-OFB");
    }
    
    public function testAES256CBC(){
        $this->DoTesting("AES-256-CBC");
    }
    
    public function testAES256CFB(){
        $this->DoTesting("AES-256-CFB");
    }
    
    public function testAES256CFB1(){
        $this->DoTesting("AES-256-CFB1");
    }
    
    public function testAES256CFB8(){
        $this->DoTesting("AES-256-CFB8");
    }
    
    public function testAES256CTR(){
        $this->DoTesting("AES-256-CTR");
    }
    
    public function testAES256ECB(){
        $this->DoTesting("AES-256-ECB");
    }
    
    public function testAES256OFB(){
        $this->DoTesting("AES-256-OFB");
    }
    
    public function testAES256XTS(){
        $this->DoTesting("AES-256-XTS");
    }
    
    public function testBFCBC(){
        $this->DoTesting("BF-CBC");
    }
    
    public function testBFCFB(){
        $this->DoTesting("BF-CFB");
    }
    
    public function testBFECB(){
        $this->DoTesting("BF-ECB");
    }
    
    public function testBFOFB(){
        $this->DoTesting("BF-OFB");
    }
    
    public function testCAMELLIA128CBC(){
        $this->DoTesting("CAMELLIA-128-CBC");
    }
    
    public function testCAMELLIA128CFB(){
        $this->DoTesting("CAMELLIA-128-CFB");
    }
    
    public function testCAMELLIA128CFB1(){
        $this->DoTesting("CAMELLIA-128-CFB1");
    }
    
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
