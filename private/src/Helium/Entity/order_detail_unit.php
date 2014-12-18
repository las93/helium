<?php
	
/**
 * Entity to order_detail_unit
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
 * Entity to order_detail_unit
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
class order_detail_unit extends Entity 
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
	 * id_order_status
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_order_status = null;
	
	
	
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
	 * get id of order_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of order_detail_unit
	 *
	 * @access public
	 * @param  int $id id of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_cart_detail of order_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_cart_detail()
	{
		return $this->id_cart_detail;
	}

	/**
	 * set id_cart_detail of order_detail_unit
	 *
	 * @access public
	 * @param  int $id_cart_detail id_cart_detail of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_id_cart_detail($id_cart_detail) 
	{
		$this->id_cart_detail = $id_cart_detail;
		return $this;
	}
	
	/**
	 * get id_order_status of order_detail_unit
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_order_status()
	{
		return $this->id_order_status;
	}

	/**
	 * set id_order_status of order_detail_unit
	 *
	 * @access public
	 * @param  int $id_order_status id_order_status of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_id_order_status($id_order_status) 
	{
		$this->id_order_status = $id_order_status;
		return $this;
	}
	
	/**
	 * get date_create of order_detail_unit
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of order_detail_unit
	 *
	 * @access public
	 * @param  string $date_create date_create of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of order_detail_unit
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of order_detail_unit
	 *
	 * @access public
	 * @param  string $date_update date_update of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get enable of order_detail_unit
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of order_detail_unit
	 *
	 * @access public
	 * @param  bool $enable enable of order_detail_unit
	 * @return \Venus\src\Helium\Entity\order_detail_unit
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	}