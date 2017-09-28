<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encrypt
 *
 * @author pezzanod
 */
use EncriptionLib\Interfaces\IOneWayEncrypt;
use EncriptionLib\Interfaces\IReverseEncrypt;
use Exception;

class EncryptNonEas implements IOneWayEncrypt, IReverseEncrypt {

    private $chiper;
    private $iv;
    private $key;

    const NotValidEncryption = "This Method is not Valid";
    const patchMethod = 'sha256';

    public function __construct($_chiper, $_iv, $_key) {
        $this->chiper = $_chiper;
        $this->iv = $_iv;
        $this->key = $_key;
        if (!in_array($this->chiper, openssl_get_cipher_methods())) {
            throw new Exception(self::NotValidEncryption, "500", "");
        }
    }

    public function Decrypt($encrypted) {
        $coded64 = base64_decode($encrypted);
        $ivlen = openssl_cipher_iv_length($this->chiper);
        $hmac = substr($coded64, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($coded64, $ivlen+$sha2len);
        $calcmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary=true);
        $original_plaintext = openssl_decrypt($ciphertext_raw, $this->chiper, $this->key, $options=OPENSSL_RAW_DATA, $this->iv);
        
        
        return (hash_equals($hmac, $calcmac)) ? $original_plaintext : false;
    }
    
    public function Encrypt($toEncrypt) {
        $ciphertext_raw = openssl_encrypt($toEncrypt, $this->chiper, $this->key, $options=OPENSSL_RAW_DATA, $this->iv);
        $hmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary=true);
        return base64_encode( $this->iv.$hmac.$ciphertext_raw );
    }

//put your code here
}
