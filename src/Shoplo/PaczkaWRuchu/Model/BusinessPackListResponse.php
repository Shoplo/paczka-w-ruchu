<?php

namespace Shoplo\PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class BusinessPackListResponse
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