<?php
	
	/**
	 * Entity to service_period
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
	 * Entity to service_period
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
	class service_period extends Entity 
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
		 * type
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $type = null;
	
	
	
		/**
		 * value
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $value = null;
	
	
	
		/**
		 * get id of service_period
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of service_period
		 *
		 * @access public
		 * @param  int $id id of service_period
		 * @return \Venus\src\Helium\Entity\service_period
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get type of service_period
		 *
		 * @access public
		 * @return string
		 */
		public function get_type()
		{
			return $this->type;
		}
	
		/**
		 * set type of service_period
		 *
		 * @access public
		 * @param  string $type type of service_period
		 * @return \Venus\src\Helium\Entity\service_period
		 */
		public function set_type($type) 
		{
			$this->type = $type;
			return $this;
		}
	
		/**
		 * get value of service_period
		 *
		 * @access public
		 * @return int
		 */
		public function get_value()
		{
			return $this->value;
		}
	
		/**
		 * set value of service_period
		 *
		 * @access public
		 * @param  int $value value of service_period
		 * @return \Venus\src\Helium\Entity\service_period
		 */
		public function set_value($value) 
		{
			$this->value = $value;
			return $this;
		}
	}