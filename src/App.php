<?php

namespace App;

use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use Log\Log;

class App
{
    private $log;
    private $channelAccessToken;
    private $channelSecret;

    public function __construct($channelAccessToken, $channelSecret)
    {
        $this->log = Log::instance();
        $this->channelAccessToken = $channelAccessToken;
        $this->channelSecret = $channelSecret;
    }

    public function run()
    {
        $bot = new Bot($this->channelAccessToken, $this->channelSecret);

        $userId     = $bot->parseEvents()[0]['source']['userId'];
        $replyToken = $bot->parseEvents()[0]['replyToken'];
        $timestamp  = $bot->parseEvents()[0]['timestamp'];


        $message    = $bot->parseEvents()[0]['message'];
        $messageid  = $bot->parseEvents()[0]['message']['id'];

        $profil = $bot->profil($userId);

        $pesan_datang = $message['text'];


    //pesan bergambar
    if($message['type']=='text')
    {
        if($pesan_datang=='1')
        {


            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Halo '.$profil->displayName.', Anda memilih menu 1,'
                                        )
                                )
                            );

        }
        else
        if($pesan_datang=='2')
        {
            $get_sub = array();
            $aa =   array(
                            'type' => 'image',
                            'originalContentUrl' => 'https://medantechno.com/line/images/bolt/1000.jpg',
                            'previewImageUrl' => 'https://medantechno.com/line/images/bolt/240.jpg'

                        );
            array_push($get_sub,$aa);

            $get_sub[] = array(
                                        'type' => 'text',
                                        'text' => 'Halo '.$profil->displayName.', Anda memilih menu 2, harusnya gambar muncul.'
                                    );

            $balas = array(
                        'replyToken'    => $replyToken,
                        'messages'      => $get_sub
                     );
            /*
            $alt = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Anda memilih menu 2, harusnya gambar muncul.'
                                        )
                                )
                            );
            */
            //$client->replyMessage($alt);
        }
        else
        if($pesan_datang=='3')
        {

            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Fungsi PHP base64_encode medantechno.com :'. base64_encode("medantechno.com")
                                        )
                                )
                            );

        }
        else
        if($pesan_datang=='4')
        {

            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Jam Server Saya : '. date('Y-m-d H:i:s')
                                        )
                                )
                            );

        }
        else
        if($pesan_datang=='6')
        {

            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'location',
                                            'title' => 'Lokasi Saya.. Klik Detail',
                                            'address' => 'Medan',
                                            'latitude' => '3.521892',
                                            'longitude' => '98.623596'
                                        )
                                )
                            );

        }
        else
        if($pesan_datang=='7')
        {

            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Testing PUSH pesan ke anda'
                                        )
                                )
                            );

            $push = array(
                                'to' => $userId,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Pesan ini dari medantechno.com'
                                        )
                                )
                            );


            $client->pushMessage($push);

        }

        else{

            $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Halo.. Selamat datang di medantechno.com .        Untuk testing menu pilih 1,2,3,4,5 ... atau stiker'
                                        )
                                )
                            );

        }

    }else if($message['type']=='sticker')
    {
        $balas = array(
                                'replyToken' => $replyToken,
                                'messages' => array(
                                    array(
                                            'type' => 'text',
                                            'text' => 'Terimakasih stikernya... '

                                        )
                                )
                            );

    }

    $result =  json_encode($balas);
    //$result = ob_get_clean();

    file_put_contents('./balasan.json',$result);


    $client->replyMessage($balas);
    }
}
