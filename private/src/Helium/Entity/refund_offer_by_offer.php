<?php
	
/**
 * Entity to refund_offer_by_offer
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
 * Entity to refund_offer_by_offer
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
class refund_offer_by_offer extends Entity 
{
	/**
	 * id_refund_offer
	 *
	 * @access private
	 * @var    int
	 *
	 * @primary_key
	 */
    private $id_refund_offer = null;
	
	/**
	 * refund_offer Entity
	 *
	 * @access private
	 * @var    refund_offer
	 * @join
	 *
	 */
    private $refund_offer = null;
	
	
	
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
	 * get id_refund_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_refund_offer()
	{
		return $this->id_refund_offer;
	}

	/**
	 * set id_refund_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @param  int $id_refund_offer id_refund_offer of refund_offer_by_offer
	 * @return \Venus\src\Helium\Entity\refund_offer_by_offer
	 */
	public function set_id_refund_offer($id_refund_offer) 
	{
		$this->id_refund_offer = $id_refund_offer;
		return $this;
	}
	
	/**
	 * get refund_offer entity join by id_refund_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\refund_offer_by_offer
	 */
	public function get_refund_offer($aWhere = array())
	{
		if ($this->refund_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('refund_offer');
												   
	        $aWhere['id'] = $this->get_id_refund_offer();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->refund_offer = $aResult[0]; }
          else { $this->refund_offer = array(); }
        }

		return $this->refund_offer;
	}
	
	/**
	 * set refund_offer entity join by id_refund_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\refund_offer  $refund_offer refund_offer entity
	 * @join
	 * @return array
	 */
	public function set_refund_offer(array $refund_offer)
	{
		$this->refund_offer = $refund_offer;
		return $this;
	}

	/**
	 * get id_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @param  int $id_offer id_offer of refund_offer_by_offer
	 * @return \Venus\src\Helium\Entity\refund_offer_by_offer
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get offer entity join by id_offer of refund_offer_by_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\refund_offer_by_offer
	 */
	public function get_offer($aWhere = array())
	{
		if ($this->offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer');
												   
	        $aWhere['id'] = $this->get_id_offer();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->offer = $aResult[0]; }
          else { $this->offer = array(); }
        }

		return $this->offer;
	}
	
	/**
	 * set offer entity join by id_offer of refund_offer_by_offer
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
}