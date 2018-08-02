<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BasePackResponse extends AbstractArrayResponse
{
    public $Err;
    public $ErrDes;
    public $PackCode_RUCH;
    public $DestinationCode;
    public $DestinationId;
    public $PackPrice;
    public $PackPaid;
    public $NameCL;
    public $NrCL;
}
