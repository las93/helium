<?php

/**
 * Controller Manager
 *
 * @category  	src\Helium
 * @package   	src\Helium\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Helium\common;

use \Venus\core\Controller as CoreController;
use \Venus\src\Helium\Model\category as Category;

/**
 * Controller Manager
 *
 * @category  	src\Helium
 * @package   	src\Helium\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

abstract class Controller extends CoreController {

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
	 * Load everything for the layout
	 * 
	 * @access protected
	 * @return void
	 */
	
	protected function _loadLayout() {

		$oCategory = new Category;
		$aCategories = $oCategory->getAllCategoriesInOrder(0, true);

		foreach ($aCategories as $iKey => $aOneCategorie) {

			$oCategory = new Category;
			$aCategories[$iKey]->sub_menu = $oCategory->getAllCategoriesInOrder($aOneCategorie->get_id(), true);
		}
		
		$this->layout
			 ->assign('categories', $aCategories);
	}
}
