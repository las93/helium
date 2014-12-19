<?php
	
/**
 * Model to question
 *
 * @category  	src
 * @package   	src\Helium\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
namespace Venus\src\Helium\Model;

use \Venus\core\Model as Model;
use \Venus\lib\Orm\Where as Where;
	
/**
 * Model to question
 *
 * @category  	src
 * @package   	src\Helium\Model
 * @author    	Judicaël Paquet <judicael.paquet@gmail.com>
 * @copyright 	Copyright (c) 2013-2014 Judicaël Paquet (https://github.com/las93)
 * @license   	https://github.com/las93/helium/blob/master/LICENSE.md Tout droit réservé à Judicaël Paquet
 * @version   	Release: 1.0.0
 * @filesource	https://github.com/las93/helium
 * @link      	https://github.com/las93
 * @since     	1.0
 */
class question extends Model 
{
    /**
     * count question which have response for one product
     * 
     * @access public
     * @param  int $iIdProduct
     * @return int
     */
    public function countQuestionWithResponseForOneProduct($iIdProduct) 
    {            
        $aJoin = [
            [
			    'type' => 'right',
				'table' => 'question',
				'as' => 'q2',
				'left_field' => 'q1.id',
				'right_field' => 'q2.id_question'
			]
		];

        $oWhere = new Where;
        
        $oWhere->whereEqual('q1.id_product', $iIdProduct);

        $aResult = array();
        
		$this->orm
		     ->select(array('SQL_CALC_FOUND_ROWS', '*'))
			 ->from($this->_sTableName, 'q1')
			 ->join($aJoin)
			 ->where($oWhere)
			 ->groupBy('q1.id')
			 ->load();

		return $this->orm
					->select(array('FOUND_ROWS()'))
					->load();
    }
}
