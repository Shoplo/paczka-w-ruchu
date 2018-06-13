<?php

namespace PaczkaWRuchu\Model;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 13:03
 */

class BusinessPackListRequest extends BaseRequest
{
    /** @var string */
    public $Format;

    /** @var BusinessPackRequest[] */
    public $BusinessPackList;
}