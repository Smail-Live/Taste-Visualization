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
    /**
     * Installs the plugin.
     *
     * @param InstallContext $installContext The installation context
     */
    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);

        $installer = new Installer();
        $installer->createPropertyGroup($this->container, $installContext->getContext());
    }

    /**
     * Updates the plugin.
     *
     * @param UpdateContext $updateContext The update context
     */
    public function update(UpdateContext $updateContext): void
    {
        parent::update($updateContext);

        $installer = new Installer();
        $installer->createPropertyGroup($this->container, $updateContext->getContext());
    }

    /**
     * Uninstalls the plugin.
     *
     * @param UninstallContext $uninstallContext The uninstallation context
     */
    public function uninstall(UninstallContext $uninstallContext): void
    {
        parent::uninstall($uninstallContext);
    }
}
