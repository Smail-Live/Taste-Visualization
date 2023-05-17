<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Migration;

use Doctrine\DBAL\Connection;
use Shopware\Core\Framework\Migration\MigrationStep;

class Migration1683109405two_dimensional_properties extends MigrationStep
{
    public function getCreationTimestamp(): int
    {
        return 1683109405;
    }

    public function update(Connection $connection): void
    {
        $connection->executeStatement('
            CREATE TABLE IF NOT EXISTS `two_dimensional_properties` (
              `id` BINARY(16) NOT NULL,
              `property_id` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
              `token` VARCHAR(255) COLLATE utf8mb4_unicode_ci,
              `property_one` VARCHAR(255),
              `property_two` VARCHAR(255),
              `value` INT,
              `indicator` INT,
              `created_at` DATETIME(3) NOT NULL,
              `updated_at` DATETIME(3) NULL,
               PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
        ');
    }

    public function updateDestructive(Connection $connection): void
    {
        $connection->ping();
        // TODO: Implement updateDestructive() method.
    }
}
