<?php
	
	/**
	 * Entity to review
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
	 * Entity to review
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
	class review extends Entity 
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
		 * id_user
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $id_user = null;
	
	
	
		/**
		 * title
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $title = null;
	
	
	
		/**
		 * comment
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $comment = null;
	
	
	
		/**
		 * date_create
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $date_create = null;
	
	
	
		/**
		 * enable
		 *
		 * @access private
		 * @var    int
		 *
		 */
		private $enable = null;
	
	
	
		/**
		 * get id of review
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of review
		 *
		 * @access public
		 * @param  int $id id of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get id_user of review
		 *
		 * @access public
		 * @return int
		 */
		public function get_id_user()
		{
			return $this->id_user;
		}
	
		/**
		 * set id_user of review
		 *
		 * @access public
		 * @param  int $id_user id_user of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_id_user($id_user) 
		{
			$this->id_user = $id_user;
			return $this;
		}
	
		/**
		 * get title of review
		 *
		 * @access public
		 * @return string
		 */
		public function get_title()
		{
			return $this->title;
		}
	
		/**
		 * set title of review
		 *
		 * @access public
		 * @param  string $title title of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_title($title) 
		{
			$this->title = $title;
			return $this;
		}
	
		/**
		 * get comment of review
		 *
		 * @access public
		 * @return string
		 */
		public function get_comment()
		{
			return $this->comment;
		}
	
		/**
		 * set comment of review
		 *
		 * @access public
		 * @param  string $comment comment of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_comment($comment) 
		{
			$this->comment = $comment;
			return $this;
		}
	
		/**
		 * get date_create of review
		 *
		 * @access public
		 * @return string
		 */
		public function get_date_create()
		{
			return $this->date_create;
		}
	
		/**
		 * set date_create of review
		 *
		 * @access public
		 * @param  string $date_create date_create of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_date_create($date_create) 
		{
			$this->date_create = $date_create;
			return $this;
		}
	
		/**
		 * get enable of review
		 *
		 * @access public
		 * @return int
		 */
		public function get_enable()
		{
			return $this->enable;
		}
	
		/**
		 * set enable of review
		 *
		 * @access public
		 * @param  int $enable enable of review
		 * @return \Venus\src\Helium\Entity\review
		 */
		public function set_enable($enable) 
		{
			$this->enable = $enable;
			return $this;
		}
	}