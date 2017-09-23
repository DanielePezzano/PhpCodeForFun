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
class KeyGenerator {
    //put your code here
    private $chiper;
    
    public function __construct($_chiper) {
        $this->chiper = $_chiper;
    }
    
    public function GenerateKey(){
        $ivlen = openssl_cipher_iv_length($this->chiper);
        return openssl_random_pseudo_bytes($ivlen);
    }
}
