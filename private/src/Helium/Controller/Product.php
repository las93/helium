<?php

/**
 * Controller to Product
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

/**
 * Controller to Product
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
class Product extends Controller
{
	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * the home page of the Site
	 *
	 * @access public
	 * @param  int $iCategory
	 * @return void
	 */
	public function index($iIdOffer)
	{
		$this->_loadLayout();
		
		$this->layout
			 ->assign('search_attributes', $aAttributesCategories)
			 ->display();
	}
}
