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

require_once 'Concrete/EncryptEAS.php';
require_once 'Concrete/EncryptNonEAS.php';
require_once 'Concrete/HashMe.php';

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
    private $tag;
    private $concreteEncryptor;

    public function __construct($_data,$type,$_chiper,$_iv = null, $_key = null,$_tag=null) {
        $this->chiper = $_chiper;
        $this->key = $_key;
        $this->iv = $_iv;
        $this->data = $_data;
        $this->tag = $_tag;
        $this->CheckRequestedEncryptorType($type);
    }
    
    private function CheckRequestedEncryptorType($type){
        if ($type!=self::AES && $type!=self::Hash && $type!=self::General){
            throw new Exception(self::NotValidEncryption);
        }
       $this->InitEncryptor($type);
    }

    private function InitEncryptor($type) {
        switch ($type) {
            case self::Hash:
                $this->concreteEncryptor = HashMe::CreateHash($this->chiper);
                break;
            case self::AES:
                $this->concreteEncryptor =EncryptEAS::CreateEncriptor($this->chiper, $this->iv, $this->key,$this->tag);
                break;;
            case self::General:
                $this->concreteEncryptor =EncryptNonEas::CreateEncriptor($this->chiper, $this->iv, $this->key,$this->tag);
                break;
        }
    }
    public function CryptMyData(){
        return $this->concreteEncryptor->Encrypt($this->data);
    }
    
    public function DecryptMyData($data=null){
        $toDecrypt = ($data==null) ? $this->data : $data;
        return $this->concreteEncryptor->Decrypt($toDecrypt);
    }

    public static function CreateClient($_data,$type,$_chiper,$_iv = null, $_key = null,$_tag=null){
        return new EncryptClient($_data, $type, $_chiper, $_iv, $_key,$_tag);
    }
}
