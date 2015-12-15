<?php
	
/**
 * Entity to attribute_value
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
 * Entity to attribute_value
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
class attribute_value extends Entity 
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
	 * id_attribute
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_attribute = null;
	
	/**
	 * value
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $value = null;
	
	/**
	 * get id of attribute_value
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of attribute_value
	 *
	 * @access public
	 * @param  int $id id of attribute_value
	 * @return \Venus\src\Helium\Entity\attribute_value
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get attribute_offer entity join by id of attribute_value
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
												   
	        $aWhere['id_attribute_value'] = $this->get_id();
											
													  
            $this->attribute_offer = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');
        }

		return $this->attribute_offer;
	}
	
	/**
	 * set attribute_offer entity join by id of attribute_value
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
	 * get id_attribute of attribute_value
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_attribute()
	{
		return $this->id_attribute;
	}

	/**
	 * set id_attribute of attribute_value
	 *
	 * @access public
	 * @param  int $id_attribute id_attribute of attribute_value
	 * @return \Venus\src\Helium\Entity\attribute_value
	 */
	public function set_id_attribute($id_attribute) 
	{
		$this->id_attribute = $id_attribute;
		return $this;
	}
	
	/**
	 * get value of attribute_value
	 *
	 * @access public
	 * @return string
	 */
	public function get_value()
	{
		return $this->value;
	}

	/**
	 * set value of attribute_value
	 *
	 * @access public
	 * @param  string $value value of attribute_value
	 * @return \Venus\src\Helium\Entity\attribute_value
	 */
	public function set_value($value) 
	{
		$this->value = $value;
		return $this;
	}
	}