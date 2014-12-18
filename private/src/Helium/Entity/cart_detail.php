<?php
	
/**
 * Entity to cart_detail
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
 * Entity to cart_detail
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
class cart_detail extends Entity 
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
	 * id_cart
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_cart = null;
	
	
	
	/**
	 * id_offer
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_offer = null;
	
	
	
	/**
	 * id_merchant
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_merchant = null;
	
	
	
	/**
	 * id_shipping_address
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_shipping_address = null;
	
	
	
	/**
	 * vat_id
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $vat_id = null;
	
	
	
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
	 * @var    string
	 *
		 */
    private $enable = null;
	
	
	
	/**
	 * price
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $price = null;
	
	
	
	/**
	 * is_gift
	 *
	 * @access private
	 * @var    bool
	 *
		 */
    private $is_gift = null;
	
	
	
	/**
	 * gift_message
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $gift_message = null;
	
	
	
	/**
	 * get id of cart_detail
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of cart_detail
	 *
	 * @access public
	 * @param  int $id id of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_cart of cart_detail
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_cart()
	{
		return $this->id_cart;
	}

	/**
	 * set id_cart of cart_detail
	 *
	 * @access public
	 * @param  int $id_cart id_cart of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_id_cart($id_cart) 
	{
		$this->id_cart = $id_cart;
		return $this;
	}
	
	/**
	 * get id_offer of cart_detail
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of cart_detail
	 *
	 * @access public
	 * @param  int $id_offer id_offer of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get id_merchant of cart_detail
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_merchant()
	{
		return $this->id_merchant;
	}

	/**
	 * set id_merchant of cart_detail
	 *
	 * @access public
	 * @param  int $id_merchant id_merchant of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_id_merchant($id_merchant) 
	{
		$this->id_merchant = $id_merchant;
		return $this;
	}
	
	/**
	 * get id_shipping_address of cart_detail
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_shipping_address()
	{
		return $this->id_shipping_address;
	}

	/**
	 * set id_shipping_address of cart_detail
	 *
	 * @access public
	 * @param  int $id_shipping_address id_shipping_address of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_id_shipping_address($id_shipping_address) 
	{
		$this->id_shipping_address = $id_shipping_address;
		return $this;
	}
	
	/**
	 * get vat_id of cart_detail
	 *
	 * @access public
	 * @return float
	 */
	public function get_vat_id()
	{
		return $this->vat_id;
	}

	/**
	 * set vat_id of cart_detail
	 *
	 * @access public
	 * @param  float $vat_id vat_id of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_vat_id($vat_id) 
	{
		$this->vat_id = $vat_id;
		return $this;
	}
	
	/**
	 * get date_create of cart_detail
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of cart_detail
	 *
	 * @access public
	 * @param  string $date_create date_create of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of cart_detail
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of cart_detail
	 *
	 * @access public
	 * @param  string $date_update date_update of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get enable of cart_detail
	 *
	 * @access public
	 * @return string
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of cart_detail
	 *
	 * @access public
	 * @param  string $enable enable of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get price of cart_detail
	 *
	 * @access public
	 * @return float
	 */
	public function get_price()
	{
		return $this->price;
	}

	/**
	 * set price of cart_detail
	 *
	 * @access public
	 * @param  float $price price of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_price($price) 
	{
		$this->price = $price;
		return $this;
	}
	
	/**
	 * get is_gift of cart_detail
	 *
	 * @access public
	 * @return bool
	 */
	public function get_is_gift()
	{
		return $this->is_gift;
	}

	/**
	 * set is_gift of cart_detail
	 *
	 * @access public
	 * @param  bool $is_gift is_gift of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_is_gift($is_gift) 
	{
		$this->is_gift = $is_gift;
		return $this;
	}
	
	/**
	 * get gift_message of cart_detail
	 *
	 * @access public
	 * @return string
	 */
	public function get_gift_message()
	{
		return $this->gift_message;
	}

	/**
	 * set gift_message of cart_detail
	 *
	 * @access public
	 * @param  string $gift_message gift_message of cart_detail
	 * @return \Venus\src\Helium\Entity\cart_detail
	 */
	public function set_gift_message($gift_message) 
	{
		$this->gift_message = $gift_message;
		return $this;
	}
	}