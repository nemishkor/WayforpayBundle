<?php
/**
 * User: nemishkor
 * Date: 26.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Order;


use DateInterval;
use DateTime;

interface OrderInterface {

    public function getReference(): int;

    public function getDate(): DateTime;

    public function getAmount(): float;

    public function getCurrency(): string;

    public function getAlternativeAmount(): ?float;

    public function getAlternativeCurrency(): ?string;

    public function getHoldTimeout(): DateInterval;

    public function getOrderTimeout(): ?DateInterval;

    public function getRecToken(): ?string;

    public function getProducts(): array;

    public function getClientAccountId(): ?string;

    public function getSocialUri(): ?string;

    public function getClient(): ?ContactInterface;

    public function getDelivery(): ?ContactInterface;

    public function getAvia(): ?Avia;

}
