<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Setup;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Installer
{
    protected mixed $propertyGroupRepository;

    private mixed $propertyGroupOptionRepository;

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
            $groupId = $propertyGroupIds[$index];

            // Check if property group exists
            $criteria = new Criteria([$groupId]);
            $existingGroup = $this->propertyGroupRepository->search($criteria, $context)->first();
            if (!$existingGroup) {
                if ($groupData['id'] = $groupId) {
                    $this->propertyGroupRepository->upsert([$groupData], $context);
                }
            } else {
                break;
            }
        }

        // Create the property group options

        $propertyGroup1OptionsData = [];

        for ($i = 5; $i <= 25; ++$i) {
            $name = $i . '%';

            $optionData1 = [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[0],
                'name' => $name,
                'position' => $i - 4,
            ];

            $propertyGroup1OptionsData[] = $optionData1;
        }
        $propertyGroup2OptionsData = [];

        for ($i = 1; $i <= 250; $i += 4) {
            $name = $i . 'g/l';

            $optionData2 = [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[1],
                'name' => $name,
                'position' => $i,
            ];

            $propertyGroup2OptionsData[] = $optionData2;
        }

        $propertyGroup3OptionsData = [];

        for ($i = 4; $i <= 10; $i += 1) {
            $name = $i . 'g/l';

            $optionData3 = [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[2],
                'name' => $name,
                'position' => $i - 3,
            ];

            $propertyGroup3OptionsData[] = $optionData3;
        }

        $propertyGroup4OptionsData = [
            [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[3],
                'name' => [
                    'de-DE' => 'low',
                    'en-GB' => 'niedrig',
                ],
                'position' => 1,
            ],
            [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[3],
                'name' => [
                    'de-DE' => 'medium',
                    'en-GB' => 'mittel',
                ],
                'position' => 2,
            ],
            [
                'id' => Uuid::randomHex(),
                'groupId' => $propertyGroupIds[3],
                'name' => [
                    'de-DE' => 'high',
                    'en-GB' => 'hoch',
                ],
                'position' => 3,
            ],
            // Add more  options as needed
        ];

        $this->propertyGroupOptionRepository->upsert($propertyGroup1OptionsData, $context);
        $this->propertyGroupOptionRepository->upsert($propertyGroup2OptionsData, $context);
        $this->propertyGroupOptionRepository->upsert($propertyGroup3OptionsData, $context);
        $this->propertyGroupOptionRepository->upsert($propertyGroup4OptionsData, $context);
    }
}
