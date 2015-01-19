<?php
	
/**
 * Entity to attribute
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Entity;

use \Attila\core\Entity as Entity;
use \Attila\Orm as Orm;

/**
 * Entity to attribute
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
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
	 * attribute_offer Entity
	 *
	 * @access private
	 * @var    attribute_offer
	 * @join
	 *
	 */
    private $attribute_offer = null;
	
	
	
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
	 * get attribute_offer entity join by id of attribute
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_attribute_offer($aWhere = array())
	{
		if ($this->attribute_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('attribute_offer');
												   
	        $aWhere['id_attribute'] = $this->get_id();
											
													  
            $this->attribute_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->attribute_offer;
	}
	
	/**
	 * set attribute_offer entity join by id of attribute
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\attribute_offer  $attribute_offer attribute_offer entity
	 * @join
	 * @return array
	 */
	public function set_attribute_offer(array $attribute_offer)
	{
		$this->attribute_offer = $attribute_offer;
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