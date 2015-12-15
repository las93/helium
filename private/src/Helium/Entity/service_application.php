<?php
	
/**
 * Entity to service_application
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
 * Entity to service_application
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
class service_application extends Entity 
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
	 * service_association Entity
	 *
	 * @access private
	 * @var    service_association
	 * @join
	 *
	 */
    private $service_association = null;
	
	
	
	/**
	 * id_service
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_service = null;
	
	/**
	 * id_country
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_country = null;
	
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
	 * name
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $name = null;
	
	/**
	 * discount_authorized
	 *
	 * @access private
	 * @var    bool
	 *
	 */
    private $discount_authorized = null;
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    bool
	 *
	 */
    private $enable = null;
	
	/**
	 * url_cgu
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $url_cgu = null;
	
	/**
	 * type_selling
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $type_selling = null;
	
	/**
	 * auto_add
	 *
	 * @access private
	 * @var    bool
	 *
	 */
    private $auto_add = null;
	
	/**
	 * get id of service_application
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of service_application
	 *
	 * @access public
	 * @param  int $id id of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get service_association entity join by id of service_application
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_service_association($aWhere = array())
	{
		if ($this->service_association === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('service_association');
												   
	        $aWhere['id_service_application'] = $this->get_id();
											
													  
            $this->service_association = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');
        }

		return $this->service_association;
	}
	
	/**
	 * set service_association entity join by id of service_application
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\service_association  $service_association service_association entity
	 * @join
	 * @return array
	 */
	public function set_service_association(array $service_association)
	{
		$this->service_association = $service_association;
		return $this;
	}

	/**
	 * get id_service of service_application
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_service()
	{
		return $this->id_service;
	}

	/**
	 * set id_service of service_application
	 *
	 * @access public
	 * @param  int $id_service id_service of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_id_service($id_service) 
	{
		$this->id_service = $id_service;
		return $this;
	}
	
	/**
	 * get id_country of service_application
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_country()
	{
		return $this->id_country;
	}

	/**
	 * set id_country of service_application
	 *
	 * @access public
	 * @param  int $id_country id_country of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_id_country($id_country) 
	{
		$this->id_country = $id_country;
		return $this;
	}
	
	/**
	 * get id_vat of service_application
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_vat()
	{
		return $this->id_vat;
	}

	/**
	 * set id_vat of service_application
	 *
	 * @access public
	 * @param  int $id_vat id_vat of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_id_vat($id_vat) 
	{
		$this->id_vat = $id_vat;
		return $this;
	}
	
	/**
	 * get vat entity join by id_vat of service_application
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function get_vat($aWhere = array())
	{
		if ($this->vat === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('vat');
												   
	        $aWhere['id'] = $this->get_id_vat();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->vat = $aResult[0]; }
          else { $this->vat = array(); }
        }

		return $this->vat;
	}
	
	/**
	 * set vat entity join by id_vat of service_application
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\vat  $vat vat entity
	 * @join
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_vat(\Venus\src\Helium\Entity\vat $vat)
	{
		$this->vat = $vat;
		return $this;
	}

	/**
	 * get name of service_application
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of service_application
	 *
	 * @access public
	 * @param  string $name name of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get discount_authorized of service_application
	 *
	 * @access public
	 * @return bool
	 */
	public function get_discount_authorized()
	{
		return $this->discount_authorized;
	}

	/**
	 * set discount_authorized of service_application
	 *
	 * @access public
	 * @param  bool $discount_authorized discount_authorized of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_discount_authorized($discount_authorized) 
	{
		$this->discount_authorized = $discount_authorized;
		return $this;
	}
	
	/**
	 * get enable of service_application
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of service_application
	 *
	 * @access public
	 * @param  bool $enable enable of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get url_cgu of service_application
	 *
	 * @access public
	 * @return string
	 */
	public function get_url_cgu()
	{
		return $this->url_cgu;
	}

	/**
	 * set url_cgu of service_application
	 *
	 * @access public
	 * @param  string $url_cgu url_cgu of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_url_cgu($url_cgu) 
	{
		$this->url_cgu = $url_cgu;
		return $this;
	}
	
	/**
	 * get type_selling of service_application
	 *
	 * @access public
	 * @return string
	 */
	public function get_type_selling()
	{
		return $this->type_selling;
	}

	/**
	 * set type_selling of service_application
	 *
	 * @access public
	 * @param  string $type_selling type_selling of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_type_selling($type_selling) 
	{
		$this->type_selling = $type_selling;
		return $this;
	}
	
	/**
	 * get auto_add of service_application
	 *
	 * @access public
	 * @return bool
	 */
	public function get_auto_add()
	{
		return $this->auto_add;
	}

	/**
	 * set auto_add of service_application
	 *
	 * @access public
	 * @param  bool $auto_add auto_add of service_application
	 * @return \Venus\src\Helium\Entity\service_application
	 */
	public function set_auto_add($auto_add) 
	{
		$this->auto_add = $auto_add;
		return $this;
	}
	}