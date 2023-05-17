<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung;

use Onedrop\GeschmackVisualisierung\Setup\Installer;
use Shopware\Core\Framework\Plugin;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Shopware\Core\Framework\Plugin\Context\UninstallContext;
use Shopware\Core\Framework\Plugin\Context\UpdateContext;

/**
 * @SuppressWarnings(PHPMD.CamelCaseClassName)
 */
class OdsGeschmackVisualisierung extends Plugin
{
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);

        $installer = new Installer();
        $installer->createPropertyGroup($this->container, $installContext->getContext());
    }

    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext);

        $installer = new Installer();
        $installer->createPropertyGroup($this->container, $updateContext->getContext());
    }

    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
    }
}
