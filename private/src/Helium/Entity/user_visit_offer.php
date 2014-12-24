<?php
	
/**
 * Entity to user_visit_offer
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
 * Entity to user_visit_offer
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
class user_visit_offer extends Entity 
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
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
		 * @primary_key
	 */
    private $id_user = null;
	
	
	
	/**
	 * user Entity
	 *
	 * @access private
	 * @var    user
	 * @join
	 *
	 */
    private $user = null;
	
	
	
	/**
	 * get id_offer of user_visit_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer()
	{
		return $this->id_offer;
	}

	/**
	 * set id_offer of user_visit_offer
	 *
	 * @access public
	 * @param  int $id_offer id_offer of user_visit_offer
	 * @return \Venus\src\Helium\Entity\user_visit_offer
	 */
	public function set_id_offer($id_offer) 
	{
		$this->id_offer = $id_offer;
		return $this;
	}
	
	/**
	 * get offer entity join by id_offer of user_visit_offer
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
	 * set offer entity join by id_offer of user_visit_offer
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
	 * get id_user of user_visit_offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of user_visit_offer
	 *
	 * @access public
	 * @param  int $id_user id_user of user_visit_offer
	 * @return \Venus\src\Helium\Entity\user_visit_offer
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get user entity join by id_user of user_visit_offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_user($aWhere = array())
	{
		if ($this->user === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('user');
												   
	        $aWhere['id'] = $this->get_id_user();
											
													  
            $this->user = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->user;
	}
	
	/**
	 * set user entity join by id_user of user_visit_offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\user  $user user entity
	 * @join
	 * @return array
	 */
	public function set_user(array $user)
	{
		$this->user = $user;
		return $this;
	}
}