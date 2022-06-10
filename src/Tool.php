<?php
namespace Purin\LineLogin;

class Tool{
    public static function curl($url, $param, $type = 'POST', $header = ''){
        $ch = curl_init();
        switch($type){
            case 'POST':
                curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-type: application/x-www-form-urlencoded']);
                curl_setopt($ch, CURLOPT_URL , $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query( $param ));
                break;
            case 'GET':
                if(is_array($header)) curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                curl_setopt($ch , CURLOPT_URL , $url."?".http_build_query( $param ));
                curl_setopt($ch,CURLOPT_HTTPGET, true);
                break;
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $info = curl_exec($ch);
        curl_close($ch);
        $info = json_decode($info);
        return $info;
    }
}