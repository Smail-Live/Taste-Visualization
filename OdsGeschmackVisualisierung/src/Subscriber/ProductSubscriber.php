<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Subscriber;

use Onedrop\GeschmackVisualisierung\Services\GetConfigData;
use Shopware\Core\Content\Property\Aggregate\PropertyGroupOption\PropertyGroupOptionEntity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\Struct\ArrayStruct;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ProductSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private GetConfigData $configData,
        private EntityRepositoryInterface $propertyGroupRepository,
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            ProductPageLoadedEvent::class => 'onProductPageLoaded',
        ];
    }

    public function onProductPageLoaded(ProductPageLoadedEvent $event): void
    {
        $page = $event->getPage();
        $context = $event->getContext();

        // Get property cards from plugin config using Service class
        $configCards = $this->configData->getPropertiesConfig();

        // Declare The Validation arrays
        $tasteVisualizationData = [];

        // Load the property group from propertyGroupRepository
        foreach ($configCards as $card) {
            $propertyGroup = $card[0];
            $criteria = new Criteria([$propertyGroup]);
            $criteria->addAssociation('options');
            $criteria->addAssociation('translation');
            $propertyGroupEntity = $this->propertyGroupRepository->search($criteria, $context)->get($propertyGroup);

            /** @var PropertyGroupOptionEntity $propertyGroupEntity */
            $groupName = $propertyGroupEntity->getName();
            if (!$propertyGroupEntity) {
                continue;
            }

            // Get productId from the current page
            $product = $page->getProduct();

            // Load the property group from Product
            $productProperties = $product->getProperties()->getElements();

            $productPropertyOptionsName = [];
            foreach ($productProperties as $productProperty) {
                $productPropertyGroupId = $productProperty->getGroupId();
                if ($productPropertyGroupId === $propertyGroup) {
                    $productPropertyOptionsName[] = $productProperty->getName();
                }
            }

            if (!$productPropertyOptionsName) {
                continue;
            }

            // Get the Valid property Group
            $options = $propertyGroupEntity->getOptions();

            foreach ($options as $option) {
                $optionGroupsId = $option->getGroupId();
                $entityOptionsName = $option->getName();
                if ((\in_array($entityOptionsName, $productPropertyOptionsName, true)) && ($optionGroupsId === $propertyGroup)) {
                    $validOpt = $option->getName();
                    if ($validOpt !== '') {
                        // Indicator Calculation
                        $min = intval($card[1]);
                        $max = intval($card[2]);
                        $productPropertyValue = intval($validOpt);

                        if ($productPropertyValue < $min || $productPropertyValue > $max) {
                            // The productPropertyValue is out of range
                            break;
                        } else {
                            $indicator = round(($productPropertyValue - $min) / ($max - $min) * 100);
                            $tasteVisualizationData[] = [
                                'propertyGroup' => $groupName,
                                'indicator' => $indicator
                            ];

                        }
                    }
                    break;
                }
            }
        }
        $tasteVisualizationStruct = new ArrayStruct($tasteVisualizationData);
        $page->addExtension('odsGeschmackVisualisierung', $tasteVisualizationStruct);
    }
}
