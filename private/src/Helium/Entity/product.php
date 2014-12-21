<?php
	
/**
 * Entity to product
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
 * Entity to product
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
class product extends Entity 
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
	 * product_image Entity
	 *
	 * @access private
	 * @var    product_image
	 *
	 */
    private $product_image = null;
	
	
	
	/**
	 * offer Entity
	 *
	 * @access private
	 * @var    offer
	 *
	 */
    private $offer = null;
	
	
	
	/**
	 * question Entity
	 *
	 * @access private
	 * @var    question
	 *
	 */
    private $question = null;
	
	
	
	/**
	 * review Entity
	 *
	 * @access private
	 * @var    review
	 *
	 */
    private $review = null;
	
	
	
	/**
	 * id_brand
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_brand = null;
	
	
	
	/**
	 * id_main_category
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_main_category = null;
	
	
	
	/**
	 * category Entity
	 *
	 * @access private
	 * @var    category
	 *
	 */
    private $category = null;
	
	
	
	/**
	 * date_create
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $date_create = null;
	
	
	
	/**
	 * date_update
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $date_update = null;
	
	
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $name = null;
	
	
	
	/**
	 * short_description
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $short_description = null;
	
	
	
	/**
	 * description
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $description = null;
	
	
	
	/**
	 * ean13
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $ean13 = null;
	
	
	
	/**
	 * market_price
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $market_price = null;
	
	
	
	/**
	 * reference
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $reference = null;
	
	
	
	/**
	 * get id of product
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of product
	 *
	 * @access public
	 * @param  int $id id of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get product_image entity join by id of product
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_product_image($aWhere = array())
	{
		if ($this->product_image === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('product_image');
												   
	        $aWhere['id_product'] = $this->get_id();
											
													  
            $this->product_image = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->product_image;
	}
	
	/**
	 * set product_image entity join by id of product
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product_image  $product_image product_image entity
	 * @return array
	 */
	public function set_product_image(array $product_image)
	{
		$this->product_image = $product_image;
		return $this;
	}

	/**
	 * get offer entity join by id of product
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_offer($aWhere = array())
	{
		if ($this->offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer');
												   
	        $aWhere['id'] = $this->get_id();
											
													  
            $this->offer = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->offer;
	}
	
	/**
	 * set offer entity join by id of product
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer  $offer offer entity
	 * @return array
	 */
	public function set_offer(array $offer)
	{
		$this->offer = $offer;
		return $this;
	}

	/**
	 * get question entity join by id of product
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_question($aWhere = array())
	{
		if ($this->question === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('question');
												   
	        $aWhere['id_product'] = $this->get_id();
											
													  
            $this->question = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->question;
	}
	
	/**
	 * set question entity join by id of product
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\question  $question question entity
	 * @return array
	 */
	public function set_question(array $question)
	{
		$this->question = $question;
		return $this;
	}

	/**
	 * get review entity join by id of product
	 *
	 * @access public
	   @param  array $aWhere
	 * @return array
	 */
	public function get_review($aWhere = array())
	{
		if ($this->review === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('review');
												   
	        $aWhere['id_product'] = $this->get_id();
											
													  
            $this->review = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
        }

		return $this->review;
	}
	
	/**
	 * set review entity join by id of product
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\review  $review review entity
	 * @return array
	 */
	public function set_review(array $review)
	{
		$this->review = $review;
		return $this;
	}

	/**
	 * get id_brand of product
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_brand()
	{
		return $this->id_brand;
	}

	/**
	 * set id_brand of product
	 *
	 * @access public
	 * @param  int $id_brand id_brand of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_id_brand($id_brand) 
	{
		$this->id_brand = $id_brand;
		return $this;
	}
	
	/**
	 * get id_main_category of product
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_main_category()
	{
		return $this->id_main_category;
	}

	/**
	 * set id_main_category of product
	 *
	 * @access public
	 * @param  int $id_main_category id_main_category of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_id_main_category($id_main_category) 
	{
		$this->id_main_category = $id_main_category;
		return $this;
	}
	
	/**
	 * get category entity join by id_main_category of product
	 *
	 * @access public
	   @param  array $aWhere
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function get_category($aWhere = array())
	{
		if ($this->category === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('category');
												   
	        $aWhere['id'] = $this->get_id_main_category();
											
													  
            $aResult = $oOrm->where($aWhere)
                                   ->limit(1)
						           ->load();
          if (count($aResult) > 0) { $this->category = $aResult[0]; }
          else { $this->category = array(); }
        }

		return $this->category;
	}
	
	/**
	 * set category entity join by id_main_category of product
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\category  $category category entity
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_category(\Venus\src\Helium\Entity\category $category)
	{
		$this->category = $category;
		return $this;
	}

	/**
	 * get date_create of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of product
	 *
	 * @access public
	 * @param  string $date_create date_create of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of product
	 *
	 * @access public
	 * @param  string $date_update date_update of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get name of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of product
	 *
	 * @access public
	 * @param  string $name name of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get short_description of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_short_description()
	{
		return $this->short_description;
	}

	/**
	 * set short_description of product
	 *
	 * @access public
	 * @param  string $short_description short_description of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_short_description($short_description) 
	{
		$this->short_description = $short_description;
		return $this;
	}
	
	/**
	 * get description of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * set description of product
	 *
	 * @access public
	 * @param  string $description description of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_description($description) 
	{
		$this->description = $description;
		return $this;
	}
	
	/**
	 * get ean13 of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_ean13()
	{
		return $this->ean13;
	}

	/**
	 * set ean13 of product
	 *
	 * @access public
	 * @param  string $ean13 ean13 of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_ean13($ean13) 
	{
		$this->ean13 = $ean13;
		return $this;
	}
	
	/**
	 * get market_price of product
	 *
	 * @access public
	 * @return float
	 */
	public function get_market_price()
	{
		return $this->market_price;
	}

	/**
	 * set market_price of product
	 *
	 * @access public
	 * @param  float $market_price market_price of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_market_price($market_price) 
	{
		$this->market_price = $market_price;
		return $this;
	}
	
	/**
	 * get reference of product
	 *
	 * @access public
	 * @return string
	 */
	public function get_reference()
	{
		return $this->reference;
	}

	/**
	 * set reference of product
	 *
	 * @access public
	 * @param  string $reference reference of product
	 * @return \Venus\src\Helium\Entity\product
	 */
	public function set_reference($reference) 
	{
		$this->reference = $reference;
		return $this;
	}
	}