<?php
	
/**
 * Entity to user_right
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
 * Entity to user_right
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
class user_right extends Entity 
{
	/**
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_user = null;
	
	
	
	/**
	 * id_right
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_right = null;
	
	
	
	/**
	 * get id_user of user_right
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of user_right
	 *
	 * @access public
	 * @param  int $id_user id_user of user_right
	 * @return \Venus\src\Helium\Entity\user_right
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get id_right of user_right
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_right()
	{
		return $this->id_right;
	}

	/**
	 * set id_right of user_right
	 *
	 * @access public
	 * @param  int $id_right id_right of user_right
	 * @return \Venus\src\Helium\Entity\user_right
	 */
	public function set_id_right($id_right) 
	{
		$this->id_right = $id_right;
		return $this;
	}
	}