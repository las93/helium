<?php
	
	/**
	 * Entity to attribute_offer
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
	 * Entity to attribute_offer
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
	class attribute_offer extends Entity 
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
		 * id_offer
		 *
		 * @access private
		 * @var    int
		 *
		 * @primary_key
	 */
		private $id_offer = null;
	
	
	
		/**
		 * value
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $value = null;
	
	
	
		/**
		 * get id_attribute of attribute_offer
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_attribute()
		{
			return $this->id_attribute;
		}
	
		/**
		 * set id_attribute of attribute_offer
		 *
		 * @access public
		 * @param  int $id_attribute id_attribute of attribute_offer
		 * @return \Venus\src\Helium\Entity\attribute_offer
		 */
		public function set_id_attribute($id_attribute) 
		{
			$this->id_attribute = $id_attribute;
			return $this;
		}
	
		/**
		 * get id_offer of attribute_offer
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_offer()
		{
			return $this->id_offer;
		}
	
		/**
		 * set id_offer of attribute_offer
		 *
		 * @access public
		 * @param  int $id_offer id_offer of attribute_offer
		 * @return \Venus\src\Helium\Entity\attribute_offer
		 */
		public function set_id_offer($id_offer) 
		{
			$this->id_offer = $id_offer;
			return $this;
		}
	
		/**
		 * get value of attribute_offer
		 *
		 * @access public
		 * @return string
		 */
		public function get_value()
		{
			return $this->value;
		}
	
		/**
		 * set value of attribute_offer
		 *
		 * @access public
		 * @param  string $value value of attribute_offer
		 * @return \Venus\src\Helium\Entity\attribute_offer
		 */
		public function set_value($value) 
		{
			$this->value = $value;
			return $this;
		}
	}