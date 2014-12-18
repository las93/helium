<?php

/**
 * Model to service_application
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
 * Model to service_application
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
class service_application extends Model 
{
    /**
     * get Association with
     * @access public
     * @param  int $iPriceOffer
     * @param  int $iIdCountry
     * @param  int $iIdService
     * @param  int $iPeriodYears
     * @return array:
     */
    public function getAssociation($iPriceOffer, $iIdCountry, $iIdService, $iPeriodYears = null) 
    {
        $aJoin = [
            [
			    'type' => 'right',
				'table' => 'service_association',
				'as' => 'sas',
				'left_field' => 'sa.id',
				'right_field' => 'sas.id_service_application'
			],
            [
			    'type' => 'right',
				'table' => 'service_price_range',
				'as' => 'spr',
				'left_field' => 'spr.id',
				'right_field' => 'sas.id_service_price_range'
			],
            [
			    'type' => 'right',
				'table' => 'service_price',
				'as' => 'spri',
				'left_field' => 'spri.id',
				'right_field' => 'sas.id_service_price'
			]
		];

        $oWhere = new Where;
        
        $oWhere->whereSup('spr.max', (int)$iPriceOffer)
               ->andWhereInf('spr.min', (int)$iPriceOffer)
               ->andWhereEqual('sa.id_country', $iIdCountry)
               ->andWhereEqual('sa.id_service', $iIdService);
        
        if ($iPeriodYears !== null) {
            
            $aJoin[] = [
                'type' => 'right',
                'table' => 'service_period',
                'as' => 'sp',
                'left_field' => 'sp.id',
                'right_field' => 'sas.id_service_period'
            ];
            
            $oWhere->andWhereEqual('sp.type', 'year')
                   ->andWhereEqual('sp.value', $iPeriodYears);
        }
        
        $aResult = array();
        
		$aResult['item'] = $this->orm
				                ->select(array('SQL_CALC_FOUND_ROWS', '*'))
				                ->from($this->_sTableName, 'sa')
				                ->join($aJoin)
				                ->where($oWhere)
				                ->load();

		$aResult['count'] = $this->orm
					             ->select(array('FOUND_ROWS()'))
					             ->load();

		$aResult['pages'] = floor($aResult[0]->count / 10);

		if (isset($aResult)) { return $aResult; }
		else { return array(); }
    }
}
