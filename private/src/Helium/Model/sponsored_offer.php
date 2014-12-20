<?php
	
/**
 * Model to sponsored_offer
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
 * Model to sponsored_offer
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
class sponsored_offer extends Model 
{
    /**
     * get offer
     * 
     * @access public
     * @param  int $iIdOffer
     * @return 
     */
    public function getSponsoredOffer($iIdCategory)
    {
        $aJoin = [
            [
			    'type' => 'right',
				'table' => 'offer',
				'as' => 'o',
				'left_field' => 'o.id',
				'right_field' => 'so.id_offer'
			]
		];
        
        $oWhere = new Where;
        
        $oWhere->whereEqual('so.id_category', $iIdCategory);

		return $this->orm
				    ->select(array('so.*'))
				    ->from($this->_sTableName, 'so')
				    ->join($aJoin)
				    ->where($oWhere)
				    ->groupBy(array('o.id_product'))
				    ->limit(8)
				    ->load();
    }
}
