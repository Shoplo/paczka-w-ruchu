<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class BusinessPackResponse
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

    public $label;

    /**
     * BusinessPackResponse constructor.
     * @param $rspArr
     * @param $label
     */
    public function __construct($rspArr, $label)
    {
        foreach ($rspArr as $item => $value) {
            $this->{$item} = $value;
        }
        $this->label = $label;
    }

}