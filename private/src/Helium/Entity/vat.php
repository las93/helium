<?php
	
/**
 * Entity to vat
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
 * Entity to vat
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
class vat extends Entity 
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
	 * offer_vat_country Entity
	 *
	 * @access private
	 * @var    offer_vat_country
	 * @join
	 *
	 */
    private $offer_vat_country = null;
	
	
	
	/**
	 * service_application Entity
	 *
	 * @access private
	 * @var    service_application
	 * @join
	 *
	 */
    private $service_application = null;
	
	
	
	/**
	 * id_country
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_country = null;
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $name = null;
	
	/**
	 * vat_percent
	 *
	 * @access private
	 * @var    float
	 *
	 */
    private $vat_percent = null;
	
	/**
	 * get id of vat
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of vat
	 *
	 * @access public
	 * @param  int $id id of vat
	 * @return \Venus\src\Helium\Entity\vat
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get offer_vat_country entity join by id of vat
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_offer_vat_country($aWhere = array())
	{
		if ($this->offer_vat_country === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer_vat_country');
												   
	        $aWhere['id_vat'] = $this->get_id();
											
													  
            $this->offer_vat_country = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->offer_vat_country;
	}
	
	/**
	 * set offer_vat_country entity join by id of vat
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer_vat_country  $offer_vat_country offer_vat_country entity
	 * @join
	 * @return array
	 */
	public function set_offer_vat_country(array $offer_vat_country)
	{
		$this->offer_vat_country = $offer_vat_country;
		return $this;
	}

	/**
	 * get service_application entity join by id of vat
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_service_application($aWhere = array())
	{
		if ($this->service_application === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('service_application');
												   
	        $aWhere['id_vat'] = $this->get_id();
											
													  
            $this->service_application = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->service_application;
	}
	
	/**
	 * set service_application entity join by id of vat
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\service_application  $service_application service_application entity
	 * @join
	 * @return array
	 */
	public function set_service_application(array $service_application)
	{
		$this->service_application = $service_application;
		return $this;
	}

	/**
	 * get id_country of vat
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_country()
	{
		return $this->id_country;
	}

	/**
	 * set id_country of vat
	 *
	 * @access public
	 * @param  int $id_country id_country of vat
	 * @return \Venus\src\Helium\Entity\vat
	 */
	public function set_id_country($id_country) 
	{
		$this->id_country = $id_country;
		return $this;
	}
	
	/**
	 * get name of vat
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of vat
	 *
	 * @access public
	 * @param  string $name name of vat
	 * @return \Venus\src\Helium\Entity\vat
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get vat_percent of vat
	 *
	 * @access public
	 * @return float
	 */
	public function get_vat_percent()
	{
		return $this->vat_percent;
	}

	/**
	 * set vat_percent of vat
	 *
	 * @access public
	 * @param  float $vat_percent vat_percent of vat
	 * @return \Venus\src\Helium\Entity\vat
	 */
	public function set_vat_percent($vat_percent) 
	{
		$this->vat_percent = $vat_percent;
		return $this;
	}
	}