<?php

/**
 * Model Manager
 *
 * @category  	core
 * @package   	core\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus2/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/las93/venus2
 * @link      	https://github.com/las93
 * @since     	2.0.0
 */
namespace Venus\core;

use \Attila\core\Model as AttilaModel;

/**
 * Model Manager
 *
 * @category  	core
 * @package   	core\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/venus2/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 2.0.0
 * @filesource	https://github.com/las93/venus2
 * @link      	https://github.com/las93
 * @since     	2.0.0
 */
class Model extends AttilaModel
{
	/**
	 * Constructor
	 *
	 * @access public
	 * @param  object $oDbConfig
	 * @return object
	 */
	public function __construct($oDbConfig = null)
	{
		$oDbConfig = Config::get('DB')->configuration->{DB_CONF};
		parent::__construct($oDbConfig);
	}
}
