<?php
	
/**
 * Entity to user_merchant
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
 * Entity to user_merchant
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
class user_merchant extends Entity 
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
	 * id_merchant
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_merchant = null;
	
	
	
	/**
	 * get id_user of user_merchant
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of user_merchant
	 *
	 * @access public
	 * @param  int $id_user id_user of user_merchant
	 * @return \Venus\src\Helium\Entity\user_merchant
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get id_merchant of user_merchant
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_merchant()
	{
		return $this->id_merchant;
	}

	/**
	 * set id_merchant of user_merchant
	 *
	 * @access public
	 * @param  int $id_merchant id_merchant of user_merchant
	 * @return \Venus\src\Helium\Entity\user_merchant
	 */
	public function set_id_merchant($id_merchant) 
	{
		$this->id_merchant = $id_merchant;
		return $this;
	}
	}