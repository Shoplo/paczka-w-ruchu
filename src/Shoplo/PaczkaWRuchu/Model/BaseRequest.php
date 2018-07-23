<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BaseRequest
{
    public $PartnerID;
    public $PartnerKey;

    public function setAuthParams(string $partnerId, string $partnerKey)
    {
        $this->PartnerID  = $partnerId;
        $this->PartnerKey = $partnerKey;
    }
}
