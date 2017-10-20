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

namespace EncriptionLib\Concrete;

require_once 'Interfaces/IOneWayEncrypt.php';
require_once 'Interfaces/IReverseEncrypt.php';

use EncriptionLib\Interfaces\IOneWayEncrypt;
use EncriptionLib\Interfaces\IReverseEncrypt;
use Exception;

class Encrypter implements IOneWayEncrypt, IReverseEncrypt {

    private $chiper;
    private $iv;
    private $key;
    private $tag;

    const TestedChipres = ["CAMELLIA-128-ECB",
        "CAMELLIA-128-OFB",
        "CAMELLIA-192-CBC",
        "CAMELLIA-192-CFB",
        "CAMELLIA-192-CFB1",
        "CAMELLIA-192-CFB8",
        "CAMELLIA-192-ECB",
        "CAMELLIA-192-OFB",
        "CAMELLIA-256-CBC",
        "CAMELLIA-256-CFB",
        "CAMELLIA-256-CFB1",
        "CAMELLIA-256-CFB8",
        "CAMELLIA-256-ECB",
        "CAMELLIA-256-OFB",
        "CAST5-CBC",
        "CAST5-CFB",
        "CAST5-ECB",
        "CAST5-OFB",
        "DES-CBC",
        "DES-CFB",
        "DES-CFB1",
        "DES-CFB8",
        "DES-ECB",
        "DES-EDE",
        "DES-EDE-CBC",
        "DES-EDE-CFB",
        "DES-EDE-OFB",
        "DES-EDE3",
        "DES-EDE3-CBC",
        "DES-EDE3-CFB",
        "DES-EDE3-CFB8",
        "DES-EDE3-OFB",
        "DES-OFB",
        "DESX-CBC",
        "GOST 28147-89",
        "IDEA-CBC",
        "IDEA-CFB",
        "IDEA-ECB",
        "IDEA-OFB",
        "RC2-40-CBC",
        "RC2-64-CBC",
        "RC2-CBC",
        "RC2-CFB",
        "RC2-ECB",
        "RC2-OFB",
        "RC4",
        "RC4-40",
        "RC4-HMAC-MD5",
        "SEED-CBC",
        "SEED-CFB",
        "SEED-ECB",
        "SEED-OFB",
        "aes-128-cbc",
        "aes-128-cfb",
        "aes-128-cfb1",
        "aes-128-cfb8",
        "aes-128-ctr",
        "aes-128-ecb",
        "aes-128-ofb",
        "aes-128-xts",
        "aes-192-cbc",
        "aes-192-cfb",
        "aes-192-cfb1",
        "aes-192-cfb8",
        "aes-192-ctr",
        "aes-192-ecb",
        "aes-192-ofb",
        "aes-256-cbc",
        "aes-256-cfb",
        "aes-256-cfb1",
        "aes-256-cfb8",
        "aes-256-ctr",
        "aes-256-ecb",
        "aes-256-ofb",
        "aes-256-xts",
        "bf-cbc",
        "bf-cfb",
        "bf-ecb",
        "bf-ofb",
        "camellia-128-cbc",
        "camellia-128-cfb",
        "camellia-128-cfb1",
        "camellia-128-cfb8",
        "gost89",
        "gost89-cnt",
        "id-aes256-CCM",
        "id-aes256-GCM",
        "id-aes192-CCM",
        "id-aes192-GCM",
        "aes-128-ccm",
        "aes-128-gcm",
        "aes-192-ccm",
        "aes-192-gcm",
        "aes-256-ccm",
        "aes-256-gcm",
        "id-aes128-CCM",
        "id-aes128-GCM",
    ];
    const ChiperWithNeededTag = [
        'id-aes256-ccm',
        'id-aes256-gcm',
        'id-aes192-ccm',
        'id-aes192-gcm',
        'aes-128-ccm',
        'aes-128-gcm',
        'aes-192-ccm',
        'aes-192-gcm',
        'aes-256-ccm',
        'aes-256-gcm',
        'id-aes128-ccm',
        'id-aes128-gcm'];
    
    const NotValidEncryption = "Not supported Encryption Method";
    const TagNeededForChiper = "The Tag Should Be Provided For this Chiper";
    const patchMethod = 'sha256';

    public function __construct($_chiper, $_iv, $_key, $_tag) {
        $this->chiper = $_chiper;
        $this->iv = $_iv;
        $this->key = $_key;
        $this->tag = $_tag;
        if (!in_array($this->chiper, self::TestedChipres)) {
            throw new Exception(self::NotValidEncryption);
        }

        if ($this->IsTagNeeded() && !$this->IsTagProvided()) {
            throw new Exception(self::TagNeededForChiper);
        }
    }

    public static function CreateEncriptor($_chiper, $_iv, $_key, $_tag) {
        return new Encrypter($_chiper, $_iv, $_key, $_tag);
    }

    public function Decrypt($encrypted) {
        $coded64 = base64_decode($encrypted);
        $ivlen = openssl_cipher_iv_length($this->chiper);
        $hmac = substr($coded64, $ivlen, $sha2len = 32);
        $ciphertext_raw = substr($coded64, $ivlen + $sha2len);
        $calcmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary = true);
        $original_plaintext = ($this->tag != null) ?
                openssl_decrypt($ciphertext_raw, $this->chiper, $this->key, $options = OPENSSL_RAW_DATA, $this->iv, $this->tag) :
                openssl_decrypt($ciphertext_raw, $this->chiper, $this->key, $options = OPENSSL_RAW_DATA, $this->iv);
        return (hash_equals($hmac, $calcmac)) ? $original_plaintext : false;
    }

    public function Encrypt($toEncrypt) {
        $ciphertext_raw = ($this->tag != null) ?
                openssl_encrypt($toEncrypt, $this->chiper, $this->key, $options = OPENSSL_RAW_DATA, $this->iv, $this->tag) :
                openssl_encrypt($toEncrypt, $this->chiper, $this->key, $options = OPENSSL_RAW_DATA, $this->iv);
        $hmac = hash_hmac(self::patchMethod, $ciphertext_raw, $this->key, $as_binary = true);
        return base64_encode($this->iv . $hmac . $ciphertext_raw);
    }

    private function IsTagProvided() {
        return (is_null($this->tag)) ? false : true;
    }

    private function IsTagNeeded() {
        return (in_array(strtolower($this->chiper), self::ChiperWithNeededTag)) ? true : false;
    }

//put your code here
}
