<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Observer;

use Magento\Framework\Event\ObserverInterface;
// use Magento\Framework\Event\Observer;
class Cloudflare implements ObserverInterface
{
    protected $helper;
    protected $messageManager;
    protected $cloudflare_api;
    protected $email_id;
    protected $zone_id;
    protected $api_key;

    public function __construct(
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Learn\Cloudflare\Model\Api $cloudflare_api,
        \Learn\Cloudflare\Helper\Data $helper
    ) {
        $this->messageManager = $messageManager;
        $this->cloudflare_api = $cloudflare_api;
        $this->helper = $helper;
    }


    /**
     * Checking whether the using static urls in WYSIWYG allowed event
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer) {
        if($this->helper->cloudflare_enable()) {
            $this->email_id     = $this->helper->cloudflare_email_id();
            $this->zone_id      = $this->helper->cloudflare_zone_id();
            $this->api_key      = $this->helper->cloudflare_api_key();           
            $ssl                = $this->helper->cloudflare_ssl();
            $cache_level        = $this->helper->cloudflare_caching_level();
            $auto_minify        = $this->helper->cloudflare_auto_minify();
            $development_mode   = $this->helper->cloudflare_development_mode();
            $security_profile   = $this->helper->cloudflare_security_profile();
            $always_online      = $this->helper->cloudflare_always_online();
            $rocket_loader      = $this->helper->cloudflare_rocket_loader();
            $ipv6               = $this->helper->cloudflare_ipv6();
            $websockets         = $this->helper->cloudflare_websockets();
            $ip_geolocation     = $this->helper->cloudflare_ip_geolocation();
            
            if( $this->email_id  && $this->zone_id && $this->api_key) {
                $this->security_level( $security_profile );
                $this->development_mode( $development_mode );
                $this->cache_level( $cache_level );
                $this->auto_minify( $auto_minify );
                $this->always_online( $always_online );
                $this->ssl( $ssl );
                $this->rocket_loader( $rocket_loader );
                $this->ipv6( $ipv6 );
                $this->websockets( $websockets );
                $this->ip_geolocation( $ip_geolocation );
            } else {
                $message = "Kindly check the Email-ID, API-Key and Zone ID.";
                $this->messageManager->addNotice( __($message) );
            }
        } else {
            $message = "Kindly enable the module for cloudflare settings control.";
            $this->messageManager->addNotice( __($message) );
        }
    }

        
    /*
    *
    *
    */
    public function auto_minify( $option ) {
        
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/minify";       
        switch ($option) {
            case 1:
                $json = '{"value":{"html":"on","css":"off","js":"off"}}';
                break;
            case 2:
                $json = '{"value":{"css":"on","js":"off","html":"off"}}';
                break;
            case 3:
                $json = '{"value":{"js":"on","html":"off","css":"off"}}';
                break;
            case 4:
                $json = '{"value":{"html":"on","css":"on","js":"off"}}';
                break;
            case 5:
                $json = '{"value":{"html":"off","css":"on","js":"on"}}';
                break;
            case 6:
                $json = '{"value":{"html":"on","css":"off","js":"on"}}';
                break;
            case 7:
                $json = '{"value":{"html":"on","css":"on","js":"on"}}';
                break;
            default:
                $json = '{"value":{"html":"off","css":"off","js":"off"}}';
        }       
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);      
        if($result['success'] === true) {
            $message = "Auto minify option updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating auto minify option.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
        
    /*
    *
    *
    */
    public function cache_level( $cache_level ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/cache_level";
        $json = json_encode(
            array(
                'value' => $cache_level,
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);      
        if($result['success'] === true) {
            $message = "Cache Level updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating cache level.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
        
    /*
    *
    *
    */
    public function development_mode( $development_mode ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/development_mode";
        $json = json_encode(
            array(
                'value' => $development_mode
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);      
        if($result['success'] === true) {
            $message = "Development mode updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating development mode.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
        
    /*
    *
    *
    */
    public function security_level( $security_level ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/security_level";
        $json=  json_encode(
            array(
                'value' => $security_level
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "Security level updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating security level.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
    
    /*
    *
    *
    */
    public function ssl( $ssl ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/ssl";
        $json=  json_encode(
            array(
                'value' => $ssl
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "SSL updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating SSL.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
    
    /*
    *
    *
    */
    public function always_online( $always_online ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/always_online";
        $json=  json_encode(
            array(
                'value' => $always_online
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "Always Online updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating Always Online.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }           
    
    /*
    *
    *
    */
    public function rocket_loader( $rocket_loader ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/rocket_loader";
        $json=  json_encode(
            array(
                'value' => $rocket_loader
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "Rocket Loader updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating Rocket Loader.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
    
    /*
    *
    *
    */
    public function ipv6( $ipv6 ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/ipv6";
        $json=  json_encode(
            array(
                'value' => $ipv6
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "IPv6 updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating IPv6.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
    
    /*
    *
    *
    */
    public function websockets( $websockets ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/websockets";
        $json=  json_encode(
            array(
                'value' => $websockets
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "WebSockets updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating WebSockets.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
    
    /*
    *
    *
    */
    public function ip_geolocation( $ip_geolocation ) {
        $api_url = "https://api.cloudflare.com/client/v4/zones/". $this->zone_id ."/settings/ip_geolocation";
        $json=  json_encode(
            array(
                'value' => $ip_geolocation
            )
        );
        $result = $this->cloudflare_api->curlRequest($api_url, $json, $this->email_id, $this->api_key);
        if($result['success'] === true) {
            $message = "IP Geolocation updated successfully.";
            $this->messageManager->addSuccess( __($message) );
        } else {
            $message = "Error for updating  IP Geolocation.";
            $this->messageManager->addError( __($message) );
        }
        return true;
    }
}
