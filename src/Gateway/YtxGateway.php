<?php
namespace AndPHP\HyperfSms;

use HyperfLibraries\Sms\Contract\MessageInterface;
use HyperfLibraries\Sms\Contract\PhoneNumberInterface;
use HyperfLibraries\Sms\Exception\GatewayErrorException;
use HyperfLibraries\Sms\Gateway\GatewayAbstract;
use HyperfLibraries\Sms\HasHttpRequest;

class YtxGateway extends GatewayAbstract
{
    use HasHttpRequest;

    const ENDPOINT_URL = 'http://q.hl95.com:8061';

    public function send(PhoneNumberInterface $to, MessageInterface $message)
    {
        $data = $message->getData($this);
        $params = [
            'phone' => $to->getNumber(),
            'message' => $data,
            'username' => $this->config->get('sms.gateways.ytx.username'),
            'password' => $this->config->get('sms.gateways.ytx.password'),
            'epid' => $this->config->get('sms.gateways.ytx.epid'),
            'linkid' => date_format(time(),'YmdHis').(string)mt_rand(1000,9999),
            'subcode' => "",
        ];
var_dump($params);
//        $result = $this->post(self::ENDPOINT_URL, $params,['Content-Type'=>'application/x-www-form-urlencoded']);
//
//        if ('OK' != $result['Code']) {
//            throw new GatewayErrorException($result['Message'], $result['Code'], $result);
//        }

        return $params;
    }
}