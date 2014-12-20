<?php
	
/**
 * Model to user_visit_offer
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
 * Model to user_visit_offer
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
class user_visit_offer extends Model 
{
    /**
     * get offer
     * 
     * @access public
     * @param  int $iIdOffer
     * @return 
     */
    public function getVisitOfferWithTheSameUser($iIdOffer)
    {
        $aJoin = [
            [
			    'type' => 'right',
				'table' => 'user_visit_offer',
				'as' => 'uvo2',
				'left_field' => 'uvo2.id_user',
				'right_field' => 'uvo1.id_user'
			],
            [
			    'type' => 'right',
				'table' => 'offer',
				'as' => 'o',
				'left_field' => 'o.id',
				'right_field' => 'uvo2.id_offer'
			]
		];

        $oWhere = new Where;
        
        $oWhere->whereEqual('uvo1.id_offer', $iIdOffer);

		return $this->orm
				    ->select(array('uvo2.*'))
				    ->from($this->_sTableName, 'uvo1')
				    ->join($aJoin)
				    ->where($oWhere)
				    ->groupBy(array('o.id_product'))
				    ->limit(8)
				    ->load();
    }
}
