<?php
	
/**
 * Entity to review_helpful
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
 * Entity to review_helpful
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
class review_helpful extends Entity 
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
	 * id_review
	 *
	 * @access private
	 * @var    int
	 *
		 */
    private $id_review = null;
	
	
	
	/**
	 * review Entity
	 *
	 * @access private
	 * @var    review
	 * @join
	 *
	 */
    private $review = null;
	
	
	
	/**
	 * helpful
	 *
	 * @access private
	 * @var    string
	 *
		 */
    private $helpful = null;
	
	
	
	/**
	 * get id of review_helpful
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of review_helpful
	 *
	 * @access public
	 * @param  int $id id of review_helpful
	 * @return \Venus\src\Helium\Entity\review_helpful
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_review of review_helpful
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_review()
	{
		return $this->id_review;
	}

	/**
	 * set id_review of review_helpful
	 *
	 * @access public
	 * @param  int $id_review id_review of review_helpful
	 * @return \Venus\src\Helium\Entity\review_helpful
	 */
	public function set_id_review($id_review) 
	{
		$this->id_review = $id_review;
		return $this;
	}
	
	/**
	 * get review entity join by id_review of review_helpful
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\review_helpful
	 */
	public function get_review($aWhere = array())
	{
		if ($this->review === null) {

			$oOrm = new Orm;

			$oOrm->select(array('*'))
				 ->from('review');
												   
	        $aWhere['id'] = $this->get_id_review();
											
													  
            $aResult = $oOrm->where($aWhere)
						           ->load(false, 'Helium');
          if (count($aResult) > 0) { $this->review = $aResult[0]; }
          else { $this->review = array(); }
        }

		return $this->review;
	}
	
	/**
	 * set review entity join by id_review of review_helpful
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\review  $review review entity
	 * @join
	 * @return \Venus\src\Helium\Entity\review_helpful
	 */
	public function set_review(\Venus\src\Helium\Entity\review $review)
	{
		$this->review = $review;
		return $this;
	}

	/**
	 * get helpful of review_helpful
	 *
	 * @access public
	 * @return string
	 */
	public function get_helpful()
	{
		return $this->helpful;
	}

	/**
	 * set helpful of review_helpful
	 *
	 * @access public
	 * @param  string $helpful helpful of review_helpful
	 * @return \Venus\src\Helium\Entity\review_helpful
	 */
	public function set_helpful($helpful) 
	{
		$this->helpful = $helpful;
		return $this;
	}
	}