<?php

class MD_Onestepcheckout_Model_Source_Shipping {
	public function toOptionArray() {
		$options = array();		
		$carriers = Mage::getStoreConfig('carriers');		
		foreach($carriers as $code => $carrier) {			
			$active = $carrier['active'];
			if($active == 1 || $active == true) {
				if(isset($carrier['title'])) {
					$options[] = array(
						 'label' =>   $carrier['title'],
						 'value' => $code
					);
				}
			}	
		}
		return $options;
	}
}
