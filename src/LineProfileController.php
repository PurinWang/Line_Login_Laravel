<?php
namespace Purin\LineLogin;

use Purin\LineLogin\OAuthController;
use Purin\LineLogin\LineException;

class LineProfileController{
    private $configManager;

    const BASEURL = 'https://api.line.me/v2/';

    public function __construct(ConfigManager $configManager){
        $this->configManager = $configManager;
    }

    /**
     * 取得User資料 Get User Profile
     *
     * @see https://developers.line.biz/en/reference/line-login/#get-user-profile
     * @param $token
     * @return string
     */
    public function getUserprofile($token){
        $cm = $this->configManager;
        $config = $cm->getConfigs();
        $param = [
            'access_token' => $token,
            'client_id' => $config[ $cm::CLIENT_ID ],
            'client_secret' => $config[ $cm::CLIENT_SECRET ],
        ];

        $header = ["Authorization: Bearer ".$token];

        $url = self::BASEURL."profile";
        $info = Tool::curl($url, $param, 'GET', $header);
        try{
            if(isset($info->error))throw new Exception($info->error);
        }catch(LineException $e){
            echo $e->getMessage();
            exit();
        }
        
        return $info;
    }

}