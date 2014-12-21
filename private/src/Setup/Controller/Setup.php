<?php

/**
 * Controller to install Helium on your hardware
 *
 * @category  	src
 * @package   	src\Setup\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Setup\Controller;

use \Venus\src\Helium\Entity\attribute as Attribute;
use \Venus\src\Helium\Entity\attribute_value as AttributeValue;
use \Venus\src\Helium\Entity\attribute_offer as AttributeOffer;
use \Venus\src\Helium\Entity\brand as Brand;
use \Venus\src\Helium\Entity\category as Category;
use \Venus\src\Helium\Entity\country as Country;
use \Venus\src\Helium\Entity\merchant as Merchant;
use \Venus\src\Helium\Entity\product as Product;
use \Venus\src\Helium\Entity\product_image as ProductImage;
use \Venus\src\Helium\Entity\offer as Offer;
use \Venus\src\Helium\Entity\offer_vat_country as OfferVatCountry;
use \Venus\src\Helium\Entity\offer_category as OfferCategory;
use \Venus\src\Helium\Entity\offer_status as OfferStatus;
use \Venus\src\Helium\Entity\question as Question;
use \Venus\src\Helium\Entity\refund_offer as RefundOffer;
use \Venus\src\Helium\Entity\refund_offer_by_offer as RefundOfferByOffer;
use \Venus\src\Helium\Entity\review as Review;
use \Venus\src\Helium\Entity\right as Right;
use \Venus\src\Helium\Entity\service as Service;
use \Venus\src\Helium\Entity\service_application as ServiceApplication;
use \Venus\src\Helium\Entity\service_association as ServiceAssociation;
use \Venus\src\Helium\Entity\service_period as ServicePeriod;
use \Venus\src\Helium\Entity\service_price as ServicePrice;
use \Venus\src\Helium\Entity\service_price_range as ServicePriceRange;
use \Venus\src\Helium\Entity\user as User;
use \Venus\src\Helium\Entity\user_visit_offer as UserVisitOffer;
use \Venus\src\Helium\Entity\vat as Vat;
use \Venus\src\Helium\Entity\user_right as UserRight;
use \Venus\src\Helium\Entity\search_attribute as SearchAttribute;
use \Venus\src\Helium\Entity\search_attribute_rule as SearchAttributeRule;
use \Venus\src\Helium\Entity\sponsored_offer as SponsoredOffer;
use \Venus\src\Setup\common\Controller as Controller;

/**
 * Controller to install Helium on your hardware
 *
 * @category  	src
 * @package   	src\Setup\Controller
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

class Setup extends Controller {

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
	 * the main page
	 *
	 * @access public
	 * @return void
	 */

	public function index() {

		$aVerification = array();
		$aVerification['count_error'] = 0;

		if (is_writable('../../private/src/Helium/conf/Db.conf') === true) { 
			
			$aVerification['db_conf']['img'] = 'green'; 
			$aVerification['db_conf']['text'] = 'Db.conf is writable!'; 
		}
		else { 
			
			$aVerification['db_conf']['img'] = 'red'; 
			$aVerification['db_conf']['text'] = 'file /private/src/Helium/conf/Db.conf must have write permission!'; 
			$aVerification['count_error']++;
		}
		
		if (class_exists('PDO')) {
			
			$aVerification['pdo']['img'] = 'green'; 
			$aVerification['pdo']['text'] = 'PDO is activated!'; 
		}
		else { 
			
			$aVerification['pdo']['img'] = 'red'; 
			$aVerification['pdo']['text'] = 'PDO must be activated!'; 
			$aVerification['count_error']++;
		}
		
		if (function_exists('mysql_connect')) {
			
			$aVerification['mysql']['img'] = 'green'; 
			$aVerification['mysql']['text'] = 'Mysql library is activated!'; 
		}
		else { 
			
			$aVerification['mysql']['img'] = 'red'; 
			$aVerification['mysql']['text'] = 'Mysql library must be activated!'; 
			$aVerification['count_error']++;
		}
		
		$this->layout
			 ->assign('setup', $aVerification)
			 ->display();
	}

	/**
	 * the configuration page
	 *
	 * @access public
	 * @return void
	 */

	public function configuration() {

		$this->layout
			 ->assign('model', '/src/Setup/View/Configuration.tpl')
			 ->display();
	}

	/**
	 * the save page
	 *
	 * @access public
	 * @return void
	 */

	public function save() {

		if (is_writable('../../private/src/Helium/conf/Db.conf') === true) {
				
			$sFileConf = file_get_contents('../../private/src/Helium/conf/Db.conf');
			$sFileConf = preg_replace('/"host": "[^"]+",/', '"host": "'.$_POST['host'].'",', $sFileConf);
			$sFileConf = preg_replace('/"db": "[^"]+",/', '"db": "'.$_POST['name'].'",', $sFileConf);
			$sFileConf = preg_replace('/"user": "[^"]+",/', '"user": "'.$_POST['login'].'",', $sFileConf);
			$sFileConf = preg_replace('/"password": "[^"]+",/', '"password": "'.$_POST['password'].'",', $sFileConf);
			file_put_contents('../../private/src/Helium/conf/Db.conf', $sFileConf);
			
			$aOptions = array('p' => 'Helium', 'r' => 'yes', 'c' => true, 'f' => true, 'd' => true);
			
			
			try {
				
				$oPdo = new \PDO('mysql:host='.$_POST['host'], $_POST['login'], $_POST['password'], array());
			} 
			catch (\PDOException $Exception){
				
				$this->redirect($this->url->getUrl('step2', array('error' => 'db_error')));
			}
			
			$oPdo->query('CREATE DATABASE IF NOT EXISTS '.$_POST['name']);
			
			$oEntity = new \Venus\src\Batch\Controller\Entity;
			$oEntity->runScaffolding($aOptions);
			
			$oPdo->query('TRUNCATE user');
			$oPdo->query('TRUNCATE user_merchant');
			$oPdo->query('TRUNCATE user_right');
			$oPdo->query('TRUNCATE vat');
			$oPdo->query('TRUNCATE country');
			
			$oCountry = new Country;
			
			$iIdCountry = $oCountry->set_name('France')
				  			 	   ->save();
			
			$oVat = new Vat;
			
			$iIdVat = $oVat->set_id_country($iIdCountry)
				           ->set_name('Fr Normal')
				           ->set_vat_percent(1.20)
				           ->save();
			
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Intermediaite')
				 ->set_vat_percent(1.10)
				  			->save();
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Reduce')
				 ->set_vat_percent(1.055)
				 ->save();
			
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Medicinal')
				 ->set_vat_percent(1.021)
				 ->save();
			
			$oUser = new User;
			
			$iIdUser = $oUser->set_name('admin')
							 ->set_email('admin@hotmail.fr')
				  			 ->set_password(md5('admin'))
				  			 ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Setup')
				   ->set_description('Give access at the user at the Setup Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(1)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Merchant')
				   ->set_description('Give access at the user at the Merchant Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(2)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Brand')
				   ->set_description('Give access at the user at the Brand Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(3)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Product')
				   ->set_description('Give access at the user at the Product Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(4)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Offer')
				   ->set_description('Give access at the user at the Offer Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(5)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Vat')
				   ->set_description('Give access at the user at the Vat Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(6)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access User')
				   ->set_description('Give access at the user at the User Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(7)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Country')
				   ->set_description('Give access at the user at the Country Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(8)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Categories')
				   ->set_description('Give access at the user at the Categories Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(9)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Attributes')
				   ->set_description('Give access at the user at the Attributes Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(10)
				   	   ->save();
			
			$oRight = new Right;
			
			$oRight->set_name('Access Search Attributes')
				   ->set_description('Give access at the user at the search Attributes Manager')
				   ->save();
			
			$oUserRight = new UserRight;
			
			$oUserRight->set_id_user($iIdUser)
				   	   ->set_id_right(11)
				   	   ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Musique, DVD')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Jeux vidéo')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('High-Tech ')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Enfants et Bébés')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Maison, Animalerie')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Beauté, Santé')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Mode')
					  ->set_visible(1)
					  ->set_order(8)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Montres et Bijoux')
					  ->set_visible(1)
					  ->set_order(9)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Sports et Loisirs')
					  ->set_visible(1)
					  ->set_order(10)
					  ->set_section(1)
					  ->save();

			$oCategory = new Category;
				
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Auto et Moto')
					  ->set_visible(1)
					  ->set_order(11)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(0)
					  ->set_name('Livres')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(11)
					  ->set_name('Tous les livres')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_route_alias('livre-achat-occasion-litterature-roman')
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(11)
					  ->set_name('Livres anglais et étrangers')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_route_alias('livres-anglais-etranger')
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(11)
					  ->set_name('Manuels scolaires et parascolaires')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->set_route_alias('ecole-cahiers-soutien-scolaire-livre')
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(11)
					  ->set_name('Livres audios')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->set_route_alias('livre-audio-contes-apprendre-musical')
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('CD & Viniles')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('Musique classique')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->save();		
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('Téléchargement de musiques')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('Instruments de musiques & sono')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('DVD & Blu-ray')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(2)
					  ->set_name('Tous les jeux vidéos')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(2)
					  ->set_name('Consoles et Accessoires')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(2)
					  ->set_name('Jeux PC')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(2)
					  ->set_name('Hélium rachète')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('Séries TV')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(1)
					  ->set_name('Blu-ray')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(11)
					  ->set_name('Hélium rachète vos livres')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(2)
					  ->set_route_alias('Helium-Rachete-Reprise-Livres')
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Téléphones portables & fixes')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Photo & Caméscopes')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$iTvHomeCinemaIdCategory = $oCategory->set_enable(1)
					  				   			 ->set_id_category(3)
					  				   			 ->set_name('TV & Home Cinéma')
					  				   			 ->set_visible(1)
					  				   			 ->set_order(3)
					  				   			 ->set_section(1)
					  				   			 ->save();
			
			$oCategory = new Category;
			
			$iAudioAndHifiCategory = $oCategory->set_enable(1)
					  						   ->set_id_category(3)
					  						   ->set_name('Audio & Hifi')
					  						   ->set_visible(1)
					  						   ->set_order(4)
					  						   ->set_section(1)
					  						   ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('GPS & Auto')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Instruments de musique & Sono')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Objets connectés')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Tous les accessoires High-Tech')
					  ->set_visible(1)
					  ->set_order(8)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Tous l\'univers High-Tech')
					  ->set_visible(1)
					  ->set_order(9)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$iIdCategoryTabletteAndPortable = $oCategory->set_enable(1)
					                                    ->set_id_category(3)
					                                    ->set_name('Ordinateurs portables & Tablettes')
					                                    ->set_visible(1)
					                                    ->set_order(10)
					                                    ->set_section(2)
					                                    ->save();
			
			$oCategory = new Category;
			
			$iIdCategoryTablette = $oCategory->set_enable(1)
				                             ->set_id_category($iIdCategoryTabletteAndPortable)
					                         ->set_name('Tablettes')
					                         ->set_visible(1)
					                         ->set_order(1)
					                         ->set_section(2)
					                         ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Ordinateurs de bureaux & Ecrans')
					  ->set_visible(1)
					  ->set_order(11)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Stockage & Réseaux')
					  ->set_visible(1)
					  ->set_order(12)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Composants PC')
					  ->set_visible(1)
					  ->set_order(13)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Imprimantes & Encres')
					  ->set_visible(1)
					  ->set_order(14)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Logiciels')
					  ->set_visible(1)
					  ->set_order(15)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Fournitures scolaires et de bureau')
					  ->set_visible(1)
					  ->set_order(16)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Jeux PC')
					  ->set_visible(1)
					  ->set_order(17)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Tous les accessoires informatiques')
					  ->set_visible(1)
					  ->set_order(18)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Tous l\'univers informatique')
					  ->set_visible(1)
					  ->set_order(19)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Jeux et jouets')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Bébé & puériculture')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Vêtements et Chaussures')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Livres')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('DVD')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Liste de naissance')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(4)
					  ->set_name('Hélium famille')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Petit électroménager')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Gros électroménager')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Arts culinéaires et Arts de la table')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Ameublement et Décoration')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Linge de maison')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Luminaires & Eclairage')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Jardin')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Tous les produits Cuisine et Maison')
					  ->set_visible(1)
					  ->set_order(8)
					  ->set_section(1)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Outillage électroportatif')
					  ->set_visible(1)
					  ->set_order(9)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Outillage à main')
					  ->set_visible(1)
					  ->set_order(10)
					  ->set_section(2)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Luminaires et Eclairage')
					  ->set_visible(1)
					  ->set_order(11)
					  ->set_section(2)
					  ->set_id_shortcuts_category(59)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Tous les produits Bricolage')
					  ->set_visible(1)
					  ->set_order(12)
					  ->set_section(2)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(5)
					  ->set_name('Tous les animaux')
					  ->set_visible(1)
					  ->set_order(13)
					  ->set_section(3)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Beautés et Parfum')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Beauté prestige')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Santé et Soin du corps')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Entretien de la maison')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Alimentation')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(6)
					  ->set_name('Economisez en vous abonnant')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(2)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(7)
					  ->set_name('Vêtements')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(7)
					  ->set_name('Chaussures')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(7)
					  ->set_name('Maroquinerie')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(7)
					  ->set_name('Bagages')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(8)
					  ->set_name('Montres')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(8)
					  ->set_name('Bijoux')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Fitness et Musculation')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Football')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Camping et Randonnée')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Cyclisme')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Vêtements de sport')
					  ->set_visible(1)
					  ->set_order(5)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Running')
					  ->set_visible(1)
					  ->set_order(6)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Electronique')
					  ->set_visible(1)
					  ->set_order(7)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Golf')
					  ->set_visible(1)
					  ->set_order(8)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(9)
					  ->set_name('Tous les Sports et Loisirs')
					  ->set_visible(1)
					  ->set_order(9)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(10)
					  ->set_name('Pièces et accessoires Auto')
					  ->set_visible(1)
					  ->set_order(1)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(10)
					  ->set_name('Outils et dépannage')
					  ->set_visible(1)
					  ->set_order(2)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(10)
					  ->set_name('Pièces et accessoires Auto')
					  ->set_visible(1)
					  ->set_order(3)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oCategory = new Category;
			
			$oCategory->set_enable(1)
					  ->set_id_category(10)
					  ->set_name('GPS & Auto')
					  ->set_visible(1)
					  ->set_order(4)
					  ->set_section(1)
					  ->set_id_shortcuts_category(0)
					  ->save();
			
			$oMerchant = new Merchant;
			
			$iIdMerchant = $oMerchant->set_contact_country('France')
					                 ->set_name('Helium')
					                 ->set_store_url('http://www.helium.fr')
					                 ->set_contact_firstname('Judicaël')
					                 ->set_contact_lastname('Paquet')
					                 ->set_contact_function('CEO')
					                 ->set_contact_city('Saint Ouen')
					                 ->set_contact_zip('93400')
					                 ->set_contact_email('helium@gmail.com')
					                 ->save();
			
			$oCategory = new Category;
				
			$iTvIdCategory = $oCategory->set_enable(1)
					  				   ->set_id_category($iTvHomeCinemaIdCategory)
					  				   ->set_name('Téléviseurs')
					  				   ->set_visible(1)
					  				   ->set_order(4)
					  				   ->set_section(1)
					  				   ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeIdScreen = $oAttribute->set_name('Taille de l\'écran')
					   				         ->set_type('predefined')
					   				         ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttribut7Pouces = $oAttributeValue->set_id_attribute($iAttributeIdScreen)
							                      ->set_value('7 pouces')
							                      ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeIdScreen)
							->set_value('9 pouces')
							->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeIdScreen)
							->set_value('10 pouces')
							->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeIdScreen)
							->set_value('19 pouces')
							->save();
			
			$oSearchAttribute = new SearchAttribute;
			
			$iIdSearchAttribute = $oSearchAttribute->set_name('TV')
					   				   	   		   ->set_label_for_all('Toutes les tailles')
					   				   	   		   ->set_id_category($iTvIdCategory)
					   				   	   		   ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Moins de 30"')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeIdScreen)
								 ->set_value('a:4:{i:0;s:8:"7 pouces";i:1;s:8:"9 pouces";i:2;s:9:"10 pouces";i:3;s:8:"7 pouces";}')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('De 31" à 45"')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeIdScreen)
								 ->set_value('a:0:{}')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('De 46" à 55"')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeIdScreen)
								 ->set_value('a:0:{}')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('56" et plus')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeIdScreen)
								 ->set_value('a:0:{}')
								 ->save();
			
			$oCategory = new Category;
				
			$iEnceinteIdCategory = $oCategory->set_enable(1)
					  				   		 ->set_id_category($iAudioAndHifiCategory)
					  				   		 ->set_name('Enceintes')
					  				   		 ->set_visible(1)
					  				   		 ->set_order(1)
					  				   		 ->set_section(1)
					  				   		 ->save();
			
			$oCategory = new Category;
				
			$iBarresDeSonIdCategory = $oCategory->set_enable(1)
					  				   		 	->set_id_category($iEnceinteIdCategory)
					  				   			->set_name('Barres de son')
					  				   		 	->set_visible(1)
					  				   		 	->set_order(2)
					  				   		 	->set_section(1)
					  				   		 	->save();
			
			$oCategory = new Category;
				
			$iBarresDeSonIdCategory = $oCategory->set_enable(1)
					  				   		 	->set_id_category($iTvIdCategory)
					  				   			->set_name('Barres de son')
					  				   		 	->set_visible(0)
					  				   		 	->set_order(1)
					  				   		 	->set_section(1)
					  				   		 	->set_id_shortcuts_category($iBarresDeSonIdCategory)
					  				   		 	->save();
			
			$oSearchAttribute = new SearchAttribute;
			
			$iIdSearchAttribute = $oSearchAttribute->set_name('Barres de son par prix')
					   				   	   		   ->set_label_for_all('Toutes les barres de son')
					   				   	   		   ->set_id_category($iBarresDeSonIdCategory)
					   				   	   		   ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Moins de 100€')
								 ->set_type('offer_field')
								 ->set_id_by_type('price')
								 ->set_value_min(0)
								 ->set_value_max(100)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Entre 100€ et 200€')
								 ->set_type('offer_field')
								 ->set_id_by_type('price')
								 ->set_value_min(100)
								 ->set_value_max(200)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Entre 200€ et 500€')
								 ->set_type('offer_field')
								 ->set_id_by_type('price')
								 ->set_value_min(200)
								 ->set_value_max(500)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('500€ et plus')
								 ->set_type('offer_field')
								 ->set_id_by_type('price')
								 ->set_value_min(500)
								 ->set_value_max(9999999)
								 ->save();
			
			$oCategory = new Category;
				
			$iHomeCinemaIdCategory = $oCategory->set_enable(1)
					  				   		   ->set_id_category($iTvIdCategory)
					  				   		   ->set_name('Ensembles Home Cinéma')
					  				   		   ->set_visible(1)
					  				   		   ->set_order(1)
					  				   		   ->set_section(1)
					  				   		   ->save();
			
			$oSearchAttribute = new SearchAttribute;
			
			$iIdSearchAttribute = $oSearchAttribute->set_name('Home cinéma par technologie')
					   				   	   		   ->set_label_for_all('Tous les systèmes')
					   				   	   		   ->set_id_category($iHomeCinemaIdCategory)
					   				   	   		   ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Home cinéma 2.1')
								 ->set_type('attribute')
								 ->set_id_by_type(1)				//@todo remplir après création de l'attribue
								 ->set_value('Home cinéma 2.1')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Home cinéma 5.1')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Home cinéma 5.1')
								 ->save();
			
			$oSearchAttribute = new SearchAttribute;
			
			$iIdSearchAttribute = $oSearchAttribute->set_name('Home cinéma par fonction')
					   				   	   		   ->set_label_for_all('Toutes les fonctions')
					   				   	   		   ->set_id_category($iHomeCinemaIdCategory)
					   				   	   		   ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Home cinéma avec lecteur DVD')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Home cinéma avec lecteur DVD')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Home cinéma avec lecteur Blu-ray')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Home cinéma avec lecteur Blu-ray')
								 ->save();
			
			$oCategory = new Category;
				
			$iTvIdCategory = $oCategory->set_enable(1)
					  				   ->set_id_category($iTvHomeCinemaIdCategory)
					  				   ->set_name('Lecteurs et Enregistreurs Blu-ray')
					  				   ->set_visible(1)
					  				   ->set_order(4)
					  				   ->set_section(1)
					  				   ->save();
			
			$oSearchAttribute = new SearchAttribute;
			
			$iIdSearchAttribute = $oSearchAttribute->set_name('Lecteurs enregistreurs Blu-Ray/DVD')
					   				   	   		   ->set_id_category($iHomeCinemaIdCategory)
					   				   	   		   ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Lecteurs 3D')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Lecteurs 3D')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Lecteurs Blu-Ray et enregistreurs')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Lecteurs Blu-Ray et enregistreurs')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Lecteurs DVD et enregistreurs')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Lecteurs DVD et enregistreurs')
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('Lecteurs DVD portables')
								 ->set_type('attribute')
								 ->set_id_by_type(1) //@todo remplir après création de l'attribue
								 ->set_value('Lecteurs DVD portables')
								 ->save();
			
			$oBrand = new Brand;
			
			$iIdBrandAsus = $oBrand->set_name('Asus')
			                       ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Asus FonePad 7 ME372CL-1A006A Tablette tactile 7" 16 Go, Android, Wi-Fi, Blanc - Fonction téléphone (4G)')
			                       ->set_description('<h3 class="a-spacing-small">ASUS Fonepad 7 ME372CL</h3>
                                            <h5 class="a-spacing-mini a-color-secondary">Le meilleur des technologies mobiles</h5>
                                            <p class="a-spacing-base">
                                                D&eacute;couvrez le Fonepad 7, la combinaison astucieuse et innovante d&#39;un smartphone et d&#39;une tablette tactile, regroupant toutes les fonctionnalit&eacute;s que vous attendez de ces deux appareils dans un format 7&quot; pratique.
                                            </p>
                                                            <h5 class="a-spacing-mini a-color-secondary">Design ergonomique</h5>
                                            <p class="a-spacing-base">
                                                Le Fonepad 7 arbore des courbes agr&eacute;ables au toucher assurant une excellente prise en main.
                                            </p
                                                            <h5 class="a-spacing-mini a-color-secondary">Autonomie prolongée</h5>
                                            <p class="a-spacing-base">
                                                Le Fonepad 7 vous offre une autonomie pouvant aller jusqu&#39;&agrave; 28 heures de discussion en mode 3G et jusqu&#39;&agrave; 10 heures en lecture vid&eacute;o. Il pourra ainsi &ecirc;tre utilis&eacute; toute la journ&eacute;e.
                                            </p>
                                                            <h4 class="a-spacing-mini">L\'ASUS Fonepad 7 ME372CL en bref</h4>
                                        <ul>
                                            <li><span class="a-size-base a-color-secondary">Processeur Intel Atom pour une connexion internet et un chargement des applications rapides</span></li>
                                            <li><span class="a-size-base a-color-secondary">Fonction téléphone avec connexion 3G intégrée</span></li>
                                            <li><span class="a-size-base a-color-secondary">Ecran 7\'\' HD à technologie IPS offrant un angle de vision de 178°</span></li>
                                            <li><span class="a-size-base a-color-secondary">Immersion audio parfaite avec la technologie ASUS SonicMaster</span></li>
                                            <li><span class="a-size-base a-color-secondary">Des photos de grande qualité avec les capteurs de 1,2 et 5 mégapixels (avant et arrière)</span></li>
                                        </ul>')
			                         ->set_ean13('1234553')
                			         ->set_market_price(207.5)
                			         ->set_reference('B00JZRH6K6')
                			         ->set_short_description('<ul><li>Ecran tactile 7 pouces
                                        <li>Fonction téléphone avec connexion 4G intégrée</li>
                                        <li>Stockage et mémoire : disque dur 16 Go, RAM 1 Go</li>
                                        <li>Processeur : Intel Clover Trail+ Z2560 1.6 Ghz</li>
                                        <li>Connectique : Wifi 802.11a/b/g/n, Bluetooth 3.0</li>
                                        <li>Système d\'exploitation : Android 4.3 Jelly Bean</li>
                                        <li>Nombre de ports : 1 x micro USB ; 1 x Audio jack ; Micro-SD (jusqu\'à 64 Go)</li>
                                        <li>Autonomie : 11 heures</li></ul>')
                			         ->set_id_brand($iIdBrandAsus)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOfferStatus = new OfferStatus();
				
			$iIdStatus = $oOfferStatus->set_name('en stock')
			                          ->save();

			$oOfferStatus = new OfferStatus();
				
			$iIdStatusRestock = $oOfferStatus->set_name('restockage')
			                                 ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(174.56)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeIdScreen)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttribut7Pouces)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Marque')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Asus')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Numéro du modèle de l\'article')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('ME372CL-1A006A')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Séries')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Tablette')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Couleur')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Blanc')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Garantie constructeur')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Garantie Fabricant : 1 an(s)')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Système d\'exploitation')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Android')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Plate-forme du matériel informatique')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Tablette tactile')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Description du clavier')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('AZERTY')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Marque du processeur')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Intel')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Vitesse du processeur')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('1.6 GHz')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Nombre de coeurs')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('2')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Taille de la mémoire vive')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('1024 MB')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Taille du disque dur')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('16 GB')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Type d\'écran')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Ecran tactile')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Description de la carte graphique')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('NON')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Type de connectivité')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Bluetooth, Wifi 802.11 b/g/n')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Type de technologie sans fil')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('802.11B, 802.11G, 802.11n')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Bluetooth')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('Oui')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Interface du matériel informatique')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('USB 2.0')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Durée de vie moyenne (en heures)')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('11 heures')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Item dimensions L x W x H')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('12 x 19.8 x 1 millimeters')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeId = $oAttribute->set_name('Poids du produit')
					   		           ->set_type('predefined')
					   		           ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$iIdAttributeValue = $oAttributeValue->set_id_attribute($iAttributeId)
				                                 ->set_value('340 grammes')
                                                 ->save();

			$oAttributeOffer = new AttributeOffer;
			
			$oAttributeOffer->set_id_attribute($iAttributeId)
			                ->set_id_offer($iIdOffer)
			                ->set_id_attribute_value($iIdAttributeValue)
			                ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oService = new Service;
			
			$iIdService = $oService->set_name('Helium Premium')
			                      ->save();
			
			$oServiceApplication = new ServiceApplication;
			
			$iIdServiceApplication = $oServiceApplication->set_id_service($iIdService)
			                                             ->set_auto_add('no')
			                                             ->set_discount_authorized(true)
			                                             ->set_enable(true)
			                                             ->set_id_country($iIdCountry)
			                                             ->set_id_vat($iIdVat)
			                                             ->set_name('Helium Premium')
			                                             ->set_type_selling('shipping')
			                                             ->set_url_cgu('http://localhost:82/premium')
			                                             ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(0)
			                                 ->set_price(40.83)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServicePriceRange = new ServicePriceRange;
			
			$iIdServicePriceRange = $oServicePriceRange->set_min(0)
			                                           ->set_max(100)
			                                           ->save();
			
			$oServicePriceRange = new ServicePriceRange;
			
			$iIdServicePriceRangeTotal = $oServicePriceRange->set_min(0)
			                                                ->set_max(999999)
			                                                ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRangeTotal)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->save();
			
			$oService = new Service;
			
			$iIdService = $oService->set_name('Garantie Panne')
			                      ->save();
			
			$oServiceApplication = new ServiceApplication;
			
			$iIdServiceApplication = $oServiceApplication->set_id_service($iIdService)
			                                             ->set_auto_add('no')    
			                                             ->set_discount_authorized(false)
			                                             ->set_enable(true)
			                                             ->set_id_country($iIdCountry)
			                                             ->set_id_vat($iIdVat)
			                                             ->set_name('Garantie Panne')
			                                             ->set_type_selling('cart')
			                                             ->set_url_cgu('http://localhost:82/garantie-panne')
			                                             ->save();
			
			$oServicePeriod = new ServicePeriod;
			
			$iIdServicePeriod1 = $oServicePeriod->set_type('year')
			                                   ->set_value(1)
			                                   ->save();
			
			$oServicePeriod = new ServicePeriod;
			
			$iIdServicePeriod2 = $oServicePeriod->set_type('year')
			                                    ->set_value(2)
			                                    ->save();
			
			$oServicePeriod = new ServicePeriod;
			
			$iIdServicePeriod3 = $oServicePeriod->set_type('year')
			                                    ->set_value(3)
			                                    ->save();
			
			$oServicePeriod = new ServicePeriod;
			
			$iIdServicePeriod5 = $oServicePeriod->set_type('year')
			                                    ->set_value(5)
			                                    ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(2.03)
			                                 ->set_price(12.03)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServicePriceRange = new ServicePriceRange;
			
			$iIdServicePriceRange = $oServicePriceRange->set_min(166.67)
			                                           ->set_max(208.33)
			                                           ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod1)
			                    ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(12.57)
			                                 ->set_price(22.57)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod2)
			                    ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(21.25)
			                                 ->set_price(31.25)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod3)
			                    ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(29.93)
			                                 ->set_price(39.93)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod5)
			                    ->save();
			
			$oService = new Service;
			
			$iIdService = $oService->set_name('Garantie Casse et Vol')
			                      ->save();
			
			$oServiceApplication = new ServiceApplication;
			
			$iIdServiceApplication = $oServiceApplication->set_id_service($iIdService)
			                                             ->set_auto_add('no')
			                                             ->set_discount_authorized(false)
			                                             ->set_enable(true)
			                                             ->set_id_country($iIdCountry)
			                                             ->set_id_vat($iIdVat)
			                                             ->set_name('Garantie Casse et Vol')
			                                             ->set_type_selling('cart')
			                                             ->set_url_cgu('http://localhost:82/garantie-casse-et-vol')
			                                             ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(5.96)
			                                 ->set_price(15.96)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod1)
			                    ->save();
			
			$oServicePrice = new ServicePrice;
			
			$iIdServicePrice = $oServicePrice->set_cost(18.73)
			                                 ->set_price(28.73)
			                                 ->set_price_type('amount')
			                                 ->save();
			
			$oServiceAssociation = new ServiceAssociation;
			
			$oServiceAssociation->set_id_service_application($iIdServiceApplication)
			                    ->set_id_service_price($iIdServicePrice)
			                    ->set_id_service_price_range($iIdServicePriceRange)
			                    ->set_id_type($iIdOffer)
			                    ->set_type('offer')
			                    ->set_id_service_period($iIdServicePeriod2)
			                    ->save();
			
			$oReview = new Review;
			
			$oReview->set_comment('Formidable de combiner tablette et téléphone; le fonctionnement est très pratique, tout est à portée de main.
le réseau est bon et capte bien, le wi-fi aussi.
le prix est très raisonnable compte tenu des capacités générales de l\'appareil.
Petite info importante: bien utiliser la micro carte sim et non pas la "Nano", comme je l\'avais fait.
j\'ai eu d\'énormes difficultés à la récupérer, une fois insérée.
Sinon, amazon toujours au top, livraison sans souci. bravo')
			        ->set_enable(true)
			        ->set_id_user($iIdUser)
			        ->set_title('GENIAL')
			        ->set_rate(4)
			        ->set_id_product($iIdProduct)
			        ->save();
			
			$oQuestion = new Question;
			
			$iIdQuestion = $oQuestion->set_comment('certains sites annoncent une connectivité 4G. Quand est-il ?')
			                         ->set_enable(true)
			                         ->set_id_user($iIdUser)
			                         ->set_id_product($iIdProduct)
			                         ->save();
			
			$oQuestion = new Question;
			
			$oQuestion->set_comment('Bonjour, je possède le fonepad depuis une semaine et dans mes déplacements dans le sud de la France j\'ai eu le plaisir de voir dans certaines villes apparaître le logo 4G. (Toulon et Marseille par exemple). Cordialement.')
			          ->set_enable(true)
			          ->set_id_user($iIdUser)
			          ->set_id_product($iIdProduct)
			          ->set_id_question($iIdQuestion)
			          ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img1b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6b.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img7b.jpg')
			              ->save();
			
			$oBrand = new Brand;
			
			$iIdBrand = $oBrand->set_name('Gambolex')
			                   ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('IVSO Slim Smart Cover Housse pour ASUS Fonepad 7 LTE ME372CL Tablette (Noir)')
			                       ->set_description('IVSO Slim Smart Cover Housse pour ASUS Fonepad 7 LTE ME372CL Tablette<br/><br/>
                                        Fabriqué spécialement pour votre ASUS Fonepad 7 LTE ME372CL tablette, cet étui unit la praticabilité à la beauté. C\'est un produit élaboré en cuir de qualité. Sa doublure en microfibre vous assure le confort et vous offre une protection additionelle. Les entailles taillées précisement sont à votre disposition pour tous les contrôles et fonctions necessaires. Cet étui housse est capable de protéger durablement votre ASUS Fonepad 7 LTE ME372CL tablette.')
			                         ->set_ean13('1234553')
                			         ->set_market_price(24.99)
                			         ->set_reference('JID00DZA8')
                			         ->set_short_description('Taille: Pour ASUS Fonepad 7 LTE ME372CL<br/><br/>
                                        Couleur: Noir<br/><br/>
                			            <ul>
                                            <li>Fabriqué Spécialement pour ASUS Fonepad 7 LTE ME372CL tablette</li>
                                            <li>Etui Housse en Cuir Ultra-mince, avec Support de Multi-angle destiné à la vision la plus confortable</li>
                                            <li>Etui Housse en cuir de qualité avec la doublure en microfibre</li>
                                            <li>Entailles taillées précisement pour tous les contrôles et fonctions necessaires</li>
                                            <li>Protéger complètement votre ASUS Fonepad 7 LTE ME372CL tablette contre les pousières, les rayures et les chocs</li>
				                        </ul>')
                			         ->set_id_brand($iIdBrand)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(14.13)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_5.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_6.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img2_7.jpg')
			              ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Asus Fonepad 7 LTE ME372CL-1B020A 17,8 cm (7\'\') Tablette Tactile (Intel Atom Z2560, 1,6GHz, 1Go RAM, 8Go HDD, SGX544MP2 Grafikkarte, Ecran tactile, Android) Noir (Import Europe)')
			                       ->set_description('')
			                         ->set_ean13('84934')
                			         ->set_reference('BDLKSD99S')
                			         ->set_short_description('')
                			         ->set_id_brand($iIdBrandAsus)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(165.83)
			                   ->set_quantity_public(15)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img3_5.jpg')
			              ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Asus MeMO Pad 8 ME181CX-1B018A Tablette tactile 8" 16 Go, Android, Wi-Fi, Blanc')
			                       ->set_description('ASUS MeMO Pad 8 ME181CX<br/><br/>
                                                        Design et simplicité d\'utilisation<br/>
                                                        La tablette ASUS MeMO Pad 8 ME181CX est pensée pour les personnes exigeantes. Son châssis 8" est étonnamment léger, et elle intègre des fonctionnalités et technologies habituellement retrouvées sur des tablettes haut de gamme. La tablette ASUS MeMO Pad 8 ME181CX combine un châssis glossy élégant à un écran HD 1280 x 800.<br/><br/>
                                                        Autonomie prolongée<br/>
                                                        Avec une autonomie pouvant aller jusqu\'à 9 heures, la tablette ASUS MeMO Pad 8 ME181CX vous permet de vous divertir tout au long de la journée. Vous pourrez surfer sur internet, jouer à des jeux ou encore regarder des vidéos.<br/><br/>
                                                        Angle panoramique<br/>
                                                        L\'écran de la tablette ASUS MeMO Pad 8 ME181CX dispose de la technologie IPS qui assure un angle de vision panoramique de 178°. Grâce à lui, les personnes légèrement excentrées pourront parfaitement profiter de la même qualité d\'images et de couleurs que les personnes en face de la tablette.')
			                         ->set_ean13('8493445')
                			         ->set_market_price(149.17)
                			         ->set_reference('DSSS890Q')
                			         ->set_short_description('<ul>
                			                 <li>Ecran tactile 8 pouces
                			                 <li>Stockage et mémoire : disque dur 16 Go, RAM 1 Go
                			                 <li>Processeur : Intel Bay Trail T Z3745 1.33 Ghz
                			                 <li>Connectique : Wifi 802.11b/g/n, Bluetooth 4.0
                			                 <li>Système d\'exploitation : Android 4.4 Kit Kat
                			                 <li>Nombre de ports : 1 x micro USB ; 1 x Audio jack
                			                 <li>Autonomie : 9 heures
                			             </ul>')
                			         ->set_id_brand($iIdBrandAsus)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(134.99)
			                   ->set_quantity_public(15)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_5.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img4_6.jpg')
			              ->save();
			
			$oBrand = new Brand;
			
			$iIdBrandTime2 = $oBrand->set_name('Time2')
			                        ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Asus MeMO Pad 8 ME181CX-1B018A Tablette tactile 8" 16 Go, Android, Wi-Fi, Blanc')
			                       ->set_description('Présentation de la nouvelle Time2Touch 7" Dual Core Android PC tablette avec Bluetooth<br/><br/>

                                            Le plus récent ajout à notre "collection tablette 7 est notre meilleur modèle pour l\'instant.<br/>
                                            Avec son processeur Dual Core 1,2 GHz ultra-rapide et massif de 512 Mo de RAM, 8 Go de stockage interne et sur le stockage de 32 Go extensible, la connectivité Bluetooth, un gameplay brillant, écran haute définition magnifiquement magnifique, et avec le Google Playstore les possibilités sont infinies - parfait pour toute la famille<br/><br/>
                                            
                                            Afficher<br/> 
                                            Le super sensible 7 "tactile capacitif vous donne la liberté de naviguer sur la tablette avec facilité, rendant le visionnement de vos médias rapide et facile. L\'brillamment coloré résolution de 800 x 480 permet à vos photos et des films à plus nette et plus brillante que jamais. <br/><br/>
                                            
                                            Applications <br/>
                                            Exécution de la toute dernière 4.4 Kitkat Système d\'exploitation Android, vous pouvez télécharger le 1000s d\'applications disponibles pour vous sur le Play Store de Google, vous aurez l\'embarras du choix et avec le processeur de 1,2 GHz, il n\'a jamais été plus rapide! Jeux fonctionnent mieux que jamais, vous donnant un gameplay vraiment immersive.<br/><br/> 
                                            
                                            connectivité <br/>
                                            Ne jamais être en contact à nouveau avec la tablette Time2Touch avec son, capacité 3G WiFi intégré via un dongle externe, et maintenant pour la première fois la technologie Bluetooth inclus pour vous donner le plus de couverture pour vous garder de parler, de socialiser et jouer partout où vous allez.<br/><br/> 
                                            
                                            Le forfait comprend: <br/>
                                            Time2Touch SC744B 7 "Android 4.4 Tablet PC <br/>
                                            Adaptateur secteur <br/>
                                            Câble USB <br/>
                                            Manuel d\'instruction en Français en format PDF envoyé par e-mail le jour de l\'expédition <br/>
                                            12 mois de garantie
			                         ')
			                         ->set_ean13('278392')
                			         ->set_market_price(99.99)
                			         ->set_reference('IOIOO989')
                			         ->set_short_description('<ul>
                			                 <li>A23 1,2 GHz Dual Core. Google Android 4.4 du système d\'exploitation. 800 x 480 16:9 écran tactile capacitif.
                                             <li>512 Mo de RAM. 8 Go de stockage interne (env. 5 Go de stockage utilisable) extensible jusqu\'à 32 Go
                                             <li>Compatibilité WiFi. Bluetooth. Compatibilité 3G (dongle externe requise).
                                             <li>Prise en charge des jeux 3D avec G Capteurs
                                             <li>Caméras double (avant face à la caméra - face 0.3MP caméra de recul - 0.3MP)
                			             </ul>')
                			         ->set_id_brand($iIdBrandTime2)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(58.33)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_5.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img5_6.jpg')
			              ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Pack complet Tablette + Housse + Carte Micro SD 16 Go : Asus MeMO Pad 7 ME176CX-1B057A Tablette tactile 7" Blanc (Intel Atom, 8 Go, Android, WiFi)')
			                       ->set_description('ME176CX-1B057A/Android 1GB 8GB 7" Red')
			                         ->set_ean13('98654')
                			         ->set_market_price(149.00)
                			         ->set_reference('SIO893')
                			         ->set_short_description('<ul>
                			                 <li>Ecran tactile 7 pouces - 1280 X 800
                                             <li>Stockage et mémoire : disque dur 8 Go, RAM 1 Go
                                             <li>Intel Bay Trail T Z3745 1.33 Ghz
                                             <li>Carte Graphique : Non
                			             </ul>')
                			         ->set_id_brand($iIdBrandAsus)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(108.33)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_5.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_6.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_7.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img6_8.jpg')
			              ->save();
			
			$oBrand = new Brand;
			
			$iIdBrandLg = $oBrand->set_name('LG')
			                     ->save();
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('LG Gpad V480 Tablette tactile 8" Blanc (16 Go, Android, WiFi)')
			                       ->set_description('<b>Description du produit</b><br/>
                                        Tablette Tactile 8" Android 16Gb<br/>
                                        <b>Points forts</b><br/>
                                        <ul><li> 16Gb de mémoire<li>Android KitKat 4.4.2</li><li>Ecran Multipoint</li><li>Appareil photo 5mp</li><li>Knock Code</li><li>Bluetooth 4.0</li><li>MicroSD jusqu\'à 64Gb</li><li>Caméra HD</li><li>Lecteur MP3</li><li>Formats supportés:MP3, AAC, AAC+, eAAC+, AMR, WAV, OGG, WMA</li><li>GPS / AGPS</li><li>Sortie TV : Slimport / Miracast</li></ul>')
			                         ->set_ean13('89237908')
                			         ->set_market_price(141.58)
                			         ->set_reference('LGJSD23')
                			         ->set_short_description('<ul>
                			                 <li>Ecran tactile 8 pouces
                                             <li>Stockage et mémoire : disque dur 16 Go, RAM 16 Go
                                             <li>Processeur Quad Core 1,2 Ghz
                                             <li>Carte Graphique : WXGA
                                             <li>1 port(s) USB 2.0; 1 prise(s) jack
                			             </ul>')
                			         ->set_id_brand($iIdBrandLg)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatusRestock)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(137.49)
			                   ->set_quantity_public(7)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();  
			
			$oMerchant = new Merchant;
			
			$iIdMerchant2 = $oMerchant->set_contact_country('France')
					                 ->set_name('Maily')
					                 ->set_store_url('http://www.maily.fr')
					                 ->set_contact_firstname('Maily')
					                 ->set_contact_lastname('Huynh')
					                 ->set_contact_function('CEO')
					                 ->set_contact_city('Paris')
					                 ->set_contact_zip('75015')
					                 ->set_contact_email('maily@gmail.com')
					                 ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant2)
			                   ->set_id_offer_status($iIdStatusRestock)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(143.11)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save(); 
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img7_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img7_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img7_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img7_4.jpg')
			              ->save();
			
			$oRefundOffer = new RefundOffer;
			
			$iIdRefundOffer = $oRefundOffer->set_name('30 euros remboursés pour l\'achat d\'une tablette LG GPad')
			                               ->set_amount(30.00)
			                               ->save();
			
			$oRefundOfferByOffer = new RefundOfferByOffer;
			
			$oRefundOfferByOffer->set_id_refund_offer($iIdRefundOffer)
		                        ->set_id_offer($iIdOffer)
		                        ->save();	
		
			$oProduct = new Product;
			
			$iIdProduct = $oProduct->set_name('Asus MeMO Pad 7 ME572C-1A013A Tablette tactile 7" Noir (Intel Moorefield, 16 Go, Android, WiFi)')
			                       ->set_description('Tablette Asus ME572C-1A013A 7" Tactile Noire')
			                         ->set_ean13('98898976')
                			         ->set_market_price(0)
                			         ->set_reference('ASMEMO7')
                			         ->set_short_description('<ul>
                			                 <li>Ecran tactile 7 pouces - 1920 X 1200
                			                 <li>Stockage et mémoire : disque dur 16 Go, RAM 2 Go
                			                 <li>Intel Moorefield 1.8 Ghz
                			                 <li>Carte Graphique : Non
                			             </ul>')
                			         ->set_id_brand($iIdBrandAsus)
			                         ->set_id_main_category($iIdCategoryTablette)
                			         ->save();

			$oOffer = new Offer;

			$iIdOffer = $oOffer->set_enable(true)
			                   ->set_id_merchant($iIdMerchant)
			                   ->set_id_offer_status($iIdStatus)
			                   ->set_id_product($iIdProduct)
			                   ->set_price(189.83)
			                   ->set_quantity_public(100)
			                   ->set_gift_possible(true)
			                   ->save();
			
			$oUserVisitOffer = new UserVisitOffer;
			
			$oUserVisitOffer->set_id_offer($iIdOffer)
			                ->set_id_user($iIdUser)
			                ->save();
			
			$oSponsoredOffer = new SponsoredOffer;
			
			$oSponsoredOffer->set_id_offer($iIdOffer)
			                ->set_id_category($iIdCategoryTablette)
			                ->save();
			
			$oOfferVatCountry = new OfferVatCountry;
			
			$oOfferVatCountry->set_id_country($iIdCountry)
			                 ->set_id_vat($iIdVat)
			                 ->set_id_offer($iIdOffer)
			                 ->save();
			
			$oOfferCategory = new OfferCategory;
			
			$oOfferCategory->set_id_offer($iIdOffer)
			               ->set_id_category($iIdCategoryTablette)
			               ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_1.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_2.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_3.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_4.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_5.jpg')
			              ->save();
			
			$oProductImage = new ProductImage;
			
			$oProductImage->set_id_product($iIdProduct)
			              ->set_name('product/img8_6.jpg')
			              ->save();     
		}
		else {
			
			$this->redirect($this->url->getUrl('home'));
		}

		$this->layout
			 ->assign('model', '/src/Setup/View/Save.tpl')
			 ->display();
	}
}