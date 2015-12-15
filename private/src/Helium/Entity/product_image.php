<?php
	
/**
 * Entity to product_image
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
 * Entity to product_image
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
class product_image extends Entity 
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
	 * enable
	 *
	 * @access private
	 * @var    bool
	 *
	 */
    private $enable = null;
	
	/**
	 * name
	 *
	 * @access private
	 * @var    string
	 *
	 */
    private $name = null;
	
	/**
	 * get id of product_image
	 *
	 * @access public
	 * @return int
	 */
	public function get_id()
	{
		return $this->id;
	}

	/**
	 * set id of product_image
	 *
	 * @access public
	 * @param  int $id id of product_image
	 * @return \Venus\src\Helium\Entity\product_image
	 */
	public function set_id($id) 
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * get id_product of product_image
	 *
	 * @access public
	 * @return int
	 */
	public function get_id_product()
	{
		return $this->id_product;
	}

	/**
	 * set id_product of product_image
	 *
	 * @access public
	 * @param  int $id_product id_product of product_image
	 * @return \Venus\src\Helium\Entity\product_image
	 */
	public function set_id_product($id_product) 
	{
		$this->id_product = $id_product;
		return $this;
	}
	
	/**
	 * get product entity join by id_product of product_image
	 *
	 * @access public
	 * @param  array $aWhere
	 * @join
	 * @return \Venus\src\Helium\Entity\product_image
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
	 * set product entity join by id_product of product_image
	 *
	 * @access public
	 * @param  \Venus\src\Helium\Entity\product  $product product entity
	 * @join
	 * @return \Venus\src\Helium\Entity\product_image
	 */
	public function set_product(\Venus\src\Helium\Entity\product $product)
	{
		$this->product = $product;
		return $this;
	}

	/**
	 * get enable of product_image
	 *
	 * @access public
	 * @return bool
	 */
	public function get_enable()
	{
		return $this->enable;
	}

	/**
	 * set enable of product_image
	 *
	 * @access public
	 * @param  bool $enable enable of product_image
	 * @return \Venus\src\Helium\Entity\product_image
	 */
	public function set_enable($enable) 
	{
		$this->enable = $enable;
		return $this;
	}
	
	/**
	 * get name of product_image
	 *
	 * @access public
	 * @return string
	 */
	public function get_name()
	{
		return $this->name;
	}

	/**
	 * set name of product_image
	 *
	 * @access public
	 * @param  string $name name of product_image
	 * @return \Venus\src\Helium\Entity\product_image
	 */
	public function set_name($name) 
	{
		$this->name = $name;
		return $this;
	}
	}