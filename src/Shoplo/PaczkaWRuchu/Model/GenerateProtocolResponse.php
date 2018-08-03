<?php

namespace Shoplo\PaczkaWRuchu\Model;

class GenerateProtocolResponse implements ResponseInterface
{
    /**
     * @var BaseProtocolResponse[]
     */
    public $packList;
    public $label;

    /**
     * GenerateProtocolResponse constructor.
     * @param $response
     * @param $label
     */
    public function __construct($response, $label)
    {
        if (array_key_exists('Err', $response)) {
            $this->packList[] = new BaseProtocolResponse((array)$response);
        } else {
            foreach ($response as $pack) {
                $this->packList[] = new BaseProtocolResponse((array)$pack);
            }
        }

        $this->label = $label;
    }
}
