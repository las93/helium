<?php
	
/**
 * Entity to cart_detail_unit
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
 * Entity to cart_detail_unit
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
class cart_detail_unit extends Entity 
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
	 * id_cart_detail
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_cart_detail = null;
	
	
	
	/**
	 * id_discount
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_discount = null;
	
	
	
	/**
	 * id_tax
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_tax = null;
	
	
	
	/**
	 * id_parent
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_parent = null;
	
	
	
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
	 * discount_amount
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $discount_amount = null;
	
	
	
	/**
	 * tax_amount
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $tax_amount = null;
	
	
	
	/**
	 * get id of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of cart_detail_unit
	 *
	 * @access public
	 * @param  int $id id of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_cart_detail of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_cart_detail()
	{
		return $this->id_cart_detail;
	}

	/**
	 * set id_cart_detail of cart_detail_unit
	 *
	 * @access public
	 * @param  int $id_cart_detail id_cart_detail of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_id_cart_detail($id_cart_detail) 
	{
		$this->id_cart_detail = $id_cart_detail;
		return $this;
	}
	
	/**
	 * get id_discount of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_discount()
	{
		return $this->id_discount;
	}

	/**
	 * set id_discount of cart_detail_unit
	 *
	 * @access public
	 * @param  int $id_discount id_discount of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_id_discount($id_discount) 
	{
		$this->id_discount = $id_discount;
		return $this;
	}
	
	/**
	 * get id_tax of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_tax()
	{
		return $this->id_tax;
	}

	/**
	 * set id_tax of cart_detail_unit
	 *
	 * @access public
	 * @param  int $id_tax id_tax of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_id_tax($id_tax) 
	{
		$this->id_tax = $id_tax;
		return $this;
	}
	
	/**
	 * get id_parent of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_parent()
	{
		return $this->id_parent;
	}

	/**
	 * set id_parent of cart_detail_unit
	 *
	 * @access public
	 * @param  int $id_parent id_parent of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_id_parent($id_parent) 
	{
		$this->id_parent = $id_parent;
		return $this;
	}
	
	/**
	 * get date_create of cart_detail_unit
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of cart_detail_unit
	 *
	 * @access public
	 * @param  string $date_create date_create of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of cart_detail_unit
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of cart_detail_unit
	 *
	 * @access public
	 * @param  string $date_update date_update of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get enable of cart_detail_unit
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of cart_detail_unit
	 *
	 * @access public
	 * @param  bool $enable enable of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get discount_amount of cart_detail_unit
	 *
	 * @access public
	 * @return float
	 */
	public function get_discount_amount()
	{
		return $this->discount_amount;
	}

	/**
	 * set discount_amount of cart_detail_unit
	 *
	 * @access public
	 * @param  float $discount_amount discount_amount of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_discount_amount($discount_amount) 
	{
		$this->discount_amount = $discount_amount;
		return $this;
	}
	
	/**
	 * get tax_amount of cart_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_tax_amount()
	{
		return $this->tax_amount;
	}

	/**
	 * set tax_amount of cart_detail_unit
	 *
	 * @access public
	 * @param  int $tax_amount tax_amount of cart_detail_unit
	 * @return \Venus\src\Helium\Entity\cart_detail_unit
	 */
	public function set_tax_amount($tax_amount) 
	{
		$this->tax_amount = $tax_amount;
		return $this;
	}
	}