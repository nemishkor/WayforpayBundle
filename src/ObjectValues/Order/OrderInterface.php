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

    /**
     * Unique number of the order in merchant’s system
     *
     * @return int
     */
    public function getReference(): int;

    /**
     * Date of order placing
     *
     * @return DateTime
     */
    public function getDate(): DateTime;

    /**
     * Amount of order
     *
     * @return float
     */
    public function getAmount(): float;

    /**
     * Currency of order UAH
     *
     * @return string
     */
    public function getCurrency(): string;

    /**
     * Alternative amount of order
     *
     * @return float|null
     */
    public function getAlternativeAmount(): ?float;

    /**
     * Alternative currency of order (USD, EUR, RUR)
     *
     * @return string|null
     */
    public function getAlternativeCurrency(): ?string;

    /**
     * Period of validity of funds blocking in seconds. By default: 1 728 000 (20 days).
     *
     * @return DateInterval
     */
    public function getHoldTimeout(): DateInterval;

    /**
     * Sets the interval within which the order can be paid for
     *
     * @return DateInterval|null
     */
    public function getOrderTimeout(): ?DateInterval;

    /**
     * Card token for recurring withdrawals
     *
     * @return string|null
     */
    public function getRecToken(): ?string;

    /**
     * Array with the products of order
     *
     * @return array|ProductInterface[]
     */
    public function getProducts(): array;

    /**
     * Unique identifier in merchant’s system (login, email and etc.)
     *
     * @return string|null
     */
    public function getClientAccountId(): ?string;

    /**
     * @return string|null
     */
    public function getSocialUri(): ?string;

    /**
     * @return ContactInterface|null
     */
    public function getClient(): ?ContactInterface;

    /**
     * @return ContactInterface|null
     */
    public function getDelivery(): ?ContactInterface;

    /**
     * @return Avia|null
     */
    public function getAvia(): ?Avia;

}
