<?php

namespace Shoplo\PaczkaWRuchu\Model;

class BusinessPackRequest extends BaseRequest
{
    /** @var string */
    public $DestinationCode;

    /** @var string */
    public $AlternativeDestinationCode;

    /** @var string */
    public $ReturnDestinationCode;

    /** @var string */
    public $BoxSize;

    /** @var string */
    public $PackValue;

    /** @var boolean */
    public $CashOnDelivery;

    /** @var string */
    public $AmountCashOnDelivery;

    /** @var boolean */
    public $Insurance;

    /** @var string */
    public $EMail;

    /** @var string */
    public $FirstName;

    /** @var string */
    public $LastName;

    /** @var string */
    public $CompanyName;

    /** @var string */
    public $StreetName;

    /** @var string */
    public $BuildingNumber;

    /** @var string */
    public $FlatNumber;

    /** @var string */
    public $City;

    /** @var string */
    public $PostCode;

    /** @var string */
    public $PhoneNumber;

    /** @var string */
    public $SenderEMail;

    /** @var string */
    public $SenderFirstName;

    /** @var string */
    public $SenderLastName;

    /** @var string */
    public $SenderCompanyName;

    /** @var string */
    public $SenderStreetName;

    /** @var string */
    public $SenderBuildingNumber;

    /** @var string */
    public $SenderFlatNumber;

    /** @var string */
    public $SenderCity;

    /** @var string */
    public $SenderPostCode;

    /** @var string */
    public $SenderPhoneNumber;

    /** @var string */
    public $SenderOrders;

    /** @var string */
    public $ReturnEMail;

    /** @var string */
    public $ReturnFirstName;

    /** @var string */
    public $ReturnLastName;

    /** @var string */
    public $ReturnCompanyName;

    /** @var string */
    public $ReturnStreetName;

    /** @var string */
    public $ReturnBuildingNumber;

    /** @var string */
    public $ReturnFlatNumber;

    /** @var string */
    public $ReturnCity;

    /** @var string */
    public $ReturnPostCode;

    /** @var string */
    public $ReturnPhoneNumber;

    /** @var string */
    public $PrintAdress;

    /** @var string */
    public $PrintType;

    /** @var string */
    public $ReturnPack;

    /** @var string */
    public $TransferDescription;

    /** @var string */
    public $ReturnAvailable;

    /** @var string */
    public $ReturnQuantity;
}
