<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Cachinglevel implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => "",  'label' => __('-- Select --')],
            ['value' => "basic", 'label' => __('Basic ( No Query String )')],
            ['value' => "simplified", 'label' => __('Simple ( Ignore Query String )')],
            ['value' => "aggressive", 'label' => __('Aggressive ( Standard )')]
        ];
    }
}