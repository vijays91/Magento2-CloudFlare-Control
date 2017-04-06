<?php
/**
 * @author VIJAYAKUMAR S
 * @copyright Copyright (c) 2017
 * @package Learn_Cloudflare
 */

namespace Learn\Cloudflare\Model\Source;

class Alwaysonline implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return array(
            array(
                'value' => '',
                'label' => __('-- Select --')
            ),
            array(
                'value' => 'on',
                'label' => __('On')
            ),
            array(
                'value' => 'off',
                'label' => __('Off')
            )
        );
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [
                '' => __('-- Select --'),
                'on' => __('On'),
                'off' => __('Off')
        ];
    }
}
