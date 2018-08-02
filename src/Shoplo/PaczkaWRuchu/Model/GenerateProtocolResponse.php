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
    public function __construct(array $response, $label)
    {
        if (array_key_exists('Err', $response)) {
            $this->packList[] = new BaseProtocolResponse((array)$pack);
        } else {
            foreach ($response as $pack) {
                $this->packList[] = new BaseProtocolResponse((array)$pack);
            }
        }

        $this->label = $label;
    }
}
