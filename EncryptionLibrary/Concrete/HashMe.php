<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OneWayHashing
 *
 * @author pezzanod
 */

namespace EncriptionLib\Concrete;

require_once 'Interfaces/IOneWayEncrypt.php';

use EncriptionLib\Interfaces\IOneWayEncrypt;
use Exception;

class HashMe implements IOneWayEncrypt{
    
    private $hashMetod;

    const NotValidEncryption = "Not Supported Hash Method";
    
    public function __construct($_hashMetod) {
        $this->hashMetod = $_hashMetod;
        if (!in_array($_hashMetod, hash_algos())){
            throw new Exception(self::NotValidEncryption);
        }
    }
    
    public static function CreateHash($_hashMetod){
        return new HashMe($_hashMetod);
    }
    
    public function Encrypt($toEncrypt) {
        return hash($this->hashMetod, $toEncrypt);
    }
    
    public static function CreateHasher($_hashMethod){
        return new HashMe($_hashMethod);
    }
}
