<?php
/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 16:35
 */

namespace Shoplo\PaczkaWRuchu\Model;

class BasePackResponse
{
    public $Err;
    public $ErrDes;
    public $PackCode_RUCH;
    public $DestinationCode;
    public $DestinationId;
    public $PackPrice;
    public $PackPaid;
    public $NameCL;
    public $NrCL;

    /**
     * BasePackResponse constructor.
     * @param $pack
     */
    public function __construct($pack)
    {
        foreach ((array)$pack as $item => $value) {
            $this->{$item} = $value;
        }
    }
}
