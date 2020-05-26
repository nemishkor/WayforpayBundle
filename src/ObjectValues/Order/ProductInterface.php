<?php
/**
 * User: nemishkor
 * Date: 26.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Order;


interface ProductInterface {

    public function getName(): string;

    public function getPrice(): float;

    public function getCount(): int;

}
