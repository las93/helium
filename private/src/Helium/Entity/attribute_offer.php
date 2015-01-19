<?php
	
/**
 * Entity to attribute_offer
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
 * Entity to attribute_offer
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
	 * attribute Entity
	 *
	 * @access private
	 * @var    attribute
	 * @join
	 *
	 */
    private $attribute = null;
	
	
	
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
	 * offer Entity
	 *
	 * @access private
	 * @var    offer
	 * @join
	 *
	 */
    private $offer = null;
	
	
	
	/**
	 * id_attribute_value
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_attribute_value = null;
	
	/**
	 * attribute_value Entity
	 *
	 * @access private
	 * @var    attribute_value
	 * @join
	 *
	 */
    private $attribute_value = null;
	
	
	
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
	 * get attribute entity join by id_attribute of attribute_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_attribute($aWhere = array())
	{
		if ($this->attribute === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('attribute');
												   
	        $aWhere['id'] = $this->get_id_attribute();
											
													  
            $this->attribute = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->attribute;
	}
	
	/**
	 * set attribute entity join by id_attribute of attribute_offer
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
	 * get offer entity join by id_offer of attribute_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_offer($aWhere = array())
	{
		if ($this->offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer');
												   
	        $aWhere['id'] = $this->get_id_offer();
											
													  
            $this->offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->offer;
	}
	
	/**
	 * set offer entity join by id_offer of attribute_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer  $offer offer entity
	 * @join
	 * @return array
	 */
	public function set_offer(array $offer)
	{
		$this->offer = $offer;
		return $this;
	}

	/**
	 * get id_attribute_value of attribute_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_attribute_value()
	{
		return $this->id_attribute_value;
	}

	/**
	 * set id_attribute_value of attribute_offer
	 *
	 * @access public
	 * @param  int $id_attribute_value id_attribute_value of attribute_offer
	 * @return \Venus\src\Helium\Entity\attribute_offer
	 */
	public function set_id_attribute_value($id_attribute_value) 
	{
		$this->id_attribute_value = $id_attribute_value;
		return $this;
	}
	
	/**
	 * get attribute_value entity join by id_attribute_value of attribute_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\attribute_offer
	 */
	public function get_attribute_value($aWhere = array())
	{
		if ($this->attribute_value === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('attribute_value');
												   
	        $aWhere['id'] = $this->get_id_attribute_value();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->attribute_value = $aResult[0]; }
          else { $this->attribute_value = array(); }
        }

		return $this->attribute_value;
	}
	
	/**
	 * set attribute_value entity join by id_attribute_value of attribute_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\attribute_value  $attribute_value attribute_value entity
	 * @join
	 * @return \Venus\src\Helium\Entity\attribute_offer
	 */
	public function set_attribute_value(\Venus\src\Helium\Entity\attribute_value $attribute_value)
	{
		$this->attribute_value = $attribute_value;
		return $this;
	}
}