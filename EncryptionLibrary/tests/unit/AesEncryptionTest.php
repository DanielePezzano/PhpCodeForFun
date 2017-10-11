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

class AesEncryptionTest extends \Codeception\Test\Unit {

    protected $tester;
    protected $type = EncryptClient::General;
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
