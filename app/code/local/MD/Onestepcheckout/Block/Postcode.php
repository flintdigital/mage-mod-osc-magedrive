<?php

class MD_Onestepcheckout_Block_Postcode extends Mage_Core_Block_Template
{
   protected function _toHtml()
    {
        // Mage::dispatchEvent('adminhtml_block_html_before', array('block' => $this));
        return parent::_toHtml();
    }
}