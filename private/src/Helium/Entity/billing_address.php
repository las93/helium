<?php
	
/**
 * Entity to billing_address
 *
 * @category  	src
 * @package   	src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Entity;

use \Venus\core\Entity as Entity;
use \Venus\lib\Orm as Orm;

/**
 * Entity to billing_address
 *
 * @category  	src
 * @package   	src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
class billing_address extends Entity 
{
	/**
	 * id
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id = null;
	
	
	
	/**
	 * user_id
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $user_id = null;
	
	
	
	/**
	 * get id of billing_address
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of billing_address
	 *
	 * @access public
	 * @param  int $id id of billing_address
	 * @return \Venus\src\Helium\Entity\billing_address
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get user_id of billing_address
	 *
	 * @access public
	 * @return int
	 */
	public function get_user_id()
	{
		return $this->user_id;
	}

	/**
	 * set user_id of billing_address
	 *
	 * @access public
	 * @param  int $user_id user_id of billing_address
	 * @return \Venus\src\Helium\Entity\billing_address
	 */
	public function set_user_id($user_id) 
	{
		$this->user_id = $user_id;
		return $this;
	}
	}