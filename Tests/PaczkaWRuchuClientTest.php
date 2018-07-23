<?php

namespace Shoplo\PaczkaWRuchu\Tests;

use PHPUnit\Framework\TestCase;
use Shoplo\PaczkaWRuchu\Model\BaseRequest;
use Shoplo\PaczkaWRuchu\PaczkaWRuchuClient;

class PaczkaWRuchuClientTest extends TestCase
{
    public function testGetAuthParams()
    {
        $client = $this
            ->getMockBuilder(PaczkaWRuchuClient::class)
            ->setConstructorArgs([
                'TEST000132',
                '934A8FBDAC'
            ])
            ->getMock();

        $authParams = new \ReflectionMethod($client, 'getAuthParams');
        $authParams->setAccessible(true);
        $baseRequest = $authParams->invoke($client);
        $this->assertInstanceOf(BaseRequest::class, $baseRequest);
        $this->assertEquals('TEST000132', $baseRequest->PartnerID);
        $this->assertEquals('934A8FBDAC', $baseRequest->PartnerKey);
    }
}
