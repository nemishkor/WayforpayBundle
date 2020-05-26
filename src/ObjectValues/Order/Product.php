<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Order;


class Product implements ProductInterface {

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var integer
     */
    private $count;

    public function __construct(string $name,float $price, int $count) {
        $this->name = $name;
        $this->price  =$price;
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCount(): int {
        return $this->count;
    }

}
