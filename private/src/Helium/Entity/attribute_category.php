<?php
	
/**
 * Entity to attribute_category
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
 * Entity to attribute_category
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
	 * attribute Entity
	 *
	 * @access private
	 * @var    attribute
	 * @join
	 *
	 */
    private $attribute = null;
	
	
	
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
	 * category Entity
	 *
	 * @access private
	 * @var    category
	 * @join
	 *
	 */
    private $category = null;
	
	
	
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
	 * get attribute entity join by id_attribute of attribute_category
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\attribute_category
	 */
	public function get_attribute($aWhere = array())
	{
		if ($this->attribute === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('attribute');
												   
	        $aWhere['id'] = $this->get_id_attribute();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->attribute = $aResult[0]; }
          else { $this->attribute = array(); }
        }

		return $this->attribute;
	}
	
	/**
	 * set attribute entity join by id_attribute of attribute_category
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\attribute  $attribute attribute entity
	 * @join
	 * @return array
	 */
	public function set_attribute(array $attribute)
	{
		$this->attribute = $attribute;
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
	
	/**
	 * get category entity join by id_category of attribute_category
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\attribute_category
	 */
	public function get_category($aWhere = array())
	{
		if ($this->category === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('category');
												   
	        $aWhere['id'] = $this->get_id_category();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->category = $aResult[0]; }
          else { $this->category = array(); }
        }

		return $this->category;
	}
	
	/**
	 * set category entity join by id_category of attribute_category
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\category  $category category entity
	 * @join
	 * @return array
	 */
	public function set_category(array $category)
	{
		$this->category = $category;
		return $this;
	}
}