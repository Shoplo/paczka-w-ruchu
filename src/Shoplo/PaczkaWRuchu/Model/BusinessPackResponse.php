<?php

namespace Shoplo\PaczkaWRuchu\Model;

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
