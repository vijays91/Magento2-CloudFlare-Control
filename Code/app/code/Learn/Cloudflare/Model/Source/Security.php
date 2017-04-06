<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Security implements \Magento\Framework\Option\ArrayInterface
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
            ['value' => "off", 'label' => __('Off (Enterprise plan)')],
            ['value' => "essentially_off", 'label' => __('Essentially Off')],
            ['value' => "low", 'label' => __('Low')],
            ['value' => "medium", 'label' => __('Medium')],
            ['value' => "high", 'label' => __('High')],
            ['value' => "under_attack", 'label' => __('Attack')]
        ];
    }
}