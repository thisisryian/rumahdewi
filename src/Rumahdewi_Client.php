<?php
namespace Rumahdewi;
use Rumahdewi\httpBuilder;
class Rumahdewi_Client{
    const TOKEN_URI = 'http://localhost/API/v4/agency/token';
    const GET_AGENCY_INFO_URI = 'http://localhost/API/v4/agency/agency';
    const ADD_USER_URI = 'http://localhost/API/v4/agency/agency/action/add_user';
    const ADD_LISTING_URI = 'http://localhost/API/v4/agency/agency/action/add_listing';
    private $clientId;
    protected $httpBuilder;
    protected $accessToken = null;
    protected $defaultHeaders = [
        'X-API-KEY: ',
        'Accept: application/json'
    ];
    public function __construct($client_id){
        if(!empty($client_id)){
            $this->clientId = $client_id;
        }
        $this->httpBuilder = new httpBuilder();
    }
    public function setToken($token){
        if($token != null){
            $this->defaultHeaders[0] .= $token;
        }
        $this->httpBuilder->setHeaders($this->defaultHeaders);
    }
    public function getToken(){
        $params = [
            'client' => $this->clientId
        ];
        $this->httpBuilder->setHeaders($this->defaultHeaders);
        $response = $this->httpBuilder->post(self::TOKEN_URI, http_build_query($params));
        return $response;
    }
    public function getAgencyInfo($token){
        $this->setToken($token);
        $response = $this->httpBuilder->get(self::GET_AGENCY_INFO_URI);
        return $response;
    }
    public function addUser($token, $params){
        $this->setToken($token);
        $response = $this->httpBuilder->post(self::ADD_USER_URI, http_build_query($params));
        return $response;
    }
    public function addListing($token, $params){
        $this->setToken($token);
        $response = $this->httpBuilder->post(self::ADD_LISTING_URI, http_build_query($params));
        return $response;
    }
}