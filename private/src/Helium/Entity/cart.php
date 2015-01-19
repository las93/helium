<?php
	
/**
 * Entity to cart
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Entity;

use \Attila\core\Entity as Entity;
use \Attila\Orm as Orm;

/**
 * Entity to cart
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
class cart extends Entity 
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
	 * id_cart_status
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_cart_status = null;
	
	/**
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_user = null;
	
	/**
	 * id_billing_address
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_billing_address = null;
	
	/**
	 * id_site
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_site = null;
	
	/**
	 * id_currency
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_currency = null;
	
	/**
	 * id_insert_channel_id
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_insert_channel_id = null;
	
	/**
	 * id_channel_id
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_channel_id = null;
	
	/**
	 * id_cart_parent
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_cart_parent = null;
	
	/**
	 * date_create
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $date_create = null;
	
	/**
	 * date_update
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $date_update = null;
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    bool
	 *
	 */
    private $enable = null;
	
	/**
	 * synchronize
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $synchronize = null;
	
	/**
	 * get id of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of cart
	 *
	 * @access public
	 * @param  int $id id of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_cart_status of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_cart_status()
	{
		return $this->id_cart_status;
	}

	/**
	 * set id_cart_status of cart
	 *
	 * @access public
	 * @param  int $id_cart_status id_cart_status of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_cart_status($id_cart_status) 
	{
		$this->id_cart_status = $id_cart_status;
		return $this;
	}
	
	/**
	 * get id_user of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of cart
	 *
	 * @access public
	 * @param  int $id_user id_user of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get id_billing_address of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_billing_address()
	{
		return $this->id_billing_address;
	}

	/**
	 * set id_billing_address of cart
	 *
	 * @access public
	 * @param  int $id_billing_address id_billing_address of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_billing_address($id_billing_address) 
	{
		$this->id_billing_address = $id_billing_address;
		return $this;
	}
	
	/**
	 * get id_site of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_site()
	{
		return $this->id_site;
	}

	/**
	 * set id_site of cart
	 *
	 * @access public
	 * @param  int $id_site id_site of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_site($id_site) 
	{
		$this->id_site = $id_site;
		return $this;
	}
	
	/**
	 * get id_currency of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_currency()
	{
		return $this->id_currency;
	}

	/**
	 * set id_currency of cart
	 *
	 * @access public
	 * @param  int $id_currency id_currency of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_currency($id_currency) 
	{
		$this->id_currency = $id_currency;
		return $this;
	}
	
	/**
	 * get id_insert_channel_id of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_insert_channel_id()
	{
		return $this->id_insert_channel_id;
	}

	/**
	 * set id_insert_channel_id of cart
	 *
	 * @access public
	 * @param  int $id_insert_channel_id id_insert_channel_id of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_insert_channel_id($id_insert_channel_id) 
	{
		$this->id_insert_channel_id = $id_insert_channel_id;
		return $this;
	}
	
	/**
	 * get id_channel_id of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_channel_id()
	{
		return $this->id_channel_id;
	}

	/**
	 * set id_channel_id of cart
	 *
	 * @access public
	 * @param  int $id_channel_id id_channel_id of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_channel_id($id_channel_id) 
	{
		$this->id_channel_id = $id_channel_id;
		return $this;
	}
	
	/**
	 * get id_cart_parent of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_cart_parent()
	{
		return $this->id_cart_parent;
	}

	/**
	 * set id_cart_parent of cart
	 *
	 * @access public
	 * @param  int $id_cart_parent id_cart_parent of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_id_cart_parent($id_cart_parent) 
	{
		$this->id_cart_parent = $id_cart_parent;
		return $this;
	}
	
	/**
	 * get date_create of cart
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of cart
	 *
	 * @access public
	 * @param  string $date_create date_create of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of cart
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of cart
	 *
	 * @access public
	 * @param  string $date_update date_update of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get enable of cart
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of cart
	 *
	 * @access public
	 * @param  bool $enable enable of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get synchronize of cart
	 *
	 * @access public
	 * @return int
	 */
	public function get_synchronize()
	{
		return $this->synchronize;
	}

	/**
	 * set synchronize of cart
	 *
	 * @access public
	 * @param  int $synchronize synchronize of cart
	 * @return \Venus\src\Helium\Entity\cart
	 */
	public function set_synchronize($synchronize) 
	{
		$this->synchronize = $synchronize;
		return $this;
	}
	}