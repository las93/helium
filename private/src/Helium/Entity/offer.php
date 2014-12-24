<?php
	
/**
 * Entity to offer
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
 * Entity to offer
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
class offer extends Entity 
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
	 * attribute_offer Entity
	 *
	 * @access private
	 * @var    attribute_offer
	 * @join
	 *
	 */
    private $attribute_offer = null;
	
	
	
	/**
	 * offer_vat_country Entity
	 *
	 * @access private
	 * @var    offer_vat_country
	 * @join
	 *
	 */
    private $offer_vat_country = null;
	
	
	
	/**
	 * refund_offer_by_offer Entity
	 *
	 * @access private
	 * @var    refund_offer_by_offer
	 * @join
	 *
	 */
    private $refund_offer_by_offer = null;
	
	
	
	/**
	 * sponsored_offer Entity
	 *
	 * @access private
	 * @var    sponsored_offer
	 * @join
	 *
	 */
    private $sponsored_offer = null;
	
	
	
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
	 * id_merchant
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_merchant = null;
	
	
	
	/**
	 * merchant Entity
	 *
	 * @access private
	 * @var    merchant
	 * @join
	 *
	 */
    private $merchant = null;
	
	
	
	/**
	 * id_offer_status
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_offer_status = null;
	
	
	
	/**
	 * offer_status Entity
	 *
	 * @access private
	 * @var    offer_status
	 * @join
	 *
	 */
    private $offer_status = null;
	
	
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    bool
	 *
		 */
    private $enable = null;
	
	
	
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
	 * quantity_public
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $quantity_public = null;
	
	
	
	/**
	 * quantity_reserved
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $quantity_reserved = null;
	
	
	
	/**
	 * quantity_confirmed
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $quantity_confirmed = null;
	
	
	
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
	 * price
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $price = null;
	
	
	
	/**
	 * gift_possible
	 *
	 * @access private
	 * @var    bool
	 *
		 */
    private $gift_possible = null;
	
	
	
	/**
	 * get id of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of offer
	 *
	 * @access public
	 * @param  int $id id of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get attribute_offer entity join by id of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_attribute_offer($aWhere = array())
	{
		if ($this->attribute_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('attribute_offer');
												   
	        $aWhere['id_offer'] = $this->get_id();
											
													  
            $this->attribute_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->attribute_offer;
	}
	
	/**
	 * set attribute_offer entity join by id of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\attribute_offer  $attribute_offer attribute_offer entity
	 * @join
	 * @return array
	 */
	public function set_attribute_offer(array $attribute_offer)
	{
		$this->attribute_offer = $attribute_offer;
		return $this;
	}

	/**
	 * get offer_vat_country entity join by id of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_offer_vat_country($aWhere = array())
	{
		if ($this->offer_vat_country === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer_vat_country');
												   
	        $aWhere['id_offer'] = $this->get_id();
											
													  
            $this->offer_vat_country = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->offer_vat_country;
	}
	
	/**
	 * set offer_vat_country entity join by id of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer_vat_country  $offer_vat_country offer_vat_country entity
	 * @join
	 * @return array
	 */
	public function set_offer_vat_country(array $offer_vat_country)
	{
		$this->offer_vat_country = $offer_vat_country;
		return $this;
	}

	/**
	 * get refund_offer_by_offer entity join by id of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_refund_offer_by_offer($aWhere = array())
	{
		if ($this->refund_offer_by_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('refund_offer_by_offer');
												   
	        $aWhere['id_offer'] = $this->get_id();
											
													  
            $this->refund_offer_by_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->refund_offer_by_offer;
	}
	
	/**
	 * set refund_offer_by_offer entity join by id of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\refund_offer_by_offer  $refund_offer_by_offer refund_offer_by_offer entity
	 * @join
	 * @return array
	 */
	public function set_refund_offer_by_offer(array $refund_offer_by_offer)
	{
		$this->refund_offer_by_offer = $refund_offer_by_offer;
		return $this;
	}

	/**
	 * get sponsored_offer entity join by id of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_sponsored_offer($aWhere = array())
	{
		if ($this->sponsored_offer === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('sponsored_offer');
												   
	        $aWhere['id_offer'] = $this->get_id();
											
													  
            $this->sponsored_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->sponsored_offer;
	}
	
	/**
	 * set sponsored_offer entity join by id of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\sponsored_offer  $sponsored_offer sponsored_offer entity
	 * @join
	 * @return array
	 */
	public function set_sponsored_offer(array $sponsored_offer)
	{
		$this->sponsored_offer = $sponsored_offer;
		return $this;
	}

	/**
	 * get user_visit_offer entity join by id of offer
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
												   
	        $aWhere['id_offer'] = $this->get_id();
											
													  
            $this->user_visit_offer = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
        }

		return $this->user_visit_offer;
	}
	
	/**
	 * set user_visit_offer entity join by id of offer
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
	 * get id_product of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_product()
	{
		return $this->id_product;
	}

	/**
	 * set id_product of offer
	 *
	 * @access public
	 * @param  int $id_product id_product of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_id_product($id_product) 
	{
		$this->id_product = $id_product;
		return $this;
	}
	
	/**
	 * get product entity join by id_product of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function get_product($aWhere = array())
	{
		if ($this->product === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('product');
												   
	        $aWhere['id'] = $this->get_id_product();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->product = $aResult[0]; }
          else { $this->product = array(); }
        }

		return $this->product;
	}
	
	/**
	 * set product entity join by id_product of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product  $product product entity
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_product(\Venus\src\Helium\Entity\product $product)
	{
		$this->product = $product;
		return $this;
	}

	/**
	 * get id_merchant of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_merchant()
	{
		return $this->id_merchant;
	}

	/**
	 * set id_merchant of offer
	 *
	 * @access public
	 * @param  int $id_merchant id_merchant of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_id_merchant($id_merchant) 
	{
		$this->id_merchant = $id_merchant;
		return $this;
	}
	
	/**
	 * get merchant entity join by id_merchant of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function get_merchant($aWhere = array())
	{
		if ($this->merchant === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('merchant');
												   
	        $aWhere['id'] = $this->get_id_merchant();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->merchant = $aResult[0]; }
          else { $this->merchant = array(); }
        }

		return $this->merchant;
	}
	
	/**
	 * set merchant entity join by id_merchant of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\merchant  $merchant merchant entity
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_merchant(\Venus\src\Helium\Entity\merchant $merchant)
	{
		$this->merchant = $merchant;
		return $this;
	}

	/**
	 * get id_offer_status of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_offer_status()
	{
		return $this->id_offer_status;
	}

	/**
	 * set id_offer_status of offer
	 *
	 * @access public
	 * @param  int $id_offer_status id_offer_status of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_id_offer_status($id_offer_status) 
	{
		$this->id_offer_status = $id_offer_status;
		return $this;
	}
	
	/**
	 * get offer_status entity join by id_offer_status of offer
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function get_offer_status($aWhere = array())
	{
		if ($this->offer_status === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('offer_status');
												   
	        $aWhere['id'] = $this->get_id_offer_status();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->offer_status = $aResult[0]; }
          else { $this->offer_status = array(); }
        }

		return $this->offer_status;
	}
	
	/**
	 * set offer_status entity join by id_offer_status of offer
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\offer_status  $offer_status offer_status entity
	 * @join
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_offer_status(\Venus\src\Helium\Entity\offer_status $offer_status)
	{
		$this->offer_status = $offer_status;
		return $this;
	}

	/**
	 * get enable of offer
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of offer
	 *
	 * @access public
	 * @param  bool $enable enable of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get date_create of offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of offer
	 *
	 * @access public
	 * @param  string $date_create date_create of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get date_update of offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_update()
	{
		return $this->date_update;
	}

	/**
	 * set date_update of offer
	 *
	 * @access public
	 * @param  string $date_update date_update of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_date_update($date_update) 
	{
		$this->date_update = $date_update;
		return $this;
	}
	
	/**
	 * get quantity_public of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_quantity_public()
	{
		return $this->quantity_public;
	}

	/**
	 * set quantity_public of offer
	 *
	 * @access public
	 * @param  int $quantity_public quantity_public of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_quantity_public($quantity_public) 
	{
		$this->quantity_public = $quantity_public;
		return $this;
	}
	
	/**
	 * get quantity_reserved of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_quantity_reserved()
	{
		return $this->quantity_reserved;
	}

	/**
	 * set quantity_reserved of offer
	 *
	 * @access public
	 * @param  int $quantity_reserved quantity_reserved of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_quantity_reserved($quantity_reserved) 
	{
		$this->quantity_reserved = $quantity_reserved;
		return $this;
	}
	
	/**
	 * get quantity_confirmed of offer
	 *
	 * @access public
	 * @return int
	 */
	public function get_quantity_confirmed()
	{
		return $this->quantity_confirmed;
	}

	/**
	 * set quantity_confirmed of offer
	 *
	 * @access public
	 * @param  int $quantity_confirmed quantity_confirmed of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_quantity_confirmed($quantity_confirmed) 
	{
		$this->quantity_confirmed = $quantity_confirmed;
		return $this;
	}
	
	/**
	 * get name of offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of offer
	 *
	 * @access public
	 * @param  string $name name of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get short_description of offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_short_description()
	{
		return $this->short_description;
	}

	/**
	 * set short_description of offer
	 *
	 * @access public
	 * @param  string $short_description short_description of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_short_description($short_description) 
	{
		$this->short_description = $short_description;
		return $this;
	}
	
	/**
	 * get description of offer
	 *
	 * @access public
	 * @return string
	 */
	public function get_description()
	{
		return $this->description;
	}

	/**
	 * set description of offer
	 *
	 * @access public
	 * @param  string $description description of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_description($description) 
	{
		$this->description = $description;
		return $this;
	}
	
	/**
	 * get price of offer
	 *
	 * @access public
	 * @return float
	 */
	public function get_price()
	{
		return $this->price;
	}

	/**
	 * set price of offer
	 *
	 * @access public
	 * @param  float $price price of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_price($price) 
	{
		$this->price = $price;
		return $this;
	}
	
	/**
	 * get gift_possible of offer
	 *
	 * @access public
	 * @return bool
	 */
	public function get_gift_possible()
	{
		return $this->gift_possible;
	}

	/**
	 * set gift_possible of offer
	 *
	 * @access public
	 * @param  bool $gift_possible gift_possible of offer
	 * @return \Venus\src\Helium\Entity\offer
	 */
	public function set_gift_possible($gift_possible) 
	{
		$this->gift_possible = $gift_possible;
		return $this;
	}
	}