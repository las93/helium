<?php

/**
 * Controller to Product
 *
 * @category  	src
 * @package   	src\Helium\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Controller;

use \Venus\lib\Image as Image;
use \Venus\src\Helium\common\Controller as Controller;
use \Venus\src\Helium\Model\attribute_offer as AttributeOffer;
use \Venus\src\Helium\Model\offer as Offer;
use \Venus\src\Helium\Model\product as ProductModel;
use \Venus\src\Helium\Model\product_image as ProductImage;
use \Venus\src\Helium\Model\question as Question;
use \Venus\src\Helium\Model\review as Review;
use \Venus\src\Helium\Model\service_application as ServiceApplication;
use \Venus\src\Helium\Model\user_visit_offer as UserVisitOffer;
use \Venus\src\Helium\Model\sponsored_offer as SponsoredOffer;

/**
 * Controller to Product
 *
 * @category  	src
 * @package   	src\Helium\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
class Product extends Controller
{
	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * the home page of the Site
	 *
	 * @access public
	 * @param  int $iIdProduct
	 * @return void
	 */
	public function index($iIdProduct)
	{
		$this->_loadLayout();
		
		$oOfferModel = new Offer;
		$oOffer = $oOfferModel->findOneByid_product($iIdProduct);
		
		$oServiceApplication = new ServiceApplication;
		$oServicePanne = $oServiceApplication->findOneBy(array('id_country' => 1, 'id_service' => 2));
		$oServiceCasseVol = $oServiceApplication->findOneBy(array('id_country' => 1, 'id_service' => 3));
		
		$aServicePremium = $oServiceApplication->getAssociation($oOffer->get_price(), 1, 1);
		$oServicePanne = $oServiceApplication->getAssociation($oOffer->get_price(), 1, 2, 3);
		$oServiceCasseVol = $oServiceApplication->getAssociation($oOffer->get_price(), 1, 3, 2);
		
		$oQuestion = new Question;
		$iQuestion = $oQuestion->countQuestionWithResponseForOneProduct($oOffer->get_id_product());
		
		$oReview = new Review;
		$iReview = $oReview->getAvgRate($oOffer->get_id_product());
		$aReviews = $oReview->findByid_product($oOffer->get_id_product());
		
		$aRates = array(0,0,0,0,0,0);
		$iCountRate = 0;
		
		foreach($aReviews as $oOneReview) {
		    
		    $aRates[(int)$oOneReview->get_rate()]++;
		    $iCountRate++;
		}
		
		$aPercentRates = array();
		
		if ($iCountRate > 0) {
		
		    foreach($aRates as $iKey => $aOnePercentRates) {
		    
		      $aPercentRates[$iKey] = $aOnePercentRates / $iCountRate * 100;
		    }
		}

		$oProductImage = new ProductImage;
		$aImages = $oProductImage->findByid_product($oOffer->get_id_product());
		
		$oUserVisitOffer = new UserVisitOffer;
		$aUserVisitOffer = $oUserVisitOffer->getVisitOfferWithTheSameUser($iIdOffer);
		
		$oSponsoredOffer = new SponsoredOffer;
		$aSponsoredOffer = $oSponsoredOffer->getSponsoredOffer($oOffer->get_product()->get_id_main_category());
		
		$oOfferModel = new Offer;
		$aOffers = $oOfferModel->findByid_product($oOffer->get_id_product());

		foreach ($aOffers as $iKey => &$oOneOffer) {

		    if ($oOneOffer->get_id() == $iIdOffer) {
		        
		       unset($aOffers[$iKey]);
		    }
		}
		
		$oAttributeOffer = new AttributeOffer;
		
		$aAttributesOffers = $oAttributeOffer->findByid_offer($iIdOffer);

		$this->layout
			 ->assign('offer', $oOffer)
			 ->assign('premium', $aServicePremium)
			 ->assign('panne', $oServicePanne)
			 ->assign('cassevol', $oServiceCasseVol)
			 ->assign('count_question', $iQuestion)
			 ->assign('reviews_rate', $iReview)
			 ->assign('images', $aImages)
			 ->assign('country', 1)
			 ->assign('value_cross', 16.95)
			 ->assign('other_offer', $aUserVisitOffer)
			 ->assign('sponsored_offer', $aSponsoredOffer)
			 ->assign('all_offers', $aOffers)
			 ->assign('attributes', $aAttributesOffers)
			 ->assign('rates', $aRates)
			 ->assign('rates_percent', $aPercentRates)
			 ->assign('reviews', $aReviews)
			 ->display();
	}

	/**
	 * image of product
	 *
	 * @access public
	 * @param  int $iIdProductImg
	 * @param  int $iWidth
	 * @param  int $iHeight
	 * @return void
	 */
	public function imageProduct($iIdProductImg, $iWidth = 0, $iHeight = 0)
	{
	    $oProductImage = new ProductImage;
	    $oImage = $oProductImage->findOneByid($iIdProductImg);
	    
	    $sImgOriginal = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.UPLOAD_DIR.DIRECTORY_SEPARATOR.$oImage->get_name();

	    if ($iWidth > 0 && $iHeight > 0) {
        
	        Image::showImageInSize($sImgOriginal, $iWidth, $iHeight, true);
	    }
	    else {

	        header('Content-Type: image/jpeg');
	        echo file_get_contents($sImgOriginal);
	    }
	}

	/**
	 * URL of product
	 *
	 * @access public
	 * @param  int $iIdProductImg
	 * @return void
	 */
	public function getProductUrl($iIdProduct)
	{
	    $oProduct = new ProductModel;
	    $oOneProduct = $oProduct->findOneByid($iIdProduct);
	    return 'http://'.FRONT_OFFICE_HOST.'/product/'.$iIdProduct.'/'.str_replace('__', '_', preg_replace('/[^a-zA-Z0-9_]/', '_', $oOneProduct->get_name())).'.html';
	}
}
