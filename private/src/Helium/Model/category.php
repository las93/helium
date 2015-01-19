<?php

/**
 * Model to category
 *
 * @category  	src
 * @package   	src\Helium\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Helium\Model;

use \Venus\core\Model as Model;

/**
 * Model to category
 *
 * @category  	src
 * @package   	src\Helium\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class category extends Model {
	
	/**
	 * Get all categories in order for one parent category id
	 *
	 * @access public
	 * @param  integer $iParentCategoryId perent category id
	 * @param  bool $bVisibleAndEnableCheck check if the category is enable and visible 
	 * @return array
	 */
	
	public function getAllCategoriesInOrder($iParentCategoryId, $bVisibleAndEnableCheck = false) {
	
		$aResult = array();
	
		$this->orm
			 ->select(array('*'))
			 ->from($this->_sTableName)
			 ->where($this->where->whereEqual('id_category', $iParentCategoryId));
		
		if ($bVisibleAndEnableCheck === true) {

			$this->orm
				 ->where($this->where->whereEqual('id_category', $iParentCategoryId)->andWhereEqual('enable', 1)->andWhereEqual('visible', 1));
		}
		else {
						
			$this->orm
				 ->where($this->where->whereEqual('id_category', $iParentCategoryId));
		}
						
		$aResult = $this->orm
						->orderBy(['`order` ASC'])
						->load(false, 'Venus\src\Helium\Entity\\');

		return $aResult;
	}
}
