<?php
class MD_Onestepcheckout_Block_Adminhtml_System_Config_Field_Position extends Mage_Adminhtml_Block_System_Config_Form_Fieldset
{
	protected $_dummyElement;
    protected $_fieldRenderer;
    protected $_values;

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $html = $this->_getHeaderHtml($element);
		$checkNull = 1;
		$helper = Mage::helper('onestepcheckout');
		for($i=0;$i<20;$i++){
			// var_dump($helper->getFieldEnable($i));
			if($helper->getFieldEnable($i) && $helper->getFieldEnable($i) != '0'){
				$checkNull = 0;
				break;
			}
		}
		if($checkNull==1){
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_0','firstname');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_1','lastname');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_2','email');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_3','telephone');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_4','street');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_6','country');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_8','city');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_10','postcode');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_11','region');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_12','company');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_13','fax');
		}
		$html .= '<div class="user_guide">Configure positions of fields in Section Billing and Shipping Address. (eg: Email + Null)</div>';
		$html .= '<ul>';
		$fieldArrays = array();
		for($i=0;$i<20;$i++){
			$fieldArrays[] = 'onestepcheckout_field_position_management_row_'.$i;
			$html .= $this->_getFieldHtml($element, $i);
		}
		$html .='
				<style type="text/css">
					#onestepcheckout_field_position_management_position{
						display:none;
					}
					#onestepcheckout_field_position_management .collapseable{
						display:none;
					}
					.user_guide{
						background:none repeat scroll 0 0 #EAF0EE;
						border:1px dotted #FF0000;
						margin-bottom: 20px;
						padding: 20px;
					}
				</style>
				<script type="text/javascript">
					var previous;
					function forcus(field)
					{
						previous = field.value;
					}
					function checkfield(field){
						for (var k=0; k<20; k++){
							if((field.value == $("onestepcheckout_field_position_management_row_"+k).value)
								&& (field.id != "onestepcheckout_field_position_management_row_"+k)
									&&(field.value!="0")
								){
								field.value = previous;
								alert("This field already exists!");
								break;
							}
						}
					}
                    function changeValueSelect(){
                        if($("affiliateplus_payment_moneybooker_user_mechant_email_default").value == "1"){
                            if($("row_affiliateplus_payment_moneybooker_moneybooker_email"))
                                $("row_affiliateplus_payment_moneybooker_moneybooker_email").style.display = "none";
                        }else{
                            if($("row_affiliateplus_payment_moneybooker_moneybooker_email"))
                                $("row_affiliateplus_payment_moneybooker_moneybooker_email").style.display = "";
                        }
                    }
					function checkValueRequire(){
						var firstnameRequire = "1";
						var lastnameRequire = "1";
						var emailRequire = "1";
						var message = "In Field Position Management\n\n";
						for (var k=0; k<20; k++){
							if($("onestepcheckout_field_position_management_row_"+k).value == "firstname"){
								firstnameRequire = "0";
							}
							if($("onestepcheckout_field_position_management_row_"+k).value == "lastname"){
								lastnameRequire = "0";
							}
							if($("onestepcheckout_field_position_management_row_"+k).value == "email"){
								emailRequire = "0";
							}
						}
						if(firstnameRequire=="1" || lastnameRequire=="1" || emailRequire=="1"){
							if(firstnameRequire=="1")
								message += "The First Name field is missing!\n";
							if(lastnameRequire=="1")
								message += "The Last Name field is missing!\n";
							if(emailRequire=="1")
								message += "The Email field is missing!\n";
							message += "\n\n Please select the position for them!";
							alert(message);
						}else{
							configForm.submit();
						}
					}
                </script>';
		$html .='</ul>';
		$checkNull = 1;
		$helper = Mage::helper('onestepcheckout');
		for($i=0;$i<20;$i++){
			if($helper->getFieldEnable($i) && $helper->getFieldEnable($i) != '0'){
				$checkNull = 0;
				break;
			}
		}
		if($checkNull==1){
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_0','firstname');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_1','lastname');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_2','email');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_3','telephone');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_4','street');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_6','country');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_8','city');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_10','postcode');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_11','region');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_12','company');
			Mage::getConfig()->saveConfig('onestepcheckout/field_position_management/row_13','fax');
		}
        return $html;
    }
	
	protected function _getDummyElement()
    {
        if (empty($this->_dummyElement)) {
            $this->_dummyElement = new Varien_Object(array('show_in_default'=>1, 'show_in_website'=>1));
        }
        return $this->_dummyElement;
    }
	
	protected function _getFieldRenderer()
    {
        if (empty($this->_fieldRenderer)) {
            $this->_fieldRenderer = Mage::getBlockSingleton('adminhtml/system_config_form_field');
        }
        return $this->_fieldRenderer;
    }
	
	protected function _showAllOption()
	{
		return array(
			'0'=>Mage::helper('onestepcheckout')->__('Null'),
			'firstname'=>Mage::helper('onestepcheckout')->__('First Name'),
			'lastname'=>Mage::helper('onestepcheckout')->__('Last Name'),
			'prefix'=>Mage::helper('onestepcheckout')->__('Prefix Name'),
			'middlename'=>Mage::helper('onestepcheckout')->__('Middle Name'),
			'suffix'=>Mage::helper('onestepcheckout')->__('Suffix Name'),
			'email'=>Mage::helper('onestepcheckout')->__('Email Address'),
			'company'=>Mage::helper('onestepcheckout')->__('Company'),
			'street'=>Mage::helper('onestepcheckout')->__('Address'),
			'country'=>Mage::helper('onestepcheckout')->__('Country'),
			'region'=>Mage::helper('onestepcheckout')->__('State/Province'),
			'city'=>Mage::helper('onestepcheckout')->__('City'),
			'postcode'=>Mage::helper('onestepcheckout')->__('Zip/Postal Code'),
			'telephone'=>Mage::helper('onestepcheckout')->__('Telephone'),
			'fax'=>Mage::helper('onestepcheckout')->__('Fax'),
			'birthday'=>Mage::helper('onestepcheckout')->__('Date of Birth'),
			'gender'=>Mage::helper('onestepcheckout')->__('Gender'),
			'taxvat'=>Mage::helper('onestepcheckout')->__('Tax/VAT number'),
		);
	}
	
	protected function _optionToHtml($option, $selected)
    {	
            $html = '<option value="'.$option["key"].'"';
            $html.= isset($option['value']) ? 'title="'.$option['value'].'"' : '';
            //$html.= isset($option['style']) ? 'style="'.$option['style'].'"' : '';
            if ($option['key']==$selected){
                $html.= ' selected="selected"';
            }
            $html.= '>'.$option['value']. '</option>'."\n";
        return $html;
    }
	
	protected function _getFieldHtml($fieldset, $number)
    {
		
        $configData = $this->getConfigData();
        $path = 'onestepcheckout/field_position_management/row_'.$number;
        $helper = Mage::helper('onestepcheckout');
		$data = $helper->getFieldEnable($number);//isset($helper->getFieldEnable($number)) ? $helper->getFieldEnable($number) : '';
        $e = $this->_getDummyElement();
		$html = '';
		if($number % 2 == 0){
			$html .= '<li>';
		}
		$html .= '<select style="width: 280px;margin-left:30px;" onfocus="forcus(this);" onchange="checkfield(this);" id="onestepcheckout_field_position_management_row_'.$number.'" name="groups[field_position_management][fields][row_'.$number.'][value]" class="select">';
		$allOptions = $this->_showAllOption();
		foreach($allOptions as $key=>$value){
			$option['value'] = $value;
			$option['key'] = $key;
			$selected=$data;
			$html.= $this->_optionToHtml($option, $selected);
		}
		$html.= '</select>';
		if($number % 2 != 0 || $number==19){
			$html .= '</li><br />';
		}
		return $html;
    }
}