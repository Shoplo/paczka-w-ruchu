<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class GenerateProtocolRequest extends BaseRequest
{
    /** @var mixed */
    public $parcels;

    /**
     * GenerateProtocolRequest constructor.
     * @param mixed $Parcels
     */
    public function __construct($Parcels)
    {
        $this->parcels = $Parcels;
    }

}