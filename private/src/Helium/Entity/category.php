<?php
	
/**
 * Entity to category
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
 * Entity to category
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
class category extends Entity 
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
	 * id_category
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_category = null;
	
	
	
	/**
	 * id_shortcuts_category
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_shortcuts_category = null;
	
	
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $name = null;
	
	
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    bool
	 *
		 */
    private $enable = null;
	
	
	
	/**
	 * visible
	 *
	 * @access private
	 * @var    bool
	 *
		 */
    private $visible = null;
	
	
	
	/**
	 * order
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $order = null;
	
	
	
	/**
	 * section
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $section = null;
	
	
	
	/**
	 * route_alias
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $route_alias = null;
	
	
	
	/**
	 * get id of category
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of category
	 *
	 * @access public
	 * @param  int $id id of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_category of category
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_category()
	{
		return $this->id_category;
	}

	/**
	 * set id_category of category
	 *
	 * @access public
	 * @param  int $id_category id_category of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_id_category($id_category) 
	{
		$this->id_category = $id_category;
		return $this;
	}
	
	/**
	 * get id_shortcuts_category of category
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_shortcuts_category()
	{
		return $this->id_shortcuts_category;
	}

	/**
	 * set id_shortcuts_category of category
	 *
	 * @access public
	 * @param  int $id_shortcuts_category id_shortcuts_category of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_id_shortcuts_category($id_shortcuts_category) 
	{
		$this->id_shortcuts_category = $id_shortcuts_category;
		return $this;
	}
	
	/**
	 * get name of category
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of category
	 *
	 * @access public
	 * @param  string $name name of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get enable of category
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of category
	 *
	 * @access public
	 * @param  bool $enable enable of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get visible of category
	 *
	 * @access public
	 * @return bool
	 */
	public function get_visible()
	{
		return $this->visible;
	}

	/**
	 * set visible of category
	 *
	 * @access public
	 * @param  bool $visible visible of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_visible($visible) 
	{
		$this->visible = $visible;
		return $this;
	}
	
	/**
	 * get order of category
	 *
	 * @access public
	 * @return int
	 */
	public function get_order()
	{
		return $this->order;
	}

	/**
	 * set order of category
	 *
	 * @access public
	 * @param  int $order order of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_order($order) 
	{
		$this->order = $order;
		return $this;
	}
	
	/**
	 * get section of category
	 *
	 * @access public
	 * @return int
	 */
	public function get_section()
	{
		return $this->section;
	}

	/**
	 * set section of category
	 *
	 * @access public
	 * @param  int $section section of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_section($section) 
	{
		$this->section = $section;
		return $this;
	}
	
	/**
	 * get route_alias of category
	 *
	 * @access public
	 * @return string
	 */
	public function get_route_alias()
	{
		return $this->route_alias;
	}

	/**
	 * set route_alias of category
	 *
	 * @access public
	 * @param  string $route_alias route_alias of category
	 * @return \Venus\src\Helium\Entity\category
	 */
	public function set_route_alias($route_alias) 
	{
		$this->route_alias = $route_alias;
		return $this;
	}
	}