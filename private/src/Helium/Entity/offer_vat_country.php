<?php
	
/**
 * Entity to offer_vat_country
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
 * Entity to offer_vat_country
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
class offer_vat_country extends Entity 
{
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
	 * id_country
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_country = null;
	
	
	
	/**
	 * country Entity
	 *
	 * @access private
	 * @var    country
	 * @join
	 *
	 */
    private $country = null;
	
	
	
	/**
	 * id_vat
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_vat = null;
	
	
	
	/**
	 * vat Entity
	 *
	 * @access private
	 * @var    vat
	 * @join
	 *
	 */
    private $vat = null;
	
	
	
	/**
	 * get id_offer of offer_vat_country
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of offer_vat_country
	 *
	 * @access public
	 * @param  int $id_offer id_offer of offer_vat_country
	 * @return \Venus\src\Helium\Entity\offer_vat_country
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get offer entity join by id_offer of offer_vat_country
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
	 * set offer entity join by id_offer of offer_vat_country
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
	 * get id_country of offer_vat_country
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_country()
	{
		return $this->id_country;
	}

	/**
	 * set id_country of offer_vat_country
	 *
	 * @access public
	 * @param  int $id_country id_country of offer_vat_country
	 * @return \Venus\src\Helium\Entity\offer_vat_country
	 */
	public function set_id_country($id_country) 
	{
		$this->id_country = $id_country;
		return $this;
	}
	
	/**
	 * get country entity join by id_country of offer_vat_country
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_country($aWhere = array())
	{
		if ($this->country === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('country');
												   
	        $aWhere['id'] = $this->get_id_country();
											
													  
            $this->country = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->country;
	}
	
	/**
	 * set country entity join by id_country of offer_vat_country
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\country  $country country entity
	 * @join
	 * @return array
	 */
	public function set_country(array $country)
	{
		$this->country = $country;
		return $this;
	}

	/**
	 * get id_vat of offer_vat_country
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_vat()
	{
		return $this->id_vat;
	}

	/**
	 * set id_vat of offer_vat_country
	 *
	 * @access public
	 * @param  int $id_vat id_vat of offer_vat_country
	 * @return \Venus\src\Helium\Entity\offer_vat_country
	 */
	public function set_id_vat($id_vat) 
	{
		$this->id_vat = $id_vat;
		return $this;
	}
	
	/**
	 * get vat entity join by id_vat of offer_vat_country
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\offer_vat_country
	 */
	public function get_vat($aWhere = array())
	{
		if ($this->vat === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('vat');
												   
	        $aWhere['id'] = $this->get_id_vat();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->vat = $aResult[0]; }
          else { $this->vat = array(); }
        }

		return $this->vat;
	}
	
	/**
	 * set vat entity join by id_vat of offer_vat_country
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\vat  $vat vat entity
	 * @join
	 * @return \Venus\src\Helium\Entity\offer_vat_country
	 */
	public function set_vat(\Venus\src\Helium\Entity\vat $vat)
	{
		$this->vat = $vat;
		return $this;
	}
}