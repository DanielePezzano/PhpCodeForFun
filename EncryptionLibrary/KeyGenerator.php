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
        return
                ($this->chiper != NULL && $this->chiper != "") ?
                $this->GenerateChiperKey() :
                $this->GenerateStandardKey();
    }

    private function GenerateStandardKey() {
        return openssl_random_pseudo_bytes(32);
    }

    private function GenerateChiperKey() {
        $ivlen = openssl_cipher_iv_length($this->chiper);
        $generatedKey = openssl_random_pseudo_bytes($ivlen);
        return  ($this->IsKeyValid($generatedKey))? $generatedKey : $this->GenerateStandardKey();
    }
    
    private function IsKeyValid($generatedKey){
        return ($generatedKey!=null && $generatedKey!="" && $generatedKey!=0);
    }

    public static function CreateKeyGenerator($_chiper = null) {
        return new KeyGenerator($_chiper);
    }

}
