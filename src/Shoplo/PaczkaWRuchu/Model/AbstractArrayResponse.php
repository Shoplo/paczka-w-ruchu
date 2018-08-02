<?php

namespace Shoplo\PaczkaWRuchu\Model;

abstract class AbstractArrayResponse implements ResponseInterface
{
    public function __construct(array $response)
    {
        foreach ($response as $item => $value) {
            $this->{$item} = $value;
        }
    }
}
