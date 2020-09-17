<?php


namespace Shoplo\PaczkaWRuchu\Model;


class CancelPackRequest extends BaseRequest
{
    /** @var string */
    public $PackCode;

    /**
     * BusinessPackLabelRequest constructor.
     * @param string $PackCode
     */
    public function __construct(string $PackCode)
    {
        $this->PackCode = $PackCode;
    }
}