<?php

namespace Shoplo\PaczkaWRuchu;

use Shoplo\PaczkaWRuchu\Model\BaseRequest;
use Shoplo\PaczkaWRuchu\Model\BusinessPackLabelRequest;
use Shoplo\PaczkaWRuchu\Model\BusinessPackListRequest;
use Shoplo\PaczkaWRuchu\Model\BusinessPackListResponse;
use Shoplo\PaczkaWRuchu\Model\BusinessPackRequest;
use Shoplo\PaczkaWRuchu\Model\BusinessPackResponse;
use Shoplo\PaczkaWRuchu\Model\BusinessPackStatusRequest;
use Shoplo\PaczkaWRuchu\Model\BusinessPackStatusResponse;
use Shoplo\PaczkaWRuchu\Model\GenerateProtocolRequest;
use Shoplo\PaczkaWRuchu\Model\GenerateProtocolResponse;

class PaczkaWRuchuClient extends \SoapClient
{
    public const WSDL = 'https://api.paczkawruchu.pl/WebServicePwRProd/WebServicePwR.asmx?wsdl';
    public const WSDL_TEST = 'https://api-test.paczkawruchu.pl/WebServicePwR/WebServicePwRTest.asmx?wsdl';

    private $partnerId;
    private $partnerKey;

    public function __construct(string $partnerId, string $partnerKey, string $wsdl = self::WSDL_TEST, array $options = [])
    {
        $this->partnerId  = $partnerId;
        $this->partnerKey = $partnerKey;

        $options = array_merge($options, $this->getDefaultOptions());

        parent::__construct($wsdl, $options);
    }

    private function getDefaultOptions(): array
    {
        return [
            'trace'          => true,
            'encoding'       => 'UTF-8',
            'stream_context' => stream_context_create(
                [
                    'ssl' => [
                        'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
                    ],
                ]
            ),
        ];
    }

    private function getAuthParams(): BaseRequest
    {
        $params             = new BaseRequest();
        $params->PartnerID  = $this->partnerId;
        $params->PartnerKey = $this->partnerKey;

        return $params;
    }

    public function getAllRuchStores()
    {
        $params = $this->getAuthParams();
        $result = $this->GiveMeAllRUCHLocation($params)->GiveMeAllRUCHLocationResult;

        return simplexml_load_string($result->any);
    }

    public function createBusinessPackWithLabel(BusinessPackRequest $businessPack)
    {
        $businessPack->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->GenerateLabelBusinessPack($businessPack);

        $response = null;
        if ($rsp->GenerateLabelBusinessPackResult && $rsp->GenerateLabelBusinessPackResult->any) {
            $rspXml    = simplexml_load_string($rsp->GenerateLabelBusinessPackResult->any);
            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response  = new BusinessPackResponse((array)$rspXml->NewDataSet->GenerateLabelBusinessPack, $labelData);
        }

        return $response;
    }

    public function createBusinessPack(BusinessPackRequest $businessPack)
    {
        $businessPack->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->GenerateBusinessPack($businessPack);

        $response = null;
        if ($rsp->GenerateBusinessPackResult && $rsp->GenerateBusinessPackResult->any) {
            $rspXml    = simplexml_load_string($rsp->GenerateBusinessPackResult->any);
            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response  = new BusinessPackResponse((array)$rspXml->NewDataSet->GenerateBusinessPack, $labelData);
        }

        return $response;
    }

    public function createBusinessPackList(BusinessPackListRequest $businessPackList)
    {
        $businessPackList->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->GenerateLabelBusinessPackList($businessPackList);

        $response = null;
        if ($rsp->GenerateLabelBusinessPackListResult && $rsp->GenerateLabelBusinessPackListResult->any) {
            $rspXml = simplexml_load_string($rsp->GenerateLabelBusinessPackListResult->any);
            $tmpRsp = ((array)$rspXml->NewDataSet);

            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response  = new BusinessPackListResponse($tmpRsp['GenerateLabelBusinessPackList'], $labelData);
        }

        return $response;
    }

    public function getBusinessPackLabel(BusinessPackLabelRequest $businessPackLabelRequest)
    {
        $businessPackLabelRequest->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->LabelPrintDuplicate($businessPackLabelRequest);

        $response = null;
        if ($rsp->LabelPrintDuplicateResult && $rsp->LabelPrintDuplicateResult->Label) {
            $response = $rsp->LabelPrintDuplicateResult->Label;
        }

        return $response;
    }

    public function generateProtocolLabel(GenerateProtocolRequest $generateProtocolRequest)
    {
        $generateProtocolRequest->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->GenerateProtocol($generateProtocolRequest);

        $response = null;
        if ($rsp->GenerateProtocolResult && $rsp->GenerateProtocolResult->any) {
            $rspXml = simplexml_load_string($rsp->GenerateProtocolResult->any);
            $tmpRsp = ((array)$rspXml->NewDataSet);

            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response  = new GenerateProtocolResponse($tmpRsp['Table'], $labelData);
        }

        return $response;
    }


    public function getBusinessPackStatus(BusinessPackStatusRequest $businessPackStatusRequest)
    {
        $businessPackStatusRequest->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp      = $this->GiveMePackStatus($businessPackStatusRequest);
        $response = null;

        if ($rsp->GiveMePackStatusResult && $rsp->GiveMePackStatusResult->any) {
            $rspXml = simplexml_load_string($rsp->GiveMePackStatusResult->any);

            return new BusinessPackStatusResponse((array)$rspXml->NewDataSet->PackStatus);
        }

        return $response;
    }
}
