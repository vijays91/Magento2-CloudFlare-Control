<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model;

class Api extends \Magento\Framework\Model\AbstractModel
{
    protected $messageManager;

    public function __construct( \Magento\Framework\Message\ManagerInterface $messageManager) {
        $this->messageManager = $messageManager;
    }

    /*
    *
    *
    */  
    public function curlDeleteRequest($url, $json_data, $email_id, $api_key) {
        $result = array();
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $headers = array(
                'X-Auth-Email: ' . $email_id,
                'X-Auth-Key: ' . $api_key,
                'Content-Type: application/json',
            );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec ($ch);
        $error  = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if ($http_code != 200) {
            // $message = "Error processing.";
            // $this->messageManager->addError( __($message) );
        } else {
            return json_decode($result, true);
        }
        //print_r($result );exit;
        return $result;
    }
    
    /*
    *
    *
    */
    public function curlRequest($url, $json_data, $email_id, $api_key) {
        $ch = curl_init(); 
        curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $headers = array(
                'X-Auth-Email: ' . $email_id,
                'X-Auth-Key: ' . $api_key,
                'Content-Type: application/json',
            );
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec ($ch);
        $error  = curl_error($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close ($ch);
        if ($http_code != 200) {
            // $message = "Error processing.";
            // $this->messageManager->addError( __($message) );
        } else {
            return json_decode($result, true);
        }
        $result = array();
        // print_r($result );exit;        
        return $result['success'] = 0;
    }
}
