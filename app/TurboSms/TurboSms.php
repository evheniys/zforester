<?php namespace App\TurboSms;

use App\TurboSmsSend;
use SoapClient;
// use Artisaninweb\SoapWrapper\Facades\SoapWrapper;

class TurboSms {

    public $login = 'evheniysapi';

    public $password = ';tyz1234';
    public $sender = 'es.develop';
    public $debug = false;
    protected $client;
    protected $wsdl = 'http://turbosms.in.ua/api/wsdl.html';

    public function send($text, $phones) {
        if (!$this->debug || !$this->client) {
            $this->connect();
        }

        if (!is_array($phones)) {
            $phones = [$phones];
        }
        foreach ($phones as $phone) {

            $message = 'Сообщения успешно отправлено';
            if (!$this->debug) {
                $result = $this->client->SendSMS([
                    'sender' => $this->sender,
                    'destination' => $phone,
                    'text' => $text
                ]);

                if ($result->SendSMSResult->ResultArray[0] != 'Сообщения успешно отправлены') {
                    $message = 'Сообщения не отправлено (ошибка: "' . $result->SendSMSResult->ResultArray[0] . '")';
                }
                $sms['text']=$text;
                $sms['phone'] = $phone;
                $sms['status'] = $message;
                TurboSmsSend::create($sms);
            }

        }

    }

    protected function connect() {
        if ($this->client) {
            return $this->client;
        }
        $client = new SoapClient($this->wsdl);
        if (!$this->login || !$this->password) {
            dd($client);
        }
        $result = $client->Auth([
            'login' => $this->login,
            'password' => $this->password,
        ]);
        if ($result->AuthResult . '' != 'Вы успешно авторизировались') {
            throw new InvalidConfigException($result->AuthResult);
        }

        $this->client = $client;

        return $this->client;
    }

    public function getBalance() {
        $result = $this->client->GetCreditBalance();
        return intval($result->GetCreditBalanceResult);
    }

    public function getMessageStatus($messageId) {
        $result = $this->client->GetMessageStatus(['MessageId' => $messageId]);
        return $result->GetMessageStatusResult;
    }

}

