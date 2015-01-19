<?php

/**
 * Controller to Products
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
use \Venus\src\Helium\Model\brand as Brand;
use \Venus\src\Helium\Model\category as Category;
use \Venus\src\Helium\Model\product as Product;
use \Venus\src\Helium\Controller\Product as ProductFront;

/**
 * Controller to Products
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

class Products extends Controller {

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
	 * The page of the product manager (list)
	 *
	 * @access public
	 * @return void
	 */

	public function index() {
	
		$this->_checkRight(4);

		if (isset($_GET) && isset($_GET['remove'])) {

			$oProduct = new Product;
			$oProductEntity = $oProduct->findOneByid($_GET['remove']);
			$oProductEntity->remove();
		}
		
		$oProduct = new Product;
		$aProducts = $oProduct->findAll();
		
		$oProductFront = new ProductFront;
		
		$this->layout
			 ->assign('products', $aProducts)
			 ->assign('product_front', $oProductFront)
			 ->display();
	}

	/**
	 * The page of the product manager (add)
	 *
	 * @access public
	 * @return void
	 */

	public function add() {
	
		$this->_checkRight(4);

		$oCategory = new Category;
		$aCategories = $oCategory->findAll();
		$aFinalCategories = array();
		
		foreach ($aCategories as $oOneCategory) {
		
		    $aFinalCategories[$oOneCategory->get_id()] = $oOneCategory->get_name();
		}

		$oBrand = new Brand;
		$aBrands = $oBrand->findAll();
		$aFinalBrands = array();
		
		foreach ($aBrands as $oOneBrand) {

		    $aFinalBrands[$oOneBrand->get_id()] = $oOneBrand->get_name();
		}
		
		$sForm = $this->form
					  ->add('name', 'text', 'Name')
					  ->add('id_brand', 'select', 'Brand', null, $aFinalBrands)
					  ->add('id_category', 'select', 'Main category', null, $aFinalCategories)
					  ->add('short_description', 'textarea', 'Description')
					  ->add('description', 'textarea', 'Full Description')
					  ->add('ean13', 'text', 'Ean13')
					  ->add('reference/SKU', 'text', 'Reference')
					  ->add('market_price', 'text', 'Market price')
					  ->add('img1', 'file', 'Main Picture')
					  ->add('img2', 'file', 'Picture 2')
					  ->add('img3', 'file', 'Picture 3')
					  ->add('img4', 'file', 'Picture 4')
					  ->add('img5', 'file', 'Picture 5')
					  ->add('img6', 'file', 'Picture 6')
					  ->add('img7', 'file', 'Picture 7')
					  ->add('validate', 'submit')
					  ->synchronizeEntity('Venus\src\Helium\Entity\product')
					  ->getForm();

		$this->layout
			 ->assign('form', $sForm)
			 ->assign('model', '/src/Admin/View/ProductsAdd.tpl')
			 ->display();
	}

	/**
	 * The page of the product manager (update)
	 *
	 * @access public
	 * @return void
	 */

	public function update() {
	
		$this->_checkRight(4);

		$oCategory = new Category;
		$aCategories = $oCategory->findAll();
		$aFinalCategories = array();
		
		foreach ($aCategories as $oOneCategory) {
		
		    $aFinalCategories[$oOneCategory->get_id()] = $oOneCategory->get_name();
		}

		$oBrand = new Brand;
		$aBrands = $oBrand->findAll();
		$aFinalBrands = array();
		
		foreach ($aBrands as $oOneBrand) {
		
		    $aFinalBrands[$oOneBrand->get_id()] = $oOneBrand->get_name();
		}
		
		$sForm = $this->form
		              ->add('name', 'text', 'Name')
		              ->add('id_brand', 'select', 'Brand', null, $aFinalBrands)
					  ->add('id_category', 'select', 'Main category', null, $aFinalCategories)
		              ->add('short_description', 'textarea', 'Description')
		              ->add('description', 'textarea', 'Full Description')
		              ->add('ean13', 'text', 'Ean13')
		              ->add('reference', 'text', 'Reference/SKU')
		              ->add('market_price', 'text', 'Market price')
					  ->add('img1', 'file', 'Main Picture')
					  ->add('img2', 'file', 'Picture 2')
					  ->add('img3', 'file', 'Picture 3')
					  ->add('img4', 'file', 'Picture 4')
					  ->add('img5', 'file', 'Picture 5')
					  ->add('img6', 'file', 'Picture 6')
					  ->add('img7', 'file', 'Picture 7')
		              ->add('validate', 'submit')
		              ->synchronizeEntity('Venus\src\Helium\Entity\product', $_GET['update'])
		              ->getForm();
	
		$this->layout
			 ->assign('form', $sForm)
			 ->assign('model', '/src/Admin/View/ProductsAdd.tpl')
			 ->display();
	}
}