<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Autominify implements \Magento\Framework\Option\ArrayInterface
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
            ['value' => "0", 'label' => __('Off')],
            ['value' => "1", 'label' => __('HTML only')],
            ['value' => "2", 'label' => __('CSS only')],
            ['value' => "3", 'label' => __('JavaScript only')],
            ['value' => "4", 'label' => __('HTML and CSS')],
            ['value' => "5", 'label' => __('CSS and JavaScript')],
            ['value' => "6", 'label' => __('HTML and JavaScript')],
            ['value' => "7", 'label' => __('HTML, CSS and JavaScript')]
        ];
    }
}