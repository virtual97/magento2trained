<?php

require_once('../../../../../vendor/zendframework/zend-server/Client.php');
require_once('../../../../../vendor/zendframework/zend-soap/Client.php');
require_once('../../../../../vendor/zendframework/zend-soap/Client/Common.php');

//require_once('../../../../../vendor/zendframework/zend-json/Server/Client.php');
//require_once('../../../../../vendor/magento/zendframework1/library/Zend/Soap/Client.php');
//require_once('../../../../../vendor/magento/zendframework1/library/Zend/Soap/Client/Common.php');

$wsdlUrl = 'http://magento2trained.cc/soap/V1/?wsdl&services=customerAccountManagementV1,
    customerCustomerRepositoryV1';
$token = '12345';
$opts = ['http' => ['header' => "Authorization: Bearer " . $token]];
$context = stream_context_create($opts);
$soapClient = new \Zend\Soap\Client($wsdlUrl); $soapClient->setSoapVersion(SOAP_1_2);
$soapClient->setStreamContext($context);

$result = $soapClient->customerAccountManagementV1IsReadonly(array('customerId' => 1));
var_dump($result);
