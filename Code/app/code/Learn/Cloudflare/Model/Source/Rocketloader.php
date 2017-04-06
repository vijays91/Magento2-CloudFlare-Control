<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Rocketloader implements \Magento\Framework\Option\ArrayInterface
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
            ['value' => "off", 'label' => __('Off')],
            ['value' => "on", 'label' => __('Automatic')],
            ['value' => "manual", 'label' => __('Manual')]
        ];
    }
}