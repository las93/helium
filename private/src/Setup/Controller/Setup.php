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
use \Venus\src\Helium\Entity\attribute_category as AttributeCategory;
use \Venus\src\Helium\Entity\attribute_value as AttributeValue;
use \Venus\src\Helium\Entity\brand as Brand;
use \Venus\src\Helium\Entity\category as Category;
use \Venus\src\Helium\Entity\country as Country;
use \Venus\src\Helium\Entity\merchant as Merchant;
use \Venus\src\Helium\Entity\product as Product;
use \Venus\src\Helium\Entity\offer as Offer;
use \Venus\src\Helium\Entity\offer_status as OfferStatus;
use \Venus\src\Helium\Entity\right as Right;
use \Venus\src\Helium\Entity\user as User;
use \Venus\src\Helium\Entity\vat as Vat;
use \Venus\src\Helium\Entity\user_right as UserRight;
use \Venus\src\Helium\Entity\search_attribute as SearchAttribute;
use \Venus\src\Helium\Entity\search_attribute_rule as SearchAttributeRule;
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
				           ->set_vat_percent(20)
				           ->save();
			
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Intermediaite')
				 ->set_vat_percent(10)
				  			->save();
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Reduce')
				 ->set_vat_percent(5.5)
				 ->save();
			
			$oVat = new Vat;
			
			$oVat->set_id_country($iIdCountry)
				 ->set_name('Fr Medicinal')
				 ->set_vat_percent(2.1)
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
			
			$oCategory->set_enable(1)
					  ->set_id_category(3)
					  ->set_name('Ordinateurs portables & Tablettes')
					  ->set_visible(1)
					  ->set_order(10)
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
			
			$iAttributeId = $oAttribute->set_name('Taille de l\'écran')
					   				   ->set_type('predefined')
					   				   ->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeId)
							->set_value('7')
							->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeId)
							->set_value('9')
							->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeId)
							->set_value('10')
							->save();
			
			$oAttributeValue = new AttributeValue;
			
			$oAttributeValue->set_id_attribute($iAttributeId)
							->set_value('19')
							->save();
			
			$oAttribute = new Attribute;
			
			$iAttributeIdHighScreen = $oAttribute->set_name('Taille de l\'écran')
					   				   			 ->set_type('predefined')
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
								 ->set_id_by_type($iAttributeIdHighScreen)
								 ->set_value_min(0)
								 ->set_value_max(30)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('De 31" à 45"')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeId)
								 ->set_value_min(31)
								 ->set_value_max(45)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('De 46" à 55"')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeId)
								 ->set_value_min(46)
								 ->set_value_max(55)
								 ->save();

			$oSearchAttributeRule = new SearchAttributeRule;
				
			$oSearchAttributeRule->set_id_search_attribute($iIdSearchAttribute)
								 ->set_name('56" et plus')
								 ->set_type('attribute')
								 ->set_id_by_type($iAttributeId)
								 ->set_value_min(56)
								 ->set_value_max(1000)
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
			
			$iIdBrand = $oBrand->set_name('Asus')
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
                			         ->set_market_price(249.00)
                			         ->set_reference('B00JZRH6K6')
                			         ->set_short_description('<ul><li>Ecran tactile 7 pouces</li>
                                        </li>Fonction téléphone avec connexion 4G intégrée</li>
                                        </li>Stockage et mémoire : disque dur 16 Go, RAM 1 Go</li>
                                        </li>Processeur : Intel Clover Trail+ Z2560 1.6 Ghz</li>
                                        </li>Connectique : Wifi 802.11a/b/g/n, Bluetooth 3.0</li>
                                        </li>Système d\'exploitation : Android 4.3 Jelly Bean</li>
                                        </li>Nombre de ports : 1 x micro USB ; 1 x Audio jack ; Micro-SD (jusqu\'à 64 Go)</li>
                                        </li>Autonomie : 11 heures</li></ul>')
                			         ->set_id_brand($iIdBrand)
                			         ->save();

			$oOfferStatus = new OfferStatus();
				
			$iIdStatus = $oOfferStatus->set_name('instock')
			                          ->save();

			$oOfferStatus = new OfferStatus();
				
			$iIdStatus = $oOfferStatus->set_name('restocking')
			                          ->save();

			$oOffer = new Offer;

			$oOffer->set_enable(true)
			       ->set_id_merchant($iIdMerchant)
			       ->set_id_offer_status($iIdStatus)
			       ->set_id_product($iIdProduct)
			       ->set_id_vat($iIdVat)
			       ->set_price(209.47)
			       ->set_quantity_public(100)
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