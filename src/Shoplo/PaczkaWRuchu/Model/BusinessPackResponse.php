<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BusinessPackResponse extends AbstractArrayResponse
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
    public function __construct(array $response, $label)
    {
        parent::__construct($response);

        $this->label = $label;
    }
}
