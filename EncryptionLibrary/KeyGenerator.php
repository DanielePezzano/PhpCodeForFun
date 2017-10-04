<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of KeyGenerator
 *
 * @author daniele
 */

namespace EncriptionLib;

class KeyGenerator {

    //put your code here
    private $chiper;

    public function __construct($_chiper) {
        $this->chiper = $_chiper;
    }

    public function GenerateKey() {
        return $this->GenerateStandardKey();                
    }
    
    public function GenerateIV(){
        $IVlenght = openssl_cipher_iv_length($this->chiper);
        return openssl_random_pseudo_bytes($IVlenght);
    }

    private function GenerateStandardKey() {
        return Concrete\HashMe::CreateHash('sha256')->Encrypt(openssl_random_pseudo_bytes(32));
    }
    
    public static function CreateKeyGenerator($_chiper = null) {
        return new KeyGenerator($_chiper);
    }

}
