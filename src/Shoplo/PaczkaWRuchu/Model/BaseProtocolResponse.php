<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BaseProtocolResponse extends AbstractArrayResponse
{
    /** @var string */
    public $Err;

    /** @var string */
    public $ErrDes;

    /** @var string */
    public $ProtocolCode;

    /** @var string */
    public $PackCodeRUCH;

    /** @var string */
    public $DATA_MOD;

    /** @var string */
    public $status;

    /** @var string */
    public $status_opis;
}
