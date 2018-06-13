<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:48
 */

namespace PaczkaWRuchu\Model;

class BaseRequest
{
    public $PartnerID;
    public $PartnerKey;

    public function setAuthParams($partnerId, $partnerKey)
    {
        $this->PartnerID = $partnerId;
        $this->PartnerKey = $partnerKey;
    }
}