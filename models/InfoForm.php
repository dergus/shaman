<?php


namespace app\models;

use yii\base\Model;

class InfoForm extends Model
{
    public $email;
    public $password;
    public $curlname;

    public function rules()
    {
        return [
            [['email', 'password', 'curlname'], 'required'],
            ['email', 'email']
        ];
    }

    public function getInfo(): array
    {
        $client = new \GuzzleHttp\Client(['base_uri' => 'https://api.shamandev.com/']);
        $authResponse = $client->request('POST', 'auth/login', [
            'json' => $this->attributes
        ]);
        $authResponseBody = $authResponse->getBody();
        $token =  json_decode($authResponseBody)->token;
        $info = $client->request('GET', 'user/current', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
        ]);

        return json_decode($info->getBody(), true);
    }
}
