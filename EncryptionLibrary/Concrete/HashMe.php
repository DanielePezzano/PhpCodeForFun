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

use EncriptionLib\Interfaces\IOneWayEncrypt;
use Exception;

class HashMe implements IOneWayEncrypt{
    
    private $hashMetod;

    const NotValidEncryption = "This Method is not Valid";
    
    public function __construct($_hashMetod) {
        $this->hashMetod = $_hashMetod;
        if (!in_array($_hashMetod, hash_algos())){
            throw new Exception(self::NotValidEncryption, "500", "");
        }
    }
    
    public static function CreateHash($_hashMetod){
        return new HashMe($_hashMetod);
    }
    
    public function Encrypt($toEncrypt) {
        return hash($this->hashMetod, $toEncrypt);
    }
//put your code here
}
