<?php

namespace Shoplo\PaczkaWRuchu\Model;

class GenerateProtocolRequest extends BaseRequest
{
    /** @var mixed */
    public $Parcels;

    /**
     * GenerateProtocolRequest constructor.
     * @param mixed $Parcels
     */
    public function __construct(array $parcels)
    {
        $this->Parcels = implode(', ', $parcels);
    }
}
