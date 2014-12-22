<?php

/**
 * Controller to Vat
 *
 * @category  	src
 * @package   	src\Admin\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Admin\Controller;

use \Venus\src\Admin\common\Controller as Controller;
use \Venus\src\Helium\Model\country as CountriesModel;
use \Venus\src\Helium\Model\vat as VatModel;

/**
 * Controller to Vat
 *
 * @category  	src
 * @package   	src\Admin\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Vat extends Controller {

	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */

	public function __construct() {

		parent::__construct();
	}

	/**
	 * The page of the vat manager (list)
	 *
	 * @access public
	 * @return void
	 */

	public function index() {
	
		$this->_checkRight(6);

		if (isset($_GET) && isset($_GET['remove'])) {

			$oVat = new VatModel;
			$oVatEntity = $oVat->findOneByid($_GET['remove']);
			$oVatEntity->remove();
		}
		
		$oVat = new VatModel;
		$aVats = $oVat->findAll();
		
		$this->layout
			 ->assign('vats', $aVats)
			 ->display();
	}

	/**
	 * The page of the vat manager (add)
	 *
	 * @access public
	 * @return void
	 */

	public function add() {
	
		$this->_checkRight(6);

		$oCountries = new CountriesModel;
		$aCountries = $oCountries->findAll();
		
		$aFinalCountries = array();
		
		foreach ($aCountries as $mKey => $oCountry) {
			
			$aFinalCountries[$oCountry->get_id()] = $oCountry->get_name();
		}
		
		$sForm = $this->form
					  ->add('name', 'text', 'Name')
					  ->add('vat_percent', 'text', 'Percent')
					  ->add('id_country', 'select', 'Country', null, $aFinalCountries)
					  ->add('validate', 'submit')
					  ->synchronizeEntity('Venus\src\Helium\Entity\vat')
					  ->getForm();

		$this->layout
			 ->assign('form', $sForm)
			 ->assign('model', '/src/Admin/View/VatAdd.tpl')
			 ->display();
	}

	/**
	 * The page of the vat manager (update)
	 *
	 * @access public
	 * @return void
	 */

	public function update() {
	
		$this->_checkRight(6);

		$oCountries = new CountriesModel;
		$aCountries = $oCountries->findAll();
		
		$aFinalCountries = array();
		
		foreach ($aCountries as $mKey => $oCountry) {
			
			$aFinalCountries[$oCountry->get_id()] = $oCountry->get_name();
		}
		
		$sForm = $this->form
					  ->add('name', 'text', 'Name')
					  ->add('vat_percent', 'text', 'Percent')
					  ->add('id_country', 'select', 'Country', null, $aFinalCountries)
					  ->add('validate', 'submit')
					  ->synchronizeEntity('Venus\src\Helium\Entity\vat', $_GET['update'])
					  ->getForm();

		$this->layout
			 ->assign('form', $sForm)
			 ->assign('model', '/src/Admin/View/VatAdd.tpl')
			 ->display();
	}
}