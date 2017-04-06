<?php 
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

 namespace Learn\Cloudflare\Helper; 
 class Data extends \Magento\Framework\App\Helper\AbstractHelper {
 	
 	protected $_scopeConfig;

    const XML_CLOUDFLARE_ENABLE                 = 'cloudflare_settings/settings/enable_cloudflare';
    const XML_CLOUDFLARE_EMILID                 = 'cloudflare_settings/settings/email_id';
    const XML_CLOUDFLARE_APIKEY                 = 'cloudflare_settings/settings/api_key';
    const XML_CLOUDFLARE_ZONEID                 = 'cloudflare_settings/settings/zone_id';
    const XML_CLOUDFLARE_SECURITY_PROFILE       = 'cloudflare_settings/settings/security_profile';
    const XML_CLOUDFLARE_DEVELOPMEMT_MODE       = 'cloudflare_settings/settings/development_mode';
    const XML_CLOUDFLARE_CACHING_LEVEL          = 'cloudflare_settings/settings/caching_level';
    const XML_CLOUDFLARE_AUTO_MINIFY            = 'cloudflare_settings/settings/auto_minify';
    const XML_CLOUDFLARE_SSL                    = 'cloudflare_settings/settings/ssl';
    const XML_CLOUDFLARE_ALWAYS_ONLINE          = 'cloudflare_settings/settings/always_online';
    const XML_CLOUDFLARE_ROCKET_LOADER          = 'cloudflare_settings/settings/rocket_loader';
    const XML_CLOUDFLARE_IPV6                   = 'cloudflare_settings/settings/ipv6';
    const XML_CLOUDFLARE_WEBSOCKETS             = 'cloudflare_settings/settings/websockets';
    const XML_CLOUDFLARE_IPGEOLOCATION          = 'cloudflare_settings/settings/ip_geolocation';
    const XML_CLOUDFLARE_FLUSH                  = 'cloudflare_settings/settings/flush';


 	public function __construct (
			\Magento\Framework\App\Helper\Context $context,
			\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig 
		) {
		parent::__construct($context);
		$this->_scopeConfig = $scopeConfig;
    }

    public function cloudflare_enable() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_ENABLE);
    }
    
    public function cloudflare_email_id() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_EMILID);
    }
        
    public function cloudflare_api_key() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_APIKEY);
    }
        
    public function cloudflare_zone_id() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_ZONEID);
    }
    
    public function cloudflare_security_profile() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_SECURITY_PROFILE);
    }
        
    public function cloudflare_development_mode() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_DEVELOPMEMT_MODE);
    }
    public function cloudflare_caching_level() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_CACHING_LEVEL);
    }
    
    public function cloudflare_auto_minify() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_AUTO_MINIFY);
    }
    
    public function cloudflare_ssl() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_SSL);
    }
        
    public function cloudflare_always_online() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_ALWAYS_ONLINE);
    }
        
    public function cloudflare_rocket_loader() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_ROCKET_LOADER);
    }
        
    public function cloudflare_ipv6() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_IPV6);
    }
        
    public function cloudflare_websockets() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_WEBSOCKETS);
    }
        
    public function cloudflare_ip_geolocation() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_IPGEOLOCATION);
    }
    
    public function cloudflare_flush() {
        return $this->_scopeConfig->getValue(self::XML_CLOUDFLARE_FLUSH);
    }
}
?>