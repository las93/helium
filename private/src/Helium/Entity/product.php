<?php
	
	/**
	 * Entity to product
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
	 * Entity to product
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
	class product extends Entity 
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
		 * id_brand
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $id_brand = null;
	
	
	
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
		 * name
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $name = null;
	
	
	
		/**
		 * short_description
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $short_description = null;
	
	
	
		/**
		 * description
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $description = null;
	
	
	
		/**
		 * ean13
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $ean13 = null;
	
	
	
		/**
		 * market_price
		 *
		 * @access private
		 * @var    float
		 *
		 */
		private $market_price = null;
	
	
	
		/**
		 * reference
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $reference = null;
	
	
	
		/**
		 * get id of product
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of product
		 *
		 * @access public
		 * @param  int $id id of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get id_brand of product
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_brand()
		{
			return $this->id_brand;
		}
	
		/**
		 * set id_brand of product
		 *
		 * @access public
		 * @param  int $id_brand id_brand of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_id_brand($id_brand) 
		{
			$this->id_brand = $id_brand;
			return $this;
		}
	
		/**
		 * get date_create of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_date_create()
		{
			return $this->date_create;
		}
	
		/**
		 * set date_create of product
		 *
		 * @access public
		 * @param  string $date_create date_create of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_date_create($date_create) 
		{
			$this->date_create = $date_create;
			return $this;
		}
	
		/**
		 * get date_update of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_date_update()
		{
			return $this->date_update;
		}
	
		/**
		 * set date_update of product
		 *
		 * @access public
		 * @param  string $date_update date_update of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_date_update($date_update) 
		{
			$this->date_update = $date_update;
			return $this;
		}
	
		/**
		 * get name of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_name()
		{
			return $this->name;
		}
	
		/**
		 * set name of product
		 *
		 * @access public
		 * @param  string $name name of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_name($name) 
		{
			$this->name = $name;
			return $this;
		}
	
		/**
		 * get short_description of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_short_description()
		{
			return $this->short_description;
		}
	
		/**
		 * set short_description of product
		 *
		 * @access public
		 * @param  string $short_description short_description of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_short_description($short_description) 
		{
			$this->short_description = $short_description;
			return $this;
		}
	
		/**
		 * get description of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_description()
		{
			return $this->description;
		}
	
		/**
		 * set description of product
		 *
		 * @access public
		 * @param  string $description description of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_description($description) 
		{
			$this->description = $description;
			return $this;
		}
	
		/**
		 * get ean13 of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_ean13()
		{
			return $this->ean13;
		}
	
		/**
		 * set ean13 of product
		 *
		 * @access public
		 * @param  string $ean13 ean13 of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_ean13($ean13) 
		{
			$this->ean13 = $ean13;
			return $this;
		}
	
		/**
		 * get market_price of product
		 *
		 * @access public
		 * @return float
		 */
		public function get_market_price()
		{
			return $this->market_price;
		}
	
		/**
		 * set market_price of product
		 *
		 * @access public
		 * @param  float $market_price market_price of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_market_price($market_price) 
		{
			$this->market_price = $market_price;
			return $this;
		}
	
		/**
		 * get reference of product
		 *
		 * @access public
		 * @return string
		 */
		public function get_reference()
		{
			return $this->reference;
		}
	
		/**
		 * set reference of product
		 *
		 * @access public
		 * @param  string $reference reference of product
		 * @return \Venus\src\Helium\Entity\product
		 */
		public function set_reference($reference) 
		{
			$this->reference = $reference;
			return $this;
		}
	}