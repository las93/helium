<?php

/**
 * Controller Manager
 *
 * @category  	src\Admin
 * @package   	src\Admin\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

namespace Venus\src\Admin\common;

use \Venus\core\Controller as CoreController;
use \Venus\src\Helium\Model\user as User;
use \Venus\src\Helium\Model\user_right as UserRight;

/**
 * Controller Manager
 *
 * @category  	src\Admin
 * @package   	src\Admin\common
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 PAQUET Judicaël FR Inc. (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à PAQUET Judicaël
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */

abstract class Controller extends CoreController {

	/**
	 * Private key for Token
	 * @var string
	 */
	
	const PRIVATE_KEY_FOR_TOKEN = 'Lsdds:!; sdsdDS';
	
	/**
	 * Constructor
	 *
	 * @access public
	 * @return object
	 */

	public function __construct() {

		parent::__construct();
		$this->_connection();
		$this->_deconnection();
	}
	
	/**
	 * Connection on the admin
	 * 
	 * @access protected
	 * @return object
	 */
	
	protected function _connection() {

		if ($this->cookie->exists('user') === false && $this->cookie->exists('token') === false) {
			
			if (count($_POST) && isset($_POST['email']) && isset($_POST['password'])) {
				
				$oUser = new User;
				$oUserEntity = $oUser->findOneByemail($_POST['email']);

				if (count($oUserEntity) > 0 && md5($_POST['password']) === $oUserEntity->get_password()) {

					$this->cookie->set('user', $_POST['email'], 86400);
					$this->cookie->set('id', $oUserEntity->get_id(), 86400);
					$this->cookie->set('token', md5($_POST['email'].self::PRIVATE_KEY_FOR_TOKEN), 86400);
				}
			}
		}
		
		if ($this->cookie->exists('user') && $this->cookie->exists('token')) {
			
			if (md5($this->cookie->get('user').self::PRIVATE_KEY_FOR_TOKEN) != $this->cookie->get('token')) {
				
				$this->cookie->set('user', null, 0);
				$this->cookie->set('id', null, 0);
				$this->cookie->set('token', null, 0);
			}
		}
	}
	
	/**
	 * Connection on the admin
	 * 
	 * @access protected
	 * @param  int $iRight
	 * @return void
	 */
	
	protected function _checkRight($iRight) {

		if ($this->cookie->exists('id') && $iRight > 0) {
		
			$oUserRight = new UserRight;
			$aUserRight = $oUserRight->findBy(array('id_user' => $this->cookie->get('id'), 'id_right' => $iRight));

			
			if (count($aUserRight) > 0) {
				
				return;
			}
		}
		
		$this->redirect($this->url->getUrl('f403'));
	}	
	/**
	 * Deconnection on the admin
	 * 
	 * @access protected
	 * @return object
	 */
	
	protected function _deconnection() {

		if ($this->cookie->exists('user') && $this->cookie->exists('token') && isset($_GET['deconnection']) && $_GET['deconnection'] === "1") {

			$this->cookie->set('user', null, 0);
			$this->cookie->set('id', null, 0);
			$this->cookie->set('token', null, 0);
		}
	}
}
