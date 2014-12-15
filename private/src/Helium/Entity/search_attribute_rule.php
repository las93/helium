<?php
	
	/**
	 * Entity to search_attribute_rule
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
	 * Entity to search_attribute_rule
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
	class search_attribute_rule extends Entity 
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
		 * id_search_attribute
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $id_search_attribute = null;
	
	
	
		/**
		 * name
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $name = null;
	
	
	
		/**
		 * type
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $type = null;
	
	
	
		/**
		 * id_by_type
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $id_by_type = null;
	
	
	
		/**
		 * value_min
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $value_min = null;
	
	
	
		/**
		 * value_max
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $value_max = null;
	
	
	
		/**
		 * value
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $value = null;
	
	
	
		/**
		 * get id of search_attribute_rule
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of search_attribute_rule
		 *
		 * @access public
		 * @param  int $id id of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get id_search_attribute of search_attribute_rule
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_search_attribute()
		{
			return $this->id_search_attribute;
		}
	
		/**
		 * set id_search_attribute of search_attribute_rule
		 *
		 * @access public
		 * @param  int $id_search_attribute id_search_attribute of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_id_search_attribute($id_search_attribute) 
		{
			$this->id_search_attribute = $id_search_attribute;
			return $this;
		}
	
		/**
		 * get name of search_attribute_rule
		 *
		 * @access public
		 * @return string
		 */
		public function get_name()
		{
			return $this->name;
		}
	
		/**
		 * set name of search_attribute_rule
		 *
		 * @access public
		 * @param  string $name name of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_name($name) 
		{
			$this->name = $name;
			return $this;
		}
	
		/**
		 * get type of search_attribute_rule
		 *
		 * @access public
		 * @return string
		 */
		public function get_type()
		{
			return $this->type;
		}
	
		/**
		 * set type of search_attribute_rule
		 *
		 * @access public
		 * @param  string $type type of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_type($type) 
		{
			$this->type = $type;
			return $this;
		}
	
		/**
		 * get id_by_type of search_attribute_rule
		 *
		 * @access public
		 * @return string
		 */
		public function get_id_by_type()
		{
			return $this->id_by_type;
		}
	
		/**
		 * set id_by_type of search_attribute_rule
		 *
		 * @access public
		 * @param  string $id_by_type id_by_type of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_id_by_type($id_by_type) 
		{
			$this->id_by_type = $id_by_type;
			return $this;
		}
	
		/**
		 * get value_min of search_attribute_rule
		 *
		 * @access public
		 * @return int
		 */
		public function get_value_min()
		{
			return $this->value_min;
		}
	
		/**
		 * set value_min of search_attribute_rule
		 *
		 * @access public
		 * @param  int $value_min value_min of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_value_min($value_min) 
		{
			$this->value_min = $value_min;
			return $this;
		}
	
		/**
		 * get value_max of search_attribute_rule
		 *
		 * @access public
		 * @return int
		 */
		public function get_value_max()
		{
			return $this->value_max;
		}
	
		/**
		 * set value_max of search_attribute_rule
		 *
		 * @access public
		 * @param  int $value_max value_max of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_value_max($value_max) 
		{
			$this->value_max = $value_max;
			return $this;
		}
	
		/**
		 * get value of search_attribute_rule
		 *
		 * @access public
		 * @return string
		 */
		public function get_value()
		{
			return $this->value;
		}
	
		/**
		 * set value of search_attribute_rule
		 *
		 * @access public
		 * @param  string $value value of search_attribute_rule
		 * @return \Venus\src\Helium\Entity\search_attribute_rule
		 */
		public function set_value($value) 
		{
			$this->value = $value;
			return $this;
		}
	}