<?php
/**
 *                  ___________       __            __
 *                  \__    ___/____ _/  |_ _____   |  |
 *                    |    |  /  _ \\   __\\__  \  |  |
 *                    |    | |  |_| ||  |   / __ \_|  |__
 *                    |____|  \____/ |__|  (____  /|____/
 *                                              \/
 *          ___          __                                   __
 *         |   |  ____ _/  |_   ____ _______   ____    ____ _/  |_
 *         |   | /    \\   __\_/ __ \\_  __ \ /    \ _/ __ \\   __\
 *         |   ||   |  \|  |  \  ___/ |  | \/|   |  \\  ___/ |  |
 *         |___||___|  /|__|   \_____>|__|   |___|  / \_____>|__|
 *                  \/                           \/
 *                  ________
 *                 /  _____/_______   ____   __ __ ______
 *                /   \  ___\_  __ \ /  _ \ |  |  \\____ \
 *                \    \_\  \|  | \/|  |_| ||  |  /|  |_| |
 *                 \______  /|__|    \____/ |____/ |   __/
 *                        \/                       |__|
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Creative Commons License.
 * It is available through the world-wide-web at this URL:
 * http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 * If you are unable to obtain it through the world-wide-web, please send an email
 * to servicedesk@totalinternetgroup.nl so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future. If you wish to customize this module for your
 * needs please contact servicedesk@totalinternetgroup.nl for more information.
 *
 * @copyright   Copyright (c) 2016 Total Internet Group B.V. (http://www.totalinternetgroup.nl)
 * @license     http://creativecommons.org/licenses/by-nc-nd/3.0/nl/deed.en_US
 */
namespace TIG\PostNL\Setup\V110;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use TIG\PostNL\Setup\AbstractTableInstaller;

class InstallOrderTable extends AbstractTableInstaller
{
    const TABLE_NAME = 'tig_postnl_order';

    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface   $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $this->setup = $setup;

        if (!$installer->tableExists(static::TABLE_NAME)) {
            $connection = $installer;

            $this->createTable($connection);
            $this->addEntityId();

            $this->addInt('order_id', 'Order ID', true, true);
            $this->addForeignKey('sales_order', 'entity_id', static::TABLE_NAME, 'order_id');

            $this->addInt('quote_id', 'Quote ID', true, true);
            $this->addForeignKey('quote', 'entity_id', static::TABLE_NAME, 'quote_id');

            $this->addText('type', 'Type', 32);
            $this->addText('is_pakjegemak', 'Is Pakjegemak', 1);

            $this->addTimestamp('confirmed_at', 'Confirmed at');
            $this->addTimestamp('created_at', 'Created at');
            $this->addTimestamp('updated_at', 'Updated at');

            $this->saveTable();
        }
    }
}