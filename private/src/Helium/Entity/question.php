<?php
	
/**
 * Entity to question
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
 * Entity to question
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
class question extends Entity 
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
	 * question Entity
	 *
	 * @access private
	 * @var    question
	 * @join
	 *
	 */
    private $question = null;
	
	
	
	/**
	 * id_user
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_user = null;
	
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
	 * id_question
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $id_question = null;
	
	/**
	 * response Entity
	 *
	 * @access private
	 * @var    question
	 * @join
	 *
	 */
    private $response = null;
	
	
	
	/**
	 * comment
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $comment = null;
	
	/**
	 * date_create
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $date_create = null;
	
	/**
	 * enable
	 *
	 * @access private
	 * @var    int
	 *
	 */
    private $enable = null;
	
	/**
	 * get id of question
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of question
	 *
	 * @access public
	 * @param  int $id id of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get question entity join by id of question
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return array
	 */
	public function get_question($aWhere = array())
	{
		if ($this->question === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('question');
												   
	        $aWhere['id_question'] = $this->get_id();
											
													  
            $this->question = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');
        }

		return $this->question;
	}
	
	/**
	 * set question entity join by id of question
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\question  $question question entity
	 * @join
	 * @return array
	 */
	public function set_question(array $question)
	{
		$this->question = $question;
		return $this;
	}

	/**
	 * get id_user of question
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_user()
	{
		return $this->id_user;
	}

	/**
	 * set id_user of question
	 *
	 * @access public
	 * @param  int $id_user id_user of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_id_user($id_user) 
	{
		$this->id_user = $id_user;
		return $this;
	}
	
	/**
	 * get id_product of question
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_product()
	{
		return $this->id_product;
	}

	/**
	 * set id_product of question
	 *
	 * @access public
	 * @param  int $id_product id_product of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_id_product($id_product) 
	{
		$this->id_product = $id_product;
		return $this;
	}
	
	/**
	 * get product entity join by id_product of question
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function get_product($aWhere = array())
	{
		if ($this->product === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('product');
												   
	        $aWhere['id'] = $this->get_id_product();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->product = $aResult[0]; }
          else { $this->product = array(); }
        }

		return $this->product;
	}
	
	/**
	 * set product entity join by id_product of question
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product  $product product entity
	 * @join
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_product(\Venus\src\Helium\Entity\product $product)
	{
		$this->product = $product;
		return $this;
	}

	/**
	 * get id_question of question
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_question()
	{
		return $this->id_question;
	}

	/**
	 * set id_question of question
	 *
	 * @access public
	 * @param  int $id_question id_question of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_id_question($id_question) 
	{
		$this->id_question = $id_question;
		return $this;
	}
	
	/**
	 * get response entity join by id_question of question
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function get_response($aWhere = array())
	{
		if ($this->response === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('question');
												   
	        $aWhere['id'] = $this->get_id_question();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, '\Venus\src\Helium\Entity');

          if (count($aResult) > 0) { $this->question = $aResult[0]; }
          else { $this->question = array(); }
        }

		return $this->response;
	}
	
	/**
	 * set response entity join by id_question of question
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\question  $response question entity
	 * @join
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_response(\Venus\src\Helium\Entity\question $response)
	{
		$this->response = $response;
		return $this;
	}

	/**
	 * get comment of question
	 *
	 * @access public
	 * @return string
	 */
	public function get_comment()
	{
		return $this->comment;
	}

	/**
	 * set comment of question
	 *
	 * @access public
	 * @param  string $comment comment of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_comment($comment) 
	{
		$this->comment = $comment;
		return $this;
	}
	
	/**
	 * get date_create of question
	 *
	 * @access public
	 * @return string
	 */
	public function get_date_create()
	{
		return $this->date_create;
	}

	/**
	 * set date_create of question
	 *
	 * @access public
	 * @param  string $date_create date_create of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_date_create($date_create) 
	{
		$this->date_create = $date_create;
		return $this;
	}
	
	/**
	 * get enable of question
	 *
	 * @access public
	 * @return int
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of question
	 *
	 * @access public
	 * @param  int $enable enable of question
	 * @return \Venus\src\Helium\Entity\question
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	}