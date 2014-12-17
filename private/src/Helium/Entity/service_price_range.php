<?php
	
	/**
	 * Entity to service_price_range
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
	 * Entity to service_price_range
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
	class service_price_range extends Entity 
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
		 * min
		 *
		 * @access private
		 * @var    float
		 *
		 */
		private $min = null;
	
	
	
		/**
		 * max
		 *
		 * @access private
		 * @var    float
		 *
		 */
		private $max = null;
	
	
	
		/**
		 * cost
		 *
		 * @access private
		 * @var    float
		 *
		 */
		private $cost = null;
	
	
	
		/**
		 * get id of service_price_range
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of service_price_range
		 *
		 * @access public
		 * @param  int $id id of service_price_range
		 * @return \Venus\src\Helium\Entity\service_price_range
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get min of service_price_range
		 *
		 * @access public
		 * @return float
		 */
		public function get_min()
		{
			return $this->min;
		}
	
		/**
		 * set min of service_price_range
		 *
		 * @access public
		 * @param  float $min min of service_price_range
		 * @return \Venus\src\Helium\Entity\service_price_range
		 */
		public function set_min($min) 
		{
			$this->min = $min;
			return $this;
		}
	
		/**
		 * get max of service_price_range
		 *
		 * @access public
		 * @return float
		 */
		public function get_max()
		{
			return $this->max;
		}
	
		/**
		 * set max of service_price_range
		 *
		 * @access public
		 * @param  float $max max of service_price_range
		 * @return \Venus\src\Helium\Entity\service_price_range
		 */
		public function set_max($max) 
		{
			$this->max = $max;
			return $this;
		}
	
		/**
		 * get cost of service_price_range
		 *
		 * @access public
		 * @return float
		 */
		public function get_cost()
		{
			return $this->cost;
		}
	
		/**
		 * set cost of service_price_range
		 *
		 * @access public
		 * @param  float $cost cost of service_price_range
		 * @return \Venus\src\Helium\Entity\service_price_range
		 */
		public function set_cost($cost) 
		{
			$this->cost = $cost;
			return $this;
		}
	}