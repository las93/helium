<?php
	
/**
 * Entity to review
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
 * Entity to review
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
class review extends Entity 
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
	 * review_helpful Entity
	 *
	 * @access private
	 * @var    review_helpful
	 * @join
	 *
	 */
    private $review_helpful = null;
	
	
	
	/**
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
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
	 * id_product
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_product = null;
	
	/**
	 * product Entity
	 *
	 * @access private
	 * @var    product
	 * @join
	 *
	 */
    private $product = null;
	
	
	
	/**
	 * title
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $title = null;
	
	/**
	 * comment
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $comment = null;
	
	/**
	 * date_create
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $date_create = null;
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $enable = null;
	
	/**
	 * rate
	 *
	 * @access private
	 * @var    float
	 *
	 */
    private $rate = null;
	
	/**
	 * get id of review
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of review
	 *
	 * @access public
	 * @param  int $id id of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get review_helpful entity join by id of review
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_review_helpful($aWhere = array())
	{
		if ($this->review_helpful === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('review_helpful');
												   
	        $aWhere['id_review'] = $this->get_id();
											
													  
            $this->review_helpful = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');
        }

		return $this->review_helpful;
	}
	
	/**
	 * set review_helpful entity join by id of review
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\review_helpful  $review_helpful review_helpful entity
	 * @join
	 * @return array
	 */
	public function set_review_helpful(array $review_helpful)
	{
		$this->review_helpful = $review_helpful;
		return $this;
	}

	/**
	 * get id_user of review
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of review
	 *
	 * @access public
	 * @param  int $id_user id_user of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get user entity join by id_user of review
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function get_user($aWhere = array())
	{
		if ($this->user === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('user');
												   
	        $aWhere['id'] = $this->get_id_user();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->user = $aResult[0]; }
          else { $this->user = array(); }
        }

		return $this->user;
	}
	
	/**
	 * set user entity join by id_user of review
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\user  $user user entity
	 * @join
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_user(\Venus\src\Helium\Entity\user $user)
	{
		$this->user = $user;
		return $this;
	}

	/**
	 * get id_product of review
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_product()
	{
		return $this->id_product;
	}

	/**
	 * set id_product of review
	 *
	 * @access public
	 * @param  int $id_product id_product of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_id_product($id_product) 
	{
		$this->id_product = $id_product;
		return $this;
	}
	
	/**
	 * get product entity join by id_product of review
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function get_product($aWhere = array())
	{
		if ($this->product === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('product');
												   
	        $aWhere['id'] = $this->get_id_product();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->product = $aResult[0]; }
          else { $this->product = array(); }
        }

		return $this->product;
	}
	
	/**
	 * set product entity join by id_product of review
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product  $product product entity
	 * @join
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_product(\Venus\src\Helium\Entity\product $product)
	{
		$this->product = $product;
		return $this;
	}

	/**
	 * get title of review
	 *
	 * @access public
	 * @return string
	 */
	public function get_title()
	{
		return $this->title;
	}

	/**
	 * set title of review
	 *
	 * @access public
	 * @param  string $title title of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_title($title) 
	{
		$this->title = $title;
		return $this;
	}
	
	/**
	 * get comment of review
	 *
	 * @access public
	 * @return string
	 */
	public function get_comment()
	{
		return $this->comment;
	}

	/**
	 * set comment of review
	 *
	 * @access public
	 * @param  string $comment comment of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_comment($comment) 
	{
		$this->comment = $comment;
		return $this;
	}
	
	/**
	 * get date_create of review
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of review
	 *
	 * @access public
	 * @param  string $date_create date_create of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get enable of review
	 *
	 * @access public
	 * @return int
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of review
	 *
	 * @access public
	 * @param  int $enable enable of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get rate of review
	 *
	 * @access public
	 * @return float
	 */
	public function get_rate()
	{
		return $this->rate;
	}

	/**
	 * set rate of review
	 *
	 * @access public
	 * @param  float $rate rate of review
	 * @return \Venus\src\Helium\Entity\review
	 */
	public function set_rate($rate) 
	{
		$this->rate = $rate;
		return $this;
	}
	}