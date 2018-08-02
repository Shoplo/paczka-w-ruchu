<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BusinessPackStatusResponse extends AbstractArrayResponse
{
    /**
     * @var string
     */
    public $PackCode;

    /**
     * @var string
     */
    public $Trans;

    /**
     * @var string
     */
    public $Trans_Des;

    /**
     * @var string
     */
    public $Data;

    /**
     * @var string
     */
    public $Destination;
}
