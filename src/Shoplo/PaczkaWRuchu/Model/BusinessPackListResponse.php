<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BusinessPackListResponse implements ResponseInterface
{
    public $packList;
    public $label;

    /**
     * BusinessPackResponse constructor.
     * @param $packArr
     * @param $label
     */
    public function __construct($packArr, $label)
    {
        foreach ($packArr as $pack) {
            $this->packList[] = new BasePackResponse((array)$pack);
        }

        $this->label = $label;
    }
}
