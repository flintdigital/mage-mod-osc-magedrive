<?php
class MD_Onestepcheckout_Model_Observer extends Mage_Core_Controller_Varien_Action {
	public function __construct() {
		
	}
	
	/*
	* init checkout 
	* if one step checkout is enabled, redirect checkout page to onestepcheckout
	* otherwise, redirect to checkout/onepage
	*/
	public function initController($observer) {
		if (Mage::helper('onestepcheckout')->enabledOnestepcheckout()) {
			$observer->getControllerAction()->_redirect('onestepcheckout', array('_secure' => true));
		}
	}
	
	/*
	*	the function is to save customer comment
	*/
	public function saveOrderComment($observer) {
		$_order = $observer->getEvent()->getOrder();
		$customerComment = Mage::getSingleton('checkout/session')->getCustomerComment();
		if ($customerComment != "") {
			try {
				$_order->setOnestepcheckoutOrderComment($customerComment)->save();
			}
			catch(Exception $e) {
			
			}
		}
	}
	
	/*
	* notify admin after order is placed
	*/
	public function notifyAdmin($observer) {
		$helper = Mage::helper('onestepcheckout');
		if ($helper->enableNotifyAdmin()) {
			$_order = $observer->getEvent()->getOrder();
			$translate = Mage::getSingleton('core/translate');
			$translate->setTranslateInline(false);
			$paymentBlock = Mage::helper('payment')->getInfoBlock($_order->getPayment())
            ->setIsSecureMode(true);
			$paymentBlock->getMethod()->setStore($_order->getStore()->getId());
			$mailTemplate = Mage::getModel('core/email_template');
			$template = Mage::getStoreConfig('onestepcheckout/order_notification/template', $_order->getStoreId());
			$sendTo = array();
			$email_array = $helper->getEmailArray();
			if (!empty($email_array)) {
				foreach ($email_array as $email) {
					$sendTo[] = array('email' => trim($email),
														'name'	=> '');
				}
			}
			foreach ($sendTo as $recipient) {
				$result = $mailTemplate->setDesignConfig(array('area'=>'frontend', 'store'=>$_order->getStoreId()))
					->sendTransactional(
						$template,
						Mage::getStoreConfig('sales_email/order/identity', $_order->getStoreId()),
						$recipient['email'],
						$recipient['name'],
						array(
								'order'         => $_order,
								'billing'       => $_order->getBillingAddress(),
								'payment_html'  => $paymentBlock->toHtml(),
						)
					);
			}
			$translate->setTranslateInline(true);
		}
	}
	

	public function orderPlaceAfter($observers)
	{
		$session = Mage::getSingleton('checkout/session');
		$giftwrap = $session->getData('onestepcheckout_giftwrap');
		$giftwrapAmount = $session->getData('onestepcheckout_giftwrap_amount');
		if($giftwrap || $giftwrapAmount){
			$session->unsetData('onestepcheckout_giftwrap');
			$session->unsetData('onestepcheckout_giftwrap_amount');
		} 
		//Save Comment
		$order = $observers->getEvent()->getOrder();
		$customerComment = $session->getData('customer_comment');		
		if ($customerComment != "") {
			try {
				$order->setOnestepcheckoutOrderComment($customerComment)->save();
			}
			catch(Exception $e) {
			
			}
		}		
		//Save survey				
		$orderId = $order->getId();
		$surveyQuestion = $session->getData('survey_question');			
		$surveyAnswer = $session->getData('survey_answer');		
		$survey = Mage::getModel('onestepcheckout/survey');
		if($surveyAnswer){
			try{
				$survey->setData('question', $surveyQuestion)
					   ->setData('answer', $surveyAnswer)
					   ->setData('order_id', $orderId)			   
					   ->save();
			}catch(Exception $e){				
			}
			$session->unsetData('survey_question');
			$session->unsetData('survey_answer');
		}	
	}
	
}