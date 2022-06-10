<?php
namespace Purin\LineLogin;

class LineAuthorization{

    private $configManager;

    public function __construct(ConfigManager $configManager){
        $this->configManager = $configManager;
    }

    /**
     * 產生 Line Authorization Url
     *
     * @see https://developers.line.biz/en/docs/line-login/web/integrate-line-login/
     * @return string
     */
    public function createAuthUrl(){
        $cm = $this->configManager;
        $config = $cm->getConfigs();

        $scope = str_replace(",","%20",$config[ $cm::CLIENT_SCOPE ] );
        $parameter = [
            'response_type' => 'code',
            'client_id' => $config[ $cm::CLIENT_ID ],
            'state' => uniqid(15)
        ];

        $host = "https://access.line.me/oauth2/v2.1/authorize";
        $url = $host . "?" . http_build_query($parameter) . "&scope=". $scope . "&redirect_uri=" . $config[ $cm::CLIENT_REDIRECT_URI ];

        return $url;
    }

}
