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
     * @var string
     */
    private $price;

    /**
     * @var integer
     */
    private $count;

    public function __construct(string $name, float $price, int $count) {
        $this->name = $name;
        $this->price = number_format($price, 2, '.', '');
        $this->count = $count;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrice(): string {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCount(): int {
        return $this->count;
    }

}
