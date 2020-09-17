<?php


namespace Shoplo\PaczkaWRuchu\Model;


class CancelPackResponse extends AbstractArrayResponse
{
    public $Err;
    public $ErrDes;
    public $PackCode;

    public function __construct(array $response)
    {
        parent::__construct($response);
    }
}