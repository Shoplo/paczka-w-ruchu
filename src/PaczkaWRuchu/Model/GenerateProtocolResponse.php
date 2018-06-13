<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class GenerateProtocolResponse
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