<?php

/**
 * Controller to Category
 *
 * @category  	src
 * @package   	src\Helium\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Helium\Controller;

use \Venus\src\Helium\common\Controller as Controller;
use \Venus\src\Helium\Model\search_attribute as SearchAttribute;
use \Venus\src\Helium\Model\category as ModelCategory;

/**
 * Controller to Category
 *
 * @category  	src
 * @package   	src\Helium\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Category extends Controller {

	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */

	public function __construct() {

		parent::__construct();
	}

	/**
	 * the home page of the Site
	 *
	 * @access public
	 * @param  int $iCategory
	 * @return void
	 */

	public function index($iCategory) {

		$this->_loadLayout();
		
		$oCategory = new ModelCategory;
		
		$aCategories = $oCategory->getAllCategoriesInOrder($iCategory, true);
		
		$aAttributesCategories = array();
		
		foreach ($aCategories as $oCategory) {
		
			$oSubCategory = new ModelCategory;
			
			$aSubCategories = $oSubCategory->getAllCategoriesInOrder($oCategory->get_id(), true);
		
			foreach ($aSubCategories as $oSubCategory) {

				$oSearchAttribute = new SearchAttribute;
				
				$aSearchAttributes = $oSearchAttribute->findByid_category($oSubCategory->get_id());
				
				foreach ($aSearchAttributes as $oOneSearchAttributes) {

					$oSearchAttribute = new SearchAttribute;
					
					$aAttributesCategories[] = $oSearchAttribute->getSearchAttributesRulesForOneSearchAttribute($oOneSearchAttributes->get_id());
					
				}
			}

			$oSearchAttribute = new SearchAttribute;
			
			$aSearchAttributes = $oSearchAttribute->findByid_category($oCategory->get_id());
			
			foreach ($aSearchAttributes as $oOneSearchAttributes) {
			
				$oSearchAttribute = new SearchAttribute;
					
				$aAttributesCategories[] = $oSearchAttribute->getSearchAttributesRulesForOneSearchAttribute($oOneSearchAttributes->get_id());	
			}
		}

		$this->layout
			 ->assign('search_attributes', $aAttributesCategories)
			 ->display();
	}
}