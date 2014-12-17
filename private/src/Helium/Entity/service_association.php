<?php
	
	/**
	 * Entity to service_association
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
	 * Entity to service_association
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
	class service_association extends Entity 
	{

		/**
		 * id_service_application
		 *
		 * @access private
		 * @var    int
		 *
		 * @primary_key
	 */
		private $id_service_application = null;
	
	
	
		/**
		 * id_service_price
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $id_service_price = null;
	
	
	
		/**
		 * id_service_price_range
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $id_service_price_range = null;
	
	
	
		/**
		 * type
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $type = null;
	
	
	
		/**
		 * id_type
		 *
		 * @access private
		 * @var    int
		 *
		 * @primary_key
	 */
		private $id_type = null;
	
	
	
		/**
		 * get id_service_application of service_association
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_service_application()
		{
			return $this->id_service_application;
		}
	
		/**
		 * set id_service_application of service_association
		 *
		 * @access public
		 * @param  int $id_service_application id_service_application of service_association
		 * @return \Venus\src\Helium\Entity\service_association
		 */
		public function set_id_service_application($id_service_application) 
		{
			$this->id_service_application = $id_service_application;
			return $this;
		}
	
		/**
		 * get id_service_price of service_association
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_service_price()
		{
			return $this->id_service_price;
		}
	
		/**
		 * set id_service_price of service_association
		 *
		 * @access public
		 * @param  int $id_service_price id_service_price of service_association
		 * @return \Venus\src\Helium\Entity\service_association
		 */
		public function set_id_service_price($id_service_price) 
		{
			$this->id_service_price = $id_service_price;
			return $this;
		}
	
		/**
		 * get id_service_price_range of service_association
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_service_price_range()
		{
			return $this->id_service_price_range;
		}
	
		/**
		 * set id_service_price_range of service_association
		 *
		 * @access public
		 * @param  int $id_service_price_range id_service_price_range of service_association
		 * @return \Venus\src\Helium\Entity\service_association
		 */
		public function set_id_service_price_range($id_service_price_range) 
		{
			$this->id_service_price_range = $id_service_price_range;
			return $this;
		}
	
		/**
		 * get type of service_association
		 *
		 * @access public
		 * @return string
		 */
		public function get_type()
		{
			return $this->type;
		}
	
		/**
		 * set type of service_association
		 *
		 * @access public
		 * @param  string $type type of service_association
		 * @return \Venus\src\Helium\Entity\service_association
		 */
		public function set_type($type) 
		{
			$this->type = $type;
			return $this;
		}
	
		/**
		 * get id_type of service_association
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_type()
		{
			return $this->id_type;
		}
	
		/**
		 * set id_type of service_association
		 *
		 * @access public
		 * @param  int $id_type id_type of service_association
		 * @return \Venus\src\Helium\Entity\service_association
		 */
		public function set_id_type($id_type) 
		{
			$this->id_type = $id_type;
			return $this;
		}
	}