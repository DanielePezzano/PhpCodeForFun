<?php
namespace EncriptionLib\Interfaces;

interface IReverseEncrypt extends IOneWayEncrypt {
    public function Decrypt($salt, $encrypted);
}
