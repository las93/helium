<?php
	
/**
 * Entity to question_helpful
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Entity;

use \Attila\core\Entity as Entity;
use \Attila\Orm as Orm;

/**
 * Entity to question_helpful
 *
 * @category  	\Venus
 * @package   	\Venus\src\Helium\Entity
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
class question_helpful extends Entity 
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
	 * id_question
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_question = null;
	
	/**
	 * helpful
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $helpful = null;
	
	/**
	 * get id of question_helpful
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of question_helpful
	 *
	 * @access public
	 * @param  int $id id of question_helpful
	 * @return \Venus\src\Helium\Entity\question_helpful
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_question of question_helpful
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_question()
	{
		return $this->id_question;
	}

	/**
	 * set id_question of question_helpful
	 *
	 * @access public
	 * @param  int $id_question id_question of question_helpful
	 * @return \Venus\src\Helium\Entity\question_helpful
	 */
	public function set_id_question($id_question) 
	{
		$this->id_question = $id_question;
		return $this;
	}
	
	/**
	 * get helpful of question_helpful
	 *
	 * @access public
	 * @return string
	 */
	public function get_helpful()
	{
		return $this->helpful;
	}

	/**
	 * set helpful of question_helpful
	 *
	 * @access public
	 * @param  string $helpful helpful of question_helpful
	 * @return \Venus\src\Helium\Entity\question_helpful
	 */
	public function set_helpful($helpful) 
	{
		$this->helpful = $helpful;
		return $this;
	}
	}