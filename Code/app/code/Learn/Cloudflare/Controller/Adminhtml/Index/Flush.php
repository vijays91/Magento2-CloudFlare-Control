<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;

class Flush extends \Magento\Backend\App\Action
{
	protected $helper;
	protected $messageManager;
	protected $cloudflare_api;

	public function __construct(
		Action\Context $context,
		\Magento\Framework\Message\ManagerInterface $messageManager,
		\Learn\Cloudflare\Model\Api $cloudflare_api,
		\Learn\Cloudflare\Helper\Data $helper
	) {
		$this->messageManager = $messageManager;
		$this->cloudflare_api = $cloudflare_api;
		$this->helper = $helper;
		parent::__construct($context);
	}

    public function execute()
    {
        $json =  json_encode(
			array(
				'purge_everything' => true
			)
		);
		
		if($this->helper->cloudflare_enable()) {
			$email_id 	= $this->helper->cloudflare_email_id();
			$api_key 	= $this->helper->cloudflare_api_key();
			$zone_id 	= $this->helper->cloudflare_zone_id();
			$api_url	= "https://api.cloudflare.com/client/v4/zones/". $zone_id ."/purge_cache";
			$result = array();
			if( $email_id && $api_key && $zone_id ) {			
				
				$result = $this->cloudflare_api->curlDeleteRequest($api_url, $json, $email_id, $api_key);
				$result = json_decode($result, true);
				
				if($result['success'] == 1) {
					$message = "cache refreshed successfully.";
					$this->messageManager->addSuccess( __($message) );
					// return true;
				} else {
					$message = "Error - flushing the cache.";
					$message .= "<br />";
					$message .= $result['errors'][0]['message'];
					$this->messageManager->addError( __($message) );
				}
			} else {
				$message = "Kindly check the Email-ID, API-Key and Zone ID.";
				$this->messageManager->addNotice( __($message) );
			}
		} else {
			$message = "Kindly enable the module for cloudflare settings control.";
			$this->messageManager->addNotice( __($message) );
		}

		$this->_redirect($this->_redirect->getRefererUrl());
		return;
    }
}