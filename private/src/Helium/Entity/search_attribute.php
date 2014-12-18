<?php
	
/**
 * Entity to search_attribute
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
 * Entity to search_attribute
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
class search_attribute extends Entity 
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
	 * label_for_all
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $label_for_all = null;
	
	
	
	/**
	 * id_category
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_category = null;
	
	
	
	/**
	 * get id of search_attribute
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of search_attribute
	 *
	 * @access public
	 * @param  int $id id of search_attribute
	 * @return \Venus\src\Helium\Entity\search_attribute
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get name of search_attribute
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of search_attribute
	 *
	 * @access public
	 * @param  string $name name of search_attribute
	 * @return \Venus\src\Helium\Entity\search_attribute
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get label_for_all of search_attribute
	 *
	 * @access public
	 * @return string
	 */
	public function get_label_for_all()
	{
		return $this->label_for_all;
	}

	/**
	 * set label_for_all of search_attribute
	 *
	 * @access public
	 * @param  string $label_for_all label_for_all of search_attribute
	 * @return \Venus\src\Helium\Entity\search_attribute
	 */
	public function set_label_for_all($label_for_all) 
	{
		$this->label_for_all = $label_for_all;
		return $this;
	}
	
	/**
	 * get id_category of search_attribute
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_category()
	{
		return $this->id_category;
	}

	/**
	 * set id_category of search_attribute
	 *
	 * @access public
	 * @param  int $id_category id_category of search_attribute
	 * @return \Venus\src\Helium\Entity\search_attribute
	 */
	public function set_id_category($id_category) 
	{
		$this->id_category = $id_category;
		return $this;
	}
	}