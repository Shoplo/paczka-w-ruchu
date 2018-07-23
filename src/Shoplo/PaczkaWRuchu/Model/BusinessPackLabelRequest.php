<?php

namespace Shoplo\PaczkaWRuchu\Model;

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
