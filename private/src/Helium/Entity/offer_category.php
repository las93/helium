<?php
	
/**
 * Entity to offer_category
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
 * Entity to offer_category
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
class offer_category extends Entity 
{
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
	 * id_offer
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $id_offer = null;
	
	/**
	 * get id_category of offer_category
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_category()
	{
		return $this->id_category;
	}

	/**
	 * set id_category of offer_category
	 *
	 * @access public
	 * @param  int $id_category id_category of offer_category
	 * @return \Venus\src\Helium\Entity\offer_category
	 */
	public function set_id_category($id_category) 
	{
		$this->id_category = $id_category;
		return $this;
	}
	
	/**
	 * get id_offer of offer_category
	 *
	 * @access public
	 * @return string
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of offer_category
	 *
	 * @access public
	 * @param  string $id_offer id_offer of offer_category
	 * @return \Venus\src\Helium\Entity\offer_category
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	}