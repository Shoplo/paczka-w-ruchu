<?php

namespace Shoplo\PaczkaWRuchu\Model;

class GenerateProtocolResponse implements ResponseInterface
{
    public $packList;
    public $label;

    /**
     * GenerateProtocolResponse constructor.
     * @param $packArr
     * @param $label
     */
    public function __construct($packArr, $label)
    {
        foreach ($packArr as $pack) {
            $this->packList[] = new BaseProtocolResponse((array)$pack);
        }

        $this->label = $label;
    }
}
