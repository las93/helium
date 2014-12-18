<?php
	
/**
 * Entity to merchant
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
 * Entity to merchant
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
class merchant extends Entity 
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
	 * name
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $name = null;
	
	
	
	/**
	 * legal_form
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $legal_form = null;
	
	
	
	/**
	 * store_capital_account
	 *
	 * @access private
	 * @var    float
	 *
		 */
    private $store_capital_account = null;
	
	
	
	/**
	 * store_rcs_certificate
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_rcs_certificate = null;
	
	
	
	/**
	 * store_vat_certificate
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_vat_certificate = null;
	
	
	
	/**
	 * store_cnil_certificate
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_cnil_certificate = null;
	
	
	
	/**
	 * store_url
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_url = null;
	
	
	
	/**
	 * contact_civ
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_civ = null;
	
	
	
	/**
	 * contact_firstname
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_firstname = null;
	
	
	
	/**
	 * contact_lastname
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_lastname = null;
	
	
	
	/**
	 * contact_function
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_function = null;
	
	
	
	/**
	 * contact_address
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_address = null;
	
	
	
	/**
	 * contact_address2
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_address2 = null;
	
	
	
	/**
	 * contact_zip
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_zip = null;
	
	
	
	/**
	 * contact_city
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_city = null;
	
	
	
	/**
	 * contact_country
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_country = null;
	
	
	
	/**
	 * contact_phone
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_phone = null;
	
	
	
	/**
	 * contact_fax
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_fax = null;
	
	
	
	/**
	 * contact_email
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $contact_email = null;
	
	
	
	/**
	 * store_cgv
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_cgv = null;
	
	
	
	/**
	 * store_phone_taxed
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $store_phone_taxed = null;
	
	
	
	/**
	 * get id of merchant
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of merchant
	 *
	 * @access public
	 * @param  int $id id of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get name of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of merchant
	 *
	 * @access public
	 * @param  string $name name of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	
	/**
	 * get legal_form of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_legal_form()
	{
		return $this->legal_form;
	}

	/**
	 * set legal_form of merchant
	 *
	 * @access public
	 * @param  string $legal_form legal_form of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_legal_form($legal_form) 
	{
		$this->legal_form = $legal_form;
		return $this;
	}
	
	/**
	 * get store_capital_account of merchant
	 *
	 * @access public
	 * @return float
	 */
	public function get_store_capital_account()
	{
		return $this->store_capital_account;
	}

	/**
	 * set store_capital_account of merchant
	 *
	 * @access public
	 * @param  float $store_capital_account store_capital_account of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_capital_account($store_capital_account) 
	{
		$this->store_capital_account = $store_capital_account;
		return $this;
	}
	
	/**
	 * get store_rcs_certificate of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_rcs_certificate()
	{
		return $this->store_rcs_certificate;
	}

	/**
	 * set store_rcs_certificate of merchant
	 *
	 * @access public
	 * @param  string $store_rcs_certificate store_rcs_certificate of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_rcs_certificate($store_rcs_certificate) 
	{
		$this->store_rcs_certificate = $store_rcs_certificate;
		return $this;
	}
	
	/**
	 * get store_vat_certificate of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_vat_certificate()
	{
		return $this->store_vat_certificate;
	}

	/**
	 * set store_vat_certificate of merchant
	 *
	 * @access public
	 * @param  string $store_vat_certificate store_vat_certificate of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_vat_certificate($store_vat_certificate) 
	{
		$this->store_vat_certificate = $store_vat_certificate;
		return $this;
	}
	
	/**
	 * get store_cnil_certificate of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_cnil_certificate()
	{
		return $this->store_cnil_certificate;
	}

	/**
	 * set store_cnil_certificate of merchant
	 *
	 * @access public
	 * @param  string $store_cnil_certificate store_cnil_certificate of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_cnil_certificate($store_cnil_certificate) 
	{
		$this->store_cnil_certificate = $store_cnil_certificate;
		return $this;
	}
	
	/**
	 * get store_url of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_url()
	{
		return $this->store_url;
	}

	/**
	 * set store_url of merchant
	 *
	 * @access public
	 * @param  string $store_url store_url of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_url($store_url) 
	{
		$this->store_url = $store_url;
		return $this;
	}
	
	/**
	 * get contact_civ of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_civ()
	{
		return $this->contact_civ;
	}

	/**
	 * set contact_civ of merchant
	 *
	 * @access public
	 * @param  string $contact_civ contact_civ of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_civ($contact_civ) 
	{
		$this->contact_civ = $contact_civ;
		return $this;
	}
	
	/**
	 * get contact_firstname of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_firstname()
	{
		return $this->contact_firstname;
	}

	/**
	 * set contact_firstname of merchant
	 *
	 * @access public
	 * @param  string $contact_firstname contact_firstname of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_firstname($contact_firstname) 
	{
		$this->contact_firstname = $contact_firstname;
		return $this;
	}
	
	/**
	 * get contact_lastname of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_lastname()
	{
		return $this->contact_lastname;
	}

	/**
	 * set contact_lastname of merchant
	 *
	 * @access public
	 * @param  string $contact_lastname contact_lastname of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_lastname($contact_lastname) 
	{
		$this->contact_lastname = $contact_lastname;
		return $this;
	}
	
	/**
	 * get contact_function of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_function()
	{
		return $this->contact_function;
	}

	/**
	 * set contact_function of merchant
	 *
	 * @access public
	 * @param  string $contact_function contact_function of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_function($contact_function) 
	{
		$this->contact_function = $contact_function;
		return $this;
	}
	
	/**
	 * get contact_address of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_address()
	{
		return $this->contact_address;
	}

	/**
	 * set contact_address of merchant
	 *
	 * @access public
	 * @param  string $contact_address contact_address of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_address($contact_address) 
	{
		$this->contact_address = $contact_address;
		return $this;
	}
	
	/**
	 * get contact_address2 of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_address2()
	{
		return $this->contact_address2;
	}

	/**
	 * set contact_address2 of merchant
	 *
	 * @access public
	 * @param  string $contact_address2 contact_address2 of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_address2($contact_address2) 
	{
		$this->contact_address2 = $contact_address2;
		return $this;
	}
	
	/**
	 * get contact_zip of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_zip()
	{
		return $this->contact_zip;
	}

	/**
	 * set contact_zip of merchant
	 *
	 * @access public
	 * @param  string $contact_zip contact_zip of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_zip($contact_zip) 
	{
		$this->contact_zip = $contact_zip;
		return $this;
	}
	
	/**
	 * get contact_city of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_city()
	{
		return $this->contact_city;
	}

	/**
	 * set contact_city of merchant
	 *
	 * @access public
	 * @param  string $contact_city contact_city of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_city($contact_city) 
	{
		$this->contact_city = $contact_city;
		return $this;
	}
	
	/**
	 * get contact_country of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_country()
	{
		return $this->contact_country;
	}

	/**
	 * set contact_country of merchant
	 *
	 * @access public
	 * @param  string $contact_country contact_country of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_country($contact_country) 
	{
		$this->contact_country = $contact_country;
		return $this;
	}
	
	/**
	 * get contact_phone of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_phone()
	{
		return $this->contact_phone;
	}

	/**
	 * set contact_phone of merchant
	 *
	 * @access public
	 * @param  string $contact_phone contact_phone of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_phone($contact_phone) 
	{
		$this->contact_phone = $contact_phone;
		return $this;
	}
	
	/**
	 * get contact_fax of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_fax()
	{
		return $this->contact_fax;
	}

	/**
	 * set contact_fax of merchant
	 *
	 * @access public
	 * @param  string $contact_fax contact_fax of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_fax($contact_fax) 
	{
		$this->contact_fax = $contact_fax;
		return $this;
	}
	
	/**
	 * get contact_email of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_contact_email()
	{
		return $this->contact_email;
	}

	/**
	 * set contact_email of merchant
	 *
	 * @access public
	 * @param  string $contact_email contact_email of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_contact_email($contact_email) 
	{
		$this->contact_email = $contact_email;
		return $this;
	}
	
	/**
	 * get store_cgv of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_cgv()
	{
		return $this->store_cgv;
	}

	/**
	 * set store_cgv of merchant
	 *
	 * @access public
	 * @param  string $store_cgv store_cgv of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_cgv($store_cgv) 
	{
		$this->store_cgv = $store_cgv;
		return $this;
	}
	
	/**
	 * get store_phone_taxed of merchant
	 *
	 * @access public
	 * @return string
	 */
	public function get_store_phone_taxed()
	{
		return $this->store_phone_taxed;
	}

	/**
	 * set store_phone_taxed of merchant
	 *
	 * @access public
	 * @param  string $store_phone_taxed store_phone_taxed of merchant
	 * @return \Venus\src\Helium\Entity\merchant
	 */
	public function set_store_phone_taxed($store_phone_taxed) 
	{
		$this->store_phone_taxed = $store_phone_taxed;
		return $this;
	}
	}