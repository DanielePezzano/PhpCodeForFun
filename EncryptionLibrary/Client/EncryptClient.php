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
use Exception;

class EncryptClient {

    const NotValidEncryption = "This type is not Valid";

    private $chiper;
    private $iv;
    private $key;
    private $data;
    private $tag;
    private $concreteEncryptor;
    private $isEncryption;

    public function __construct($_data,$_chiper,$_iv = null, $_key = null,$_tag=null) {
        $this->chiper = $_chiper;
        $this->key = $_key;
        $this->iv = $_iv;
        $this->data = $_data;
        $this->tag = $_tag;
        $this->CheckChiperType();
        $this->InitEncryptor();
    }
    
    private function InitEncryptor() {
        if ($this->isEncryption) {
            $this->concreteEncryptor = EncryptNonEas::CreateEncriptor($this->chiper, $this->iv, $this->key, $this->tag);
        } else {
            $this->concreteEncryptor = HashMe::CreateHash($this->chiper);
        }
    }
    
    private function CheckChiperType(){
        $this->isEncryption = $this->IsAnEncryptionAlgoritm();
        if (!$this->isEncryption && !$this->IsAnHashAlgoritm()){
             throw new Exception(self::NotValidEncryption);
        }
    }
    
    private function IsAnHashAlgoritm(){
        return in_array($this->chiper, hash_algos());
    }
    
    private function IsAnEncryptionAlgoritm(){
        return in_array($this->chiper, openssl_get_cipher_methods());
    }
    
    public function CryptMyData(){
        return $this->concreteEncryptor->Encrypt($this->data);
    }
    
    public function DecryptMyData($data=null){
        $toDecrypt = ($data==null) ? $this->data : $data;
        return $this->concreteEncryptor->Decrypt($toDecrypt);
    }

    public static function CreateClient($_data,$_chiper,$_iv = null, $_key = null,$_tag=null){
        return new EncryptClient($_data, $_chiper, $_iv, $_key,$_tag);
    }
    
    public function IsThisAnEncryptionAlgol(){
        return $this->IsAnEncryptionAlgoritm();
    }
}
