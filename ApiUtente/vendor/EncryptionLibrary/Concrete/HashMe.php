<?php
namespace EncriptionLib\Concrete;


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
