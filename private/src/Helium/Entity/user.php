<?php
	
/**
 * Entity to user
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
 * Entity to user
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
class user extends Entity 
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
	 * review Entity
	 *
	 * @access private
	 * @var    review
	 * @join
	 *
	 */
    private $review = null;
	
	
	
	/**
	 * user_visit_offer Entity
	 *
	 * @access private
	 * @var    user_visit_offer
	 * @join
	 *
	 */
    private $user_visit_offer = null;
	
	
	
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
	 * firstname
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $firstname = null;
	
	
	
	/**
	 * email
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $email = null;
	
	
	
	/**
	 * password
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $password = null;
	
	
	
	/**
	 * get id of user
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of user
	 *
	 * @access public
	 * @param  int $id id of user
	 * @return \Venus\src\Helium\Entity\user
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get review entity join by id of user
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_review($aWhere = array())
	{
		if ($this->review === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('review');
												   
	        $aWhere['id_user'] = $this->get_id();
											
													  
            $this->review = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->review;
	}
	
	/**
	 * set review entity join by id of user
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\review  $review review entity
	 * @join
	 * @return array
	 */
	public function set_review(array $review)
	{
		$this->review = $review;
		return $this;
	}

	/**
	 * get user_visit_offer entity join by id of user
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_user_visit_offer($aWhere = array())
	{
		if ($this->user_visit_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('user_visit_offer');
												   
	        $aWhere['id_user'] = $this->get_id();
											
													  
            $this->user_visit_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->user_visit_offer;
	}
	
	/**
	 * set user_visit_offer entity join by id of user
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\user_visit_offer  $user_visit_offer user_visit_offer entity
	 * @join
	 * @return array
	 */
	public function set_user_visit_offer(array $user_visit_offer)
	{
		$this->user_visit_offer = $user_visit_offer;
		return $this;
	}

	/**
	 * get vat entity join by id of user
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_vat($aWhere = array())
	{
		if ($this->vat === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('vat');
												   
	        $aWhere['id'] = $this->get_id();
											
													  
            $this->vat = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->vat;
	}
	
	/**
	 * set vat entity join by id of user
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\vat  $vat vat entity
	 * @join
	 * @return array
	 */
	public function set_vat(array $vat)
	{
		$this->vat = $vat;
		return $this;
	}

	/**
	 * get name of user
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of user
	 *
	 * @access public
	 * @param  string $name name of user
	 * @return \Venus\src\Helium\Entity\user
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get firstname of user
	 *
	 * @access public
	 * @return string
	 */
	public function get_firstname()
	{
		return $this->firstname;
	}

	/**
	 * set firstname of user
	 *
	 * @access public
	 * @param  string $firstname firstname of user
	 * @return \Venus\src\Helium\Entity\user
	 */
	public function set_firstname($firstname) 
	{
		$this->firstname = $firstname;
		return $this;
	}
	
	/**
	 * get email of user
	 *
	 * @access public
	 * @return string
	 */
	public function get_email()
	{
		return $this->email;
	}

	/**
	 * set email of user
	 *
	 * @access public
	 * @param  string $email email of user
	 * @return \Venus\src\Helium\Entity\user
	 */
	public function set_email($email) 
	{
		$this->email = $email;
		return $this;
	}
	
	/**
	 * get password of user
	 *
	 * @access public
	 * @return string
	 */
	public function get_password()
	{
		return $this->password;
	}

	/**
	 * set password of user
	 *
	 * @access public
	 * @param  string $password password of user
	 * @return \Venus\src\Helium\Entity\user
	 */
	public function set_password($password) 
	{
		$this->password = $password;
		return $this;
	}
	}