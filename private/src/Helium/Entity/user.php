<?php
	
	/**
	 * Entity to user
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
	 * Entity to user
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
	class user extends Entity 
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
		 * firstname
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $firstname = null;
	
	
	
		/**
		 * email
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $email = null;
	
	
	
		/**
		 * password
		 *
		 * @access private
		 * @var    string
		 *
		 */
		private $password = null;
	
	
	
		/**
		 * get id of user
		 *
		 * @access public
		 * @return int
		 */
		public function get_id()
		{
			return $this->id;
		}
	
		/**
		 * set id of user
		 *
		 * @access public
		 * @param  int $id id of user
		 * @return \Venus\src\Helium\Entity\user
		 */
		public function set_id($id) 
		{
			$this->id = $id;
			return $this;
		}
	
		/**
		 * get name of user
		 *
		 * @access public
		 * @return string
		 */
		public function get_name()
		{
			return $this->name;
		}
	
		/**
		 * set name of user
		 *
		 * @access public
		 * @param  string $name name of user
		 * @return \Venus\src\Helium\Entity\user
		 */
		public function set_name($name) 
		{
			$this->name = $name;
			return $this;
		}
	
		/**
		 * get firstname of user
		 *
		 * @access public
		 * @return string
		 */
		public function get_firstname()
		{
			return $this->firstname;
		}
	
		/**
		 * set firstname of user
		 *
		 * @access public
		 * @param  string $firstname firstname of user
		 * @return \Venus\src\Helium\Entity\user
		 */
		public function set_firstname($firstname) 
		{
			$this->firstname = $firstname;
			return $this;
		}
	
		/**
		 * get email of user
		 *
		 * @access public
		 * @return string
		 */
		public function get_email()
		{
			return $this->email;
		}
	
		/**
		 * set email of user
		 *
		 * @access public
		 * @param  string $email email of user
		 * @return \Venus\src\Helium\Entity\user
		 */
		public function set_email($email) 
		{
			$this->email = $email;
			return $this;
		}
	
		/**
		 * get password of user
		 *
		 * @access public
		 * @return string
		 */
		public function get_password()
		{
			return $this->password;
		}
	
		/**
		 * set password of user
		 *
		 * @access public
		 * @param  string $password password of user
		 * @return \Venus\src\Helium\Entity\user
		 */
		public function set_password($password) 
		{
			$this->password = $password;
			return $this;
		}
	}