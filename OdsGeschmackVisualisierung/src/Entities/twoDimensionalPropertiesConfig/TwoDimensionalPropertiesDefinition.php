<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Entities\twoDimensionalPropertiesConfig;

use Shopware\Core\Framework\DataAbstractionLayer\EntityDefinition;
use Shopware\Core\Framework\DataAbstractionLayer\Field\BoolField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\PrimaryKey;
use Shopware\Core\Framework\DataAbstractionLayer\Field\Flag\Required;
use Shopware\Core\Framework\DataAbstractionLayer\Field\IdField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\JsonField;
use Shopware\Core\Framework\DataAbstractionLayer\Field\StringField;
use Shopware\Core\Framework\DataAbstractionLayer\FieldCollection;

class TwoDimensionalPropertiesDefinition extends EntityDefinition
{
    public const ENTITY_NAME = 'two_dimensional_properties';

    public function getEntityName(): string
    {
        return self::ENTITY_NAME;
    }
    protected function defineFields(): FieldCollection
    {
        return new FieldCollection([
            (new IdField('id', 'id'))->addFlags(new PrimaryKey(), new Required()),
            new BoolField('property_id', 'propertyId'),
            new StringField('token', 'token'),
            new StringField('property_one', 'propertyOne'),
            new StringField('property_two', 'property_two'),
            new StringField('value', 'value'),
            new StringField('indicator', 'indicator'),
        ]);
    }
}

