<?php declare(strict_types=1);

namespace Onedrop\GeschmackVisualisierung\Entities\twoDimensionalPropertiesConfig;

use Shopware\Core\Framework\DataAbstractionLayer\Entity;
use Shopware\Core\Framework\DataAbstractionLayer\EntityIdTrait;

class twoDimensionalPropertiesConfig extends Entity
{
    use EntityIdTrait;


    /**
     * @var string
     */
    protected $productId;

    /**
     * @var string
     */
    protected $token;

    /**
     * @var string|null
     */
    protected $propertyOne;

    /**
     * @var string|null
     */
    protected $propertyTwo;

    /**
     * @var string|null
     */
    protected $procentValue;

    /**
     * @var string|null
     */
    protected $indicator;

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getProductId(): string
    {
        return $this->productId;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function setProductId(string $productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getPropertyOne(): string
    {
        return $this->propertyOne;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */

    public function setPropertyOne(string $propertyOne): void
    {
        $this->propertyOne = $propertyOne;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getPropertyTwo(): string
    {
        return $this->propertyTwo;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */

    public function setPropertyTwo(string $propertyTwo): void
    {
        $this->propertyTwo = $propertyTwo;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getProcentValue(): string
    {
        return $this->procentValue;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */

    public function setProcentValue(string $procentValue): void
    {
        $this->procentValue = $procentValue;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function getIndicator(): string
    {
        return $this->indicator;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */

    public function setIndicator(string $indicator): void
    {
        $this->indicator = $indicator;
    }

    /**
     * @psalm-suppress PossiblyUnusedMethod
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}

