<?php
	
/**
 * Model to review
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
 * Model to review
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

class review extends Model
{
    /**
     * count question which have response for one product
     *
     * @access public
     * @param  int $iIdProduct
     * @return int
     */    
    function getAvgRate($iIdProduct)
    {        
        $oWhere = new Where;
        
        $oWhere->whereEqual('r.id_product', $iIdProduct);

        $aResult = array();
        
		$aResult = $this->orm
		                ->select(array('sum(rate) AS sum_rate, count(rate) AS count_rate'))
			            ->from($this->_sTableName, 'r')
			            ->where($oWhere)
			            ->load();

		return round($aResult[0]->sum_rate/$aResult[0]->count_rate);
    }
}
