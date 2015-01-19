<?php
	
/**
 * Entity to order
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
 * Entity to order
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
class order extends Entity 
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
	 * id_purchase
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_purchase = null;
	
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
	 * get id of order
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of order
	 *
	 * @access public
	 * @param  int $id id of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_purchase of order
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_purchase()
	{
		return $this->id_purchase;
	}

	/**
	 * set id_purchase of order
	 *
	 * @access public
	 * @param  int $id_purchase id_purchase of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_id_purchase($id_purchase) 
	{
		$this->id_purchase = $id_purchase;
		return $this;
	}
	
	/**
	 * get id_order_status of order
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_order_status()
	{
		return $this->id_order_status;
	}

	/**
	 * set id_order_status of order
	 *
	 * @access public
	 * @param  int $id_order_status id_order_status of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_id_order_status($id_order_status) 
	{
		$this->id_order_status = $id_order_status;
		return $this;
	}
	
	/**
	 * get date_create of order
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of order
	 *
	 * @access public
	 * @param  string $date_create date_create of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of order
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of order
	 *
	 * @access public
	 * @param  string $date_update date_update of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get enable of order
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of order
	 *
	 * @access public
	 * @param  bool $enable enable of order
	 * @return \Venus\src\Helium\Entity\order
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	}