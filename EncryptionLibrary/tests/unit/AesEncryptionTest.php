<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AesEncryptionTest
 *
 * @author pezzanod
 */
use EncriptionLib\Client\EncryptClient;
use EncriptionLib\KeyGenerator;

require_once('Client/EncryptClient.php');
//require_once('KeyGenerator.php');

class AesEncryptionTest extends \Codeception\Test\Unit {

    protected $tester;
    protected $testoOriginale = "mio testo da criptare";

    protected function _before() {
        
    }

    protected function _after() {
        
    }
//
//    public function testDESEDE3CFB1() {
//        $this->DoTesting("DES-EDE3-CFB1"); //no tag!!!!
//    }
//
    
    public function testDesEde3Cfb1(){
        $_chiper = "DES-EDE3-CFB1";
        $keyGen = KeyGenerator::CreateKeyGenerator($_chiper);
        $_key = $keyGen->GenerateKey();
        $_iv = $keyGen->GenerateIV();
        
        $ciphertext_raw =  openssl_encrypt($this->testoOriginale, $_chiper, $_key, $options = OPENSSL_RAW_DATA, $_iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $_key, $as_binary = true);
        $crypted =  base64_encode($_iv . $hmac . $ciphertext_raw);
        
        $this->tester->assertTrue(!is_null($crypted),"CRYPTED: $crypted");
        $this->tester->assertTrue($crypted!=false);
        
        $decripted = $this->Decrypt($crypted, $_chiper, $_key, $_iv);
        
        $this->tester->assertTrue(!is_null($decripted),"decripted: $decripted");
        $this->tester->assertTrue($decripted!=false);
        
        $this->tester->assertEquals($this->testoOriginale,$decripted,"decripted: $decripted");
    }
    
    
    private function Decrypt($encrypted,$chiper,$key,$iv) {
        $coded64 = base64_decode($encrypted);
        $ivlen = openssl_cipher_iv_length($chiper);
        $hmac = substr($coded64, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($coded64, $ivlen + $sha2len);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $chiper, $key, $options = OPENSSL_RAW_DATA, $iv);
        return (hash_equals($hmac, $calcmac)) ? $original_plaintext : false;
    }
// 

//    public function testidaes128wrap() {
//        $this->DoTesting("id-aes128-wrap");
//    }



//    public function testidaes192wrap() {
//        $this->DoTesting("id-aes192-wrap");
//    }



//    public function testidaes256wrap() {
//        $this->DoTesting("id-aes256-wrap");
//    }
//
//    public function testidsmimealgCMS3DESwrap() {
//        $this->DoTesting("id-smime-alg-CMS3DESwrap");
//    }
    
    
}
