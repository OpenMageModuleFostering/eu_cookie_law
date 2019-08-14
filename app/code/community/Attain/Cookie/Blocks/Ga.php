<?php
/**
 * Attain_Cookie extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   Attain
 * @package    Attain_Cookie
 * @copyright  Copyright (c) 2012 Attain Design Limited
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * @category   Attain
 * @package    Attain_Cookie
 * @author     Nathan Chick <nathan@attaindesign.co.uk>
 */
 
class Attain_Cookie_Blocks_Ga extends Mage_GoogleAnalytics_Block_Ga {
	
	protected $cookies = false;
	protected $enabled = false;
	
	public function _construct() {
		parent::_construct();
		
		if( Mage::getStoreConfig('web/eucookie/eulaw') ) {
			$this->enabled = true;
			
			if( Mage::getSingleton('core/cookie')->get('cookies_allowed') ) {
				$this->cookies = true;
			}
		}
		
	}
	 
	protected function _toHtml() {
		if( ! $this->enabled ) {
			return parent::_toHtml();
			
		} elseif( $this->setIsEnabled() && $this->cookies ) {
			return parent::_toHtml();
		}
		return false;

	}
}
?>