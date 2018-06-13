<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class BusinessPackLabelRequest extends BaseRequest
{
    /** @var string */
    public $PackCode;

    /**
     * BusinessPackLabelRequest constructor.
     * @param string $PackCode
     */
    public function __construct($PackCode)
    {
        $this->PackCode = $PackCode;
    }
}