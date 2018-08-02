<?php

namespace Shoplo\PaczkaWRuchu\Model;

class GenerateProtocolRequest extends BaseRequest
{
    /** @var mixed */
    public $parcels;

    /**
     * GenerateProtocolRequest constructor.
     * @param mixed $Parcels
     */
    public function __construct(array $parcels)
    {
        $this->parcels = $parcels;
    }
}
