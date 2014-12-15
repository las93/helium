<?php
	
	/**
	 * Entity to attribute
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
	 * Entity to attribute
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
	class attribute extends Entity 
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
		 * get id of attribute
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of attribute
		 *
		 * @access public
		 * @param  int $id id of attribute
		 * @return \Venus\src\Helium\Entity\attribute
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get name of attribute
		 *
		 * @access public
		 * @return string
		 */
		public function get_name()
		{
			return $this->name;
		}
	
		/**
		 * set name of attribute
		 *
		 * @access public
		 * @param  string $name name of attribute
		 * @return \Venus\src\Helium\Entity\attribute
		 */
		public function set_name($name) 
		{
			$this->name = $name;
			return $this;
		}
	
		/**
		 * get type of attribute
		 *
		 * @access public
		 * @return string
		 */
		public function get_type()
		{
			return $this->type;
		}
	
		/**
		 * set type of attribute
		 *
		 * @access public
		 * @param  string $type type of attribute
		 * @return \Venus\src\Helium\Entity\attribute
		 */
		public function set_type($type) 
		{
			$this->type = $type;
			return $this;
		}
	}