<?php
	
/**
 * Entity to vat_offer
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
 * Entity to vat_offer
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
class vat_offer extends Entity 
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
	 * id_country
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_country = null;
	
	
	
	/**
	 * id_vat
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_vat = null;
	
	
	
	/**
	 * get id_offer of vat_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of vat_offer
	 *
	 * @access public
	 * @param  int $id_offer id_offer of vat_offer
	 * @return \Venus\src\Helium\Entity\vat_offer
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get id_country of vat_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_country()
	{
		return $this->id_country;
	}

	/**
	 * set id_country of vat_offer
	 *
	 * @access public
	 * @param  int $id_country id_country of vat_offer
	 * @return \Venus\src\Helium\Entity\vat_offer
	 */
	public function set_id_country($id_country) 
	{
		$this->id_country = $id_country;
		return $this;
	}
	
	/**
	 * get id_vat of vat_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_vat()
	{
		return $this->id_vat;
	}

	/**
	 * set id_vat of vat_offer
	 *
	 * @access public
	 * @param  int $id_vat id_vat of vat_offer
	 * @return \Venus\src\Helium\Entity\vat_offer
	 */
	public function set_id_vat($id_vat) 
	{
		$this->id_vat = $id_vat;
		return $this;
	}
	}