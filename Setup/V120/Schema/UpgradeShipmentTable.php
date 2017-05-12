<?php
/**
 *
 *          ..::..
 *     ..::::::::::::..
 *   ::'''''':''::'''''::
 *   ::..  ..:  :  ....::
 *   ::::  :::  :  :   ::
 *   ::::  :::  :  ''' ::
 *   ::::..:::..::.....::
 *     ''::::::::::::''
 *          ''::''
 *
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@tig.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@tig.nl for more information.
 *
 * @copyright   Copyright (c) Total Internet Group B.V. https://tig.nl/copyright
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Setup\V120\Schema;

use \TIG\PostNL\Setup\AbstractColumnsInstaller;

class UpgradeShipmentTable extends AbstractColumnsInstaller
{
    const TABLE_NAME = 'tig_postnl_shipment';

    // @codingStandardsIgnoreLine
    protected $columns = [
        'is_extra_at_home'
    ];

    public function installIsExtraAtHomeColumn()
    {
        return [
            // @codingStandardsIgnoreLine
            'type' => \Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
            'length' => 1,
            'nullable' => true,
            'default' => null,
            'comment' => 'Is Extra@Home',
            'after' => 'parcel_count',
        ];
    }
}
