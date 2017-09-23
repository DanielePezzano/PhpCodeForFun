<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encriptor
 *
 * @author daniele
 */

class Encriptor {
    
    private $chiper;
    private $iv;
    private $key;
    const patchMethod='sha256';
        
    public function __construct($_chiper,$_iv,$_key) {
        $this->chiper = $_chiper;
        $this->iv = $_iv;
        $this->key = $_key;
    }
    
    public function Encrypt($_dataToEncrypt){
        $ciphertext = null;
        if (in_array($this->chiper, openssl_get_cipher_methods()))
                $ciphertext = $this->PerformEncryption($_dataToEncrypt);
        return $ciphertext;
    }
    
    private function PerformEncryption($_dataToEncrypt){        
        $ciphertext_raw = openssl_encrypt($_dataToEncrypt, $this->chiper, $this->key, $options=OPENSSL_RAW_DATA, $this->iv);
        $hmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary=true);
        return base64_encode( $this->iv.$hmac.$ciphertext_raw );
    }
    
    public function Decrypt($_data){
        $c = base64_decode($_data);
        $ivlen = openssl_cipher_iv_length($this->chiper);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $this->chiper, $this->key, $options=OPENSSL_RAW_DATA, $this->iv);
        $calcmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary=true);
        $this->CheckAndReturnDecryptedData($hmac, $calcmac, $original_plaintext);
    }
    
    private function CheckAndReturnDecryptedData($hmac,$calcmac,$original_plaintext){
        if (hash_equals($hmac, $calcmac)) return $original_plaintext;
        return null;
    }
}
