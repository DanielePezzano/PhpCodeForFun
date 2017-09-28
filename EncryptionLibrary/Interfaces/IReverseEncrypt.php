<?php
namespace Crypto\Interfaces;

interface IReverseEncrypt extends IOneWayEncrypt {
    public function Decrypt($salt, $encrypted);
}
