<?php

namespace PaczkaWRuchu;

use PaczkaWRuchu\Model\BaseRequest;
use PaczkaWRuchu\Model\BusinessPackLabelRequest;
use PaczkaWRuchu\Model\BusinessPackListRequest;
use PaczkaWRuchu\Model\BusinessPackListResponse;
use PaczkaWRuchu\Model\BusinessPackRequest;
use PaczkaWRuchu\Model\BusinessPackResponse;
use PaczkaWRuchu\Model\GenerateProtocolRequest;
use PaczkaWRuchu\Model\GenerateProtocolResponse;

/**
 * Created by PhpStorm.
 * User: adrianadamiec
 * Date: 13.06.2018
 * Time: 12:09
 */
class PaczkaWRuchuClient extends \SoapClient
{
    private $partnerId;
    private $partnerKey;

    public function __construct($partnerId, $partnerKey)
    {
        $this->partnerId = $partnerId;
        $this->partnerKey = $partnerKey;

        parent::__construct(
            'https://api-test.paczkawruchu.pl/WebServicePwR/WebServicePwRTest.asmx?WSDL',
            [
                'trace' => true,
                'encoding' => 'UTF-8',
                'stream_context' => stream_context_create(
                    [
                        'ssl' => [
                            'crypto_method' => STREAM_CRYPTO_METHOD_TLSv1_2_CLIENT,
                        ],
                    ]
                ),
            ]
        );
    }

    private function getAuthParams()
    {
        $params = new BaseRequest();
        $params->PartnerID = $this->partnerId;
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
            $rspXml = simplexml_load_string($rsp->GenerateLabelBusinessPackResult->any);
            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response = new BusinessPackResponse((array)$rspXml->NewDataSet->GenerateLabelBusinessPack, $labelData);
        }

        return $response;
    }

    public function createBusinessPack(BusinessPackRequest $businessPack)
    {
        $businessPack->setAuthParams($this->partnerId, $this->partnerKey);

        $rsp = $this->GenerateBusinessPack($businessPack);

        $response = null;
        if ($rsp->GenerateBusinessPackResult && $rsp->GenerateBusinessPackResult->any) {
            $rspXml = simplexml_load_string($rsp->GenerateBusinessPackResult->any);
            $labelData = isset($rsp->LabelData) ? $rsp->LabelData : null;
            $response = new BusinessPackResponse((array)$rspXml->NewDataSet->GenerateBusinessPack, $labelData);
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
            $response = new BusinessPackListResponse($tmpRsp['GenerateLabelBusinessPackList'], $labelData);
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
            $response = new GenerateProtocolResponse($tmpRsp['Table'], $labelData);
        }

        return $response;
    }
}