<?php
namespace app\components;

use Paybox\Pay\Facade as PayboxApi;
use yii\base\Component;

class Paybox extends Component
{
    public $id;

    public $secretKey;

    public $url;

    public function init()
    {

    }

    public function Index($order_id, $description, $price, $phone, $email)
    {
        $paybox = new PayboxApi();

        $paybox->merchant->id = $this->id;
        $paybox->merchant->secretKey = $this->secretKey;
        $paybox->order->id = $order_id;
        $paybox->order->description = $description;
        $paybox->order->amount = $price;
		$paybox->config->userPhone = $phone;
		$paybox->config->userContactEmail = $email;
//        $paybox->order->testing_mode = 1;
//        $paybox->config->checkUrl   = "http://kupipolis.ibeacon.kz/site/check";
        $paybox->config->resultUrl  = $this->url."/paybox/result";
        $paybox->config->successUrl = $this->url."/paybox/success";
        $paybox->config->failureUrl = $this->url."/paybox/failure";

        $paybox->config->requestMethod    = "GET";
        $paybox->config->successUrlMethod = "GET";
        $paybox->config->failureUrlMethod = "GET";
//        pg_testing_mode=1
        if($paybox->init()) {
            header('Location:' . $paybox->redirectUrl);
            die;
        }
    }
}