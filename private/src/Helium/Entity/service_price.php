<?php
	
/**
 * Entity to service_price
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
 * Entity to service_price
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
class service_price extends Entity 
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
	 * price_type
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $price_type = null;
	
	/**
	 * price
	 *
	 * @access private
	 * @var    float
	 *
	 */
    private $price = null;
	
	/**
	 * cost
	 *
	 * @access private
	 * @var    float
	 *
	 */
    private $cost = null;
	
	/**
	 * get id of service_price
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of service_price
	 *
	 * @access public
	 * @param  int $id id of service_price
	 * @return \Venus\src\Helium\Entity\service_price
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get price_type of service_price
	 *
	 * @access public
	 * @return string
	 */
	public function get_price_type()
	{
		return $this->price_type;
	}

	/**
	 * set price_type of service_price
	 *
	 * @access public
	 * @param  string $price_type price_type of service_price
	 * @return \Venus\src\Helium\Entity\service_price
	 */
	public function set_price_type($price_type) 
	{
		$this->price_type = $price_type;
		return $this;
	}
	
	/**
	 * get price of service_price
	 *
	 * @access public
	 * @return float
	 */
	public function get_price()
	{
		return $this->price;
	}

	/**
	 * set price of service_price
	 *
	 * @access public
	 * @param  float $price price of service_price
	 * @return \Venus\src\Helium\Entity\service_price
	 */
	public function set_price($price) 
	{
		$this->price = $price;
		return $this;
	}
	
	/**
	 * get cost of service_price
	 *
	 * @access public
	 * @return float
	 */
	public function get_cost()
	{
		return $this->cost;
	}

	/**
	 * set cost of service_price
	 *
	 * @access public
	 * @param  float $cost cost of service_price
	 * @return \Venus\src\Helium\Entity\service_price
	 */
	public function set_cost($cost) 
	{
		$this->cost = $cost;
		return $this;
	}
	}