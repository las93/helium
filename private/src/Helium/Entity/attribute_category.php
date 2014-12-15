<?php
	
	/**
	 * Entity to attribute_category
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
	 * Entity to attribute_category
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
	class attribute_category extends Entity 
	{

		/**
		 * id_attribute
		 *
		 * @access private
		 * @var    int
		 *
		 * @primary_key
	 */
		private $id_attribute = null;
	
	
	
		/**
		 * id_category
		 *
		 * @access private
		 * @var    int
		 *
		 * @primary_key
	 */
		private $id_category = null;
	
	
	
		/**
		 * get id_attribute of attribute_category
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_attribute()
		{
			return $this->id_attribute;
		}
	
		/**
		 * set id_attribute of attribute_category
		 *
		 * @access public
		 * @param  int $id_attribute id_attribute of attribute_category
		 * @return \Venus\src\Helium\Entity\attribute_category
		 */
		public function set_id_attribute($id_attribute) 
		{
			$this->id_attribute = $id_attribute;
			return $this;
		}
	
		/**
		 * get id_category of attribute_category
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_category()
		{
			return $this->id_category;
		}
	
		/**
		 * set id_category of attribute_category
		 *
		 * @access public
		 * @param  int $id_category id_category of attribute_category
		 * @return \Venus\src\Helium\Entity\attribute_category
		 */
		public function set_id_category($id_category) 
		{
			$this->id_category = $id_category;
			return $this;
		}
	}