<?php
	
/**
 * Entity to review
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
 * Entity to review
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
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_user = null;
	
	
	
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
	   @param  array $aWhere
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
                                   ->limit(1)
						           ->load();
          $this->product = $aResult[0];
        }

		return $this->product;
	}
	
	/**
	 * set product entity join by id_product of review
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product  $product product entity
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