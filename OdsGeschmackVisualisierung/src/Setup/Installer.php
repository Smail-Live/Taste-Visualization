<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Setup;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class Installer
 *
 * This class handles the installation of property groups and options.
 */
class Installer
{
    protected mixed $propertyGroupRepository;
    private mixed $propertyGroupOptionRepository;

    /**
     * Creates the property groups and options.
     *
     * @param ContainerInterface $container The Symfony container interface.
     * @param Context $context The Shopware context.
     */
    public function createPropertyGroup(ContainerInterface $container, Context $context): void
    {
        $this->propertyGroupRepository = $container->get('property_group.repository');
        $this->propertyGroupOptionRepository = $container->get('property_group_option.repository');

        $propertyGroupIds = [
            Uuid::randomHex(), // Property Group 1 ID
            Uuid::randomHex(), // Property Group 2 ID
            Uuid::randomHex(), // Property Group 3 ID
            Uuid::randomHex(), // Property Group 4 ID
        ];

        // Create the property groups
        $propertyGroupData = [
            [
                'id' => $propertyGroupIds[0],
                'name' => [
                    'de-DE' => 'Alkoholgehalt',
                    'en-GB' => 'Alcohol',
                ],
                'description' => [
                    'de-DE' => 'Alkoholgehalt',
                    'en-GB' => 'alcohol by volume',
                ],
                'sortingType' => 'alphanumeric',
                'displayType' => 'text',
                'filterable' => true,
            ],
            [
                'id' => $propertyGroupIds[1],
                'name' => [
                    'de-DE' => 'Restzuckergehalt',
                    'en-GB' => 'residual sugar content',
                ],
                'description' => [
                    'de-DE' => 'Restzuckergehalt',
                    'en-GB' => 'residual sugar content',
                ],
                'displayType' => 'text',
                'sortingType' => 'alphanumeric',
                'filterable' => true,
            ],
            [
                'id' => $propertyGroupIds[2],
                'name' => [
                    'de-DE' => 'Gesamtsäure',
                    'en-GB' => 'Acidity',
                ],
                'description' => [
                    'de-DE' => 'Gesamtsäure',
                    'en-GB' => 'Acidity',
                ],
                'displayType' => 'text',
                'sortingType' => 'alphanumeric',
                'filterable' => true,
            ],
            [
                'id' => $propertyGroupIds[3],
                'name' => [
                    'de-DE' => 'Tannine',
                    'en-GB' => 'tannins',
                ],
                'description' => [
                    'de-DE' => 'Tannine',
                    'en-GB' => 'tannins',
                ],
                'displayType' => 'text',
                'sortingType' => 'alphanumeric',
                'filterable' => true,
            ],
            // Add more property groups as needed
        ];

        foreach ($propertyGroupData as $index => $groupData) {
            $groupId = $propertyGroupIds[$index
