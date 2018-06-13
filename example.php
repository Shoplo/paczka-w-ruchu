<?php

require_once __DIR__.'/autoload.php';

$partnerId = 'TEST002921';
$partnerKey = '0A9BFF5A32';

$paczka = new \PaczkaWRuchu\PaczkaWRuchuClient($partnerId, $partnerKey);
//$rsp = $paczka->getAllRuchStores();

$packRequest = new \PaczkaWRuchu\Model\BusinessPackRequest();
$packRequest->DestinationCode = 'WS-529563-27-02'; //$packRequest->AlternativeDestinationCode = null; //$packRequest->BoxSize = null; //$packRequest->PackValue = null; //$packRequest->CashOnDelivery = null; //$packRequest->AmountCashOnDelivery = null;
//$packRequest->Insurance = null; //$packRequest->EMail = null;
$packRequest->FirstName = 'Test php'; $packRequest->LastName = ''; $packRequest->CompanyName = 'RUCH S.A.'; $packRequest->StreetName = ''; $packRequest->BuildingNumber = '';
//$packRequest->FlatNumber = null;
$packRequest->City = ''; $packRequest->PostCode = ''; $packRequest->PhoneNumber = '123456789'; $packRequest->SenderEMail = 'adrian.adamiec@shoplo.com'; $packRequest->SenderFirstName = 'Hello';
//$packRequest->SenderLastName = null;
$packRequest->SenderCompanyName = 'RUCH S.A.'; $packRequest->SenderStreetName = 'Chłodna'; $packRequest->SenderBuildingNumber = '52'; //$packRequest->SenderFlatNumber = null;
$packRequest->SenderCity = 'Warszawa'; $packRequest->SenderPostCode = '00-872'; $packRequest->SenderPhoneNumber = '123456789';
//$packRequest->SenderOrders = null;
$packRequest->ReturnDestinationCode = 'WS-529563-27-02';
//$packRequest->ReturnEMail = null; //$packRequest->ReturnFirstName = null; //$packRequest->ReturnLastName = null;
//$packRequest->ReturnCompanyName = null; //$packRequest->ReturnStreetName = null; //$packRequest->ReturnBuildingNumber = null; //$packRequest->ReturnFlatNumber = null; //$packRequest->ReturnCity = null;
//$packRequest->ReturnPostCode = null; //$packRequest->ReturnPhoneNumber = null; //$packRequest->ReturnPack = 'T'; //$packRequest->TransferDescription = null;
$packRequest->PrintAdress = '1'; //$packRequest->ReturnAvailable = null; //
$packRequest->PrintType = '1';

$packRequest2 = new \PaczkaWRuchu\Model\BusinessPackRequest();
$packRequest2->DestinationCode = 'WS-529563-27-02'; //$packRequest2->AlternativeDestinationCode = null; //$packRequest2->BoxSize = null; //$packRequest2->PackValue = null; //$packRequest2->CashOnDelivery = null; //$packRequest2->AmountCashOnDelivery = null;
//$packRequest2->Insurance = null; //$packRequest2->EMail = null;
$packRequest2->FirstName = 'Test php'; $packRequest2->LastName = ''; $packRequest2->CompanyName = 'RUCH S.A.'; $packRequest2->StreetName = ''; $packRequest2->BuildingNumber = '';
//$packRequest2->FlatNumber = null;
$packRequest2->City = ''; $packRequest2->PostCode = ''; $packRequest2->PhoneNumber = '123456789'; $packRequest2->SenderEMail = 'adrian.adamiec@shoplo.com'; $packRequest2->SenderFirstName = 'Hello';
//$packRequest2->SenderLastName = null;
$packRequest2->SenderCompanyName = 'RUCH S.A.'; $packRequest2->SenderStreetName = 'Chłodna'; $packRequest2->SenderBuildingNumber = '52'; //$packRequest2->SenderFlatNumber = null;
$packRequest2->SenderCity = 'Warszawa'; $packRequest2->SenderPostCode = '00-872'; $packRequest2->SenderPhoneNumber = '123456789';
//$packRequest2->SenderOrders = null;
$packRequest2->ReturnDestinationCode = 'WS-529563-27-02';
//$packRequest2->ReturnEMail = null; //$packRequest2->ReturnFirstName = null; //$packRequest2->ReturnLastName = null;
//$packRequest2->ReturnCompanyName = null; //$packRequest2->ReturnStreetName = null; //$packRequest2->ReturnBuildingNumber = null; //$packRequest2->ReturnFlatNumber = null; //$packRequest2->ReturnCity = null;
//$packRequest2->ReturnPostCode = null; //$packRequest2->ReturnPhoneNumber = null; //$packRequest2->ReturnPack = 'T'; //$packRequest2->TransferDescription = null;
$packRequest2->PrintAdress = '1'; //$packRequest2->ReturnAvailable = null; //
$packRequest2->PrintType = '1';

$packListRequest = new \PaczkaWRuchu\Model\BusinessPackListRequest();
$packListRequest->Format = 'PDF' ;
$packListRequest->BusinessPackList[] = $packRequest;
$packListRequest->BusinessPackList[] = $packRequest2;

$rsp = $paczka->createBusinessPack($packRequest);
//print_r($rsp);exit;
//$rsp = $paczka->createBusinessPackList($packListRequest);
$protocol = new \PaczkaWRuchu\Model\GenerateProtocolRequest(["3400017461301", "3400017461288"]);
$rsp = $paczka->generateProtocolLabel($protocol);
//$getLabel = new \PaczkaWRuchu\Model\BusinessPackLabelRequest('3400017461288');
//$rsp = $paczka->getBusinessPackLabel($getLabel);
//print_r($rsp);
//exit;
header("Content-type: application/pdf");
echo $rsp->label;
//echo $rsp;
exit;