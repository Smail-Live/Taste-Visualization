<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Services;

use Shopware\Core\System\SystemConfig\SystemConfigService;

//This class is responsible for retrieving configuration data.
class GetConfigData
{
    private $systemConfigService;

    public function __construct(SystemConfigService $systemConfigService)
    {
        //SystemConfigService $systemConfigService The SystemConfigService used to retrieve the configuration data.
        
        $this->systemConfigService = $systemConfigService;
    }

    public function getPropertiesConfig(): array
    {
        // Retrieve the configuration data for 'OdsGeschmackVisualisierung.config'
        $config = $this->systemConfigService->get('OdsGeschmackVisualisierung.config');
        
        // Create arrays for each card with the respective configuration values
        $card1 = [
            $config['Property1'],
            $config['min1'],
            $config['max1'],
        ];
        $card2 = [
            $config['Property2'],
            $config['min2'],
            $config['max2'],
        ];
        $card3 = [
            $config['Property3'],
            $config['min3'],
            $config['max3'],
        ];
        $card4 = [
            $config['Property4'],
            $config['min4'],
            $config['max4'],
        ];

        // Create an array with the cards and return it
        $properties = [$card1, $card2, $card3, $card4];

        return $properties;
    }
}
