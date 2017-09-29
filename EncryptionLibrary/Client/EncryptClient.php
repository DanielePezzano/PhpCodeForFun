<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EncryptClient
 *
 * @author pezzanod
 */

namespace EncriptionLib\Client;

use EncriptionLib\Concrete\EncryptEAS;
use EncriptionLib\Concrete\EncryptNonEas;
use EncriptionLib\Concrete\HashMe;

class EncryptClient {

    const Hash = "hash";
    const AES = "aes";
    const General = "general";
    const NotValidEncryption = "This type is not Valid";

    private $chiper;
    private $iv;
    private $key;
    private $data;
    private $concreteEncryptor;

    public function __construct($_data,$type,$_chiper,$_iv = null, $_key = null) {
        $this->chiper = $_chiper;
        $this->key = $_key;
        $this->iv = $_iv;
        $this->data = $_data;
        $this->CheckRequestedEncryptorType($type);
    }
    
    private function CheckRequestedEncryptorType($type){
        if ($type!=self::AES && $type!=self::Hash && $type!=self::General){
            throw new Exception(self::NotValidEncryption, "500", "");
        }
        $this->concreteEncryptor = $this->InitEncryptor()[$type];
    }

    private function InitEncryptor() {
        return [
            [self::AES] => EncryptEAS::CreateEncriptor($this->chiper, $this->iv, $this->key),
            [self::General]=>  EncryptNonEas::CreateEncriptor($this->chiper, $this->iv, $this->key),
            [self::Hash]=>  HashMe::CreateHash($this->chiper)
        ];
    }
    public function CryptMyData(){
        return $this->concreteEncryptor->Encrypt($this->data);
    }
    
    public function DecryptMyData(){
        return $this->concreteEncryptor->Decrypt($this->data);
    }

    public static function CreateClient($_data,$type,$_chiper,$_iv = null, $_key = null){
        return new EncryptClient($_data, $type, $_chiper, $_iv, $_key);
    }
}
