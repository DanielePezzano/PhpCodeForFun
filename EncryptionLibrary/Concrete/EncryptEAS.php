<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EncryptEAS
 *
 * @author pezzanod
 */
namespace EncriptionLib\Concrete;

require_once 'Interfaces/IOneWayEncrypt.php';
require_once 'Interfaces/IReverseEncrypt.php';

use EncriptionLib\Interfaces\IOneWayEncrypt;
use EncriptionLib\Interfaces\IReverseEncrypt;

class EncryptEAS implements IOneWayEncrypt, IReverseEncrypt{
    
    private $chiper;
    private $iv;
    private $key;
    private $tag;

    const NotValidEncryption = "This Method is not Valid";
    const patchMethod = 'sha256';
    
    public function __construct($_chiper, $_iv, $_key,$_tag) {
        $this->chiper = $_chiper;
        $this->iv = $_iv;
        $this->key = $_key;
        $this->tag = $_tag;
        if (!in_array($this->chiper, openssl_get_cipher_methods())) {
            throw new Exception(self::NotValidEncryption);
        }
    }
    
     public static function CreateEncriptor($_chiper,$_iv,$_key,$_tag){
        return new EncryptEAS($_chiper,$_iv,$_key,$_tag);
    }
    
    public function Decrypt($encrypted) {
        
    }

    public function Encrypt($toEncrypt) {
        return openssl_encrypt($toEncrypt, $this->chiper, $this->key, $options, $this->iv,$this->tag);
    }

//put your code here
}
