<?php
//namespace Elibom\APIClient;

class ElibomClient 
{
    private $user;
    private $token;
    private $url;
    private $action;
    
    public function __construct($url, $user, $token) {
        $this->user = $user;
        $this->token = $token;
        $this->url = $url;
    }
    
    public function sendMessage($to, $message) {
        
        $restClient = new RESTClient ();
        $restClient->initialize ( array (
            'server' => $this->url,
        ) );
        
        $restClient->option('RETURNTRANSFER', true);
        $restClient->option('MAXREDIRS', 10);
        $restClient->option('TIMEOUT', 30);
        $restClient->option('SSL_VERIFYPEER', false);
        $restClient->option('CUSTOMREQUEST', 'GET');
        
        $params = array(
            'action'=>'sendmessage',
            'username' => $this->user,
            'password' => $this->token,
            'recipient' => $to,
            'messagedata' => $message,
            //'longMessage' => false,

        );
        
        $response = $restClient->get(null, $params);
        
        if($restClient->status() != 200) {
            $errorMessage = $this->getErrorMessage($restClient->status());
            throw new Exception($errorMessage . '[' . $restClient->error() . ']', $restClient->status());
        }
        
        $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        return $array;
    }
    
    
    private function getErrorMessage($code) {
        switch($code) {
            case 0 : {
                return 'Server not found, check your internet connection or proxy configuration.';
            }
            case 401 : {
                return 'Unauthorized resource. Check your user credentials';
            }
            default : {
                return 'Unexpected error [code=' . $code . ']';
            }
        }
    }
    

}