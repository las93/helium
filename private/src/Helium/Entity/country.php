<?php
	
/**
 * Entity to country
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
 * Entity to country
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
class country extends Entity 
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
	 *
	 */
    private $offer_vat_country = null;
	
	
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $name = null;
	
	
	
	/**
	 * get id of country
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of country
	 *
	 * @access public
	 * @param  int $id id of country
	 * @return \Venus\src\Helium\Entity\country
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get offer_vat_country entity join by id of country
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_offer_vat_country($aWhere = array())
	{
		if ($this->offer_vat_country === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer_vat_country');
												   
	        $aWhere['id_country'] = $this->get_id();
											
													  
            $this->offer_vat_country = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->offer_vat_country;
	}
	
	/**
	 * set offer_vat_country entity join by id of country
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer_vat_country  $offer_vat_country offer_vat_country entity
	 * @return array
	 */
	public function set_offer_vat_country(array $offer_vat_country)
	{
		$this->offer_vat_country = $offer_vat_country;
		return $this;
	}

	/**
	 * get name of country
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of country
	 *
	 * @access public
	 * @param  string $name name of country
	 * @return \Venus\src\Helium\Entity\country
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	}