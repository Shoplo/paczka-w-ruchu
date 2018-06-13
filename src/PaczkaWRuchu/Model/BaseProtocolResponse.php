<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class BaseProtocolResponse
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

    /**
     * BaseProtocolResponse constructor.
     * @param $protocol
     */
    public function __construct($protocol)
    {
        foreach ((array)$protocol as $item => $value) {
            $this->{$item} = $value;
        }
    }

}