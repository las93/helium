<?php
	
/**
 * Entity to refund_offer
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
 * Entity to refund_offer
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
class refund_offer extends Entity 
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
	 * refund_offer_by_offer Entity
	 *
	 * @access private
	 * @var    refund_offer_by_offer
	 *
	 */
    private $refund_offer_by_offer = null;
	
	
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $name = null;
	
	
	
	/**
	 * amount
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $amount = null;
	
	
	
	/**
	 * url
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $url = null;
	
	
	
	/**
	 * get id of refund_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of refund_offer
	 *
	 * @access public
	 * @param  int $id id of refund_offer
	 * @return \Venus\src\Helium\Entity\refund_offer
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get refund_offer_by_offer entity join by id of refund_offer
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_refund_offer_by_offer($aWhere = array())
	{
		if ($this->refund_offer_by_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('refund_offer_by_offer');
												   
	        $aWhere['id_refund_offer'] = $this->get_id();
											
													  
            $this->refund_offer_by_offer = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->refund_offer_by_offer;
	}
	
	/**
	 * set refund_offer_by_offer entity join by id of refund_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\refund_offer_by_offer  $refund_offer_by_offer refund_offer_by_offer entity
	 * @return array
	 */
	public function set_refund_offer_by_offer(array $refund_offer_by_offer)
	{
		$this->refund_offer_by_offer = $refund_offer_by_offer;
		return $this;
	}

	/**
	 * get name of refund_offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of refund_offer
	 *
	 * @access public
	 * @param  string $name name of refund_offer
	 * @return \Venus\src\Helium\Entity\refund_offer
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get amount of refund_offer
	 *
	 * @access public
	 * @return float
	 */
	public function get_amount()
	{
		return $this->amount;
	}

	/**
	 * set amount of refund_offer
	 *
	 * @access public
	 * @param  float $amount amount of refund_offer
	 * @return \Venus\src\Helium\Entity\refund_offer
	 */
	public function set_amount($amount) 
	{
		$this->amount = $amount;
		return $this;
	}
	
	/**
	 * get url of refund_offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_url()
	{
		return $this->url;
	}

	/**
	 * set url of refund_offer
	 *
	 * @access public
	 * @param  string $url url of refund_offer
	 * @return \Venus\src\Helium\Entity\refund_offer
	 */
	public function set_url($url) 
	{
		$this->url = $url;
		return $this;
	}
	}