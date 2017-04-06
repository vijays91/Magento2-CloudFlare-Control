<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Ssl implements \Magento\Framework\Option\ArrayInterface
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
            ['value' => "flexible", 'label' => __('Flexible')],
            ['value' => "full", 'label' => __('Full')],
            ['value' => "strict", 'label' => __('Full (strict)')]
        ];
    }
}