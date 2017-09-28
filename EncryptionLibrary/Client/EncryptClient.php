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
use EncriptionLib\Interfaces\IOneWayEncrypt;
use EncriptionLib\Interfaces\IReverseEncrypt;

class EncryptClient {

    const Hash = "hash";
    const AES = "aes";
    const General = "general";
    const NotValidEncryption = "This type is not Valid";

    private $chiper;
    private $iv;
    private $key;
    private $concreteEncryptor;

    public function __construct($type) {
        
    }

    private function InitEncryptor() {
        return [
            [self::AES] => EncryptEAS::CreateEncriptor($this->chiper, $this->iv, $this->key),
            [self::General]=>  EncryptNonEas::CreateEncriptor($this->chiper, $this->iv, $this->key),
            [self::Hash]=>  HashMe::CreateHash($this->chiper)
        ];
    }

}
