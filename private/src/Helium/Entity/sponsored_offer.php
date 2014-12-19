<?php
	
/**
 * Entity to sponsored_offer
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
 * Entity to sponsored_offer
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
class sponsored_offer extends Entity 
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
	 * id_offer
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_offer = null;
	
	
	
	/**
	 * offer Entity
	 *
	 * @access private
	 * @var    offer
	 *
	 */
    private $offer = null;
	
	
	
	/**
	 * id_category
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_category = null;
	
	
	
	/**
	 * category Entity
	 *
	 * @access private
	 * @var    category
	 *
	 */
    private $category = null;
	
	
	
	/**
	 * get id of sponsored_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of sponsored_offer
	 *
	 * @access public
	 * @param  int $id id of sponsored_offer
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_offer of sponsored_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of sponsored_offer
	 *
	 * @access public
	 * @param  int $id_offer id_offer of sponsored_offer
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get offer entity join by id_offer of sponsored_offer
	 *
	 * @access public
	   @param  array $aWhere
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function get_offer($aWhere = array())
	{
		if ($this->offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer');
												   
	        $aWhere['id'] = $this->get_id_offer();
											
													  
            $aResult = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
          if (count($aResult) > 0) { $this->offer = $aResult[0]; }
          else { $this->offer = array(); }
        }

		return $this->offer;
	}
	
	/**
	 * set offer entity join by id_offer of sponsored_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer  $offer offer entity
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function set_offer(\Venus\src\Helium\Entity\offer $offer)
	{
		$this->offer = $offer;
		return $this;
	}

	/**
	 * get id_category of sponsored_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_category()
	{
		return $this->id_category;
	}

	/**
	 * set id_category of sponsored_offer
	 *
	 * @access public
	 * @param  int $id_category id_category of sponsored_offer
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function set_id_category($id_category) 
	{
		$this->id_category = $id_category;
		return $this;
	}
	
	/**
	 * get category entity join by id_category of sponsored_offer
	 *
	 * @access public
	   @param  array $aWhere
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function get_category($aWhere = array())
	{
		if ($this->category === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('category');
												   
	        $aWhere['id'] = $this->get_id_category();
											
													  
            $aResult = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
          if (count($aResult) > 0) { $this->category = $aResult[0]; }
          else { $this->category = array(); }
        }

		return $this->category;
	}
	
	/**
	 * set category entity join by id_category of sponsored_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\category  $category category entity
	 * @return \Venus\src\Helium\Entity\sponsored_offer
	 */
	public function set_category(\Venus\src\Helium\Entity\category $category)
	{
		$this->category = $category;
		return $this;
	}
}