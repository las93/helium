<?php

/**
 * Controller Manager
 *
 * @category  	src\Rest
 * @package   	src\Rest\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus_rest
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Rest\common;

use \Venus\core\Controller as CoreController;

/**
 * Controller Manager
 *
 * @category  	src\Rest
 * @package   	src\Rest\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/venus_rest
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
}
