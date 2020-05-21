<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\Entity;


use DateInterval;
use DateTime;
use Nemishkor\Wayforpay\ObjectValues\Order\Avia;
use Nemishkor\Wayforpay\ObjectValues\Order\Contact;
use Nemishkor\Wayforpay\ObjectValues\Order\ContactInterface;
use Nemishkor\Wayforpay\ObjectValues\Order\Product;
use Nemishkor\Wayforpay\Validator\Order\HoldTimeout;

class Order {

    /**
     * Unique number of the order in merchant’s system
     *
     * @var int
     */
    private $reference;

    /**
     * Date of order placing
     *
     * @var DateTime
     */
    private $date;

    /**
     * Amount of order
     *
     * @var float
     */
    private $amount;

    /**
     * Currency of order UAH
     *
     * @var string
     */
    private $currency;

    /**
     * Alternative amount of order
     *
     * @var float|null
     */
    private $alternativeAmount;

    /**
     * Alternative currency of order (USD, EUR, RUR)
     *
     * @var string|null
     */
    private $alternativeCurrency;

    /**
     * Period of validity of funds blocking in seconds. By default: 1 728 000 (20 days).
     *
     * @var DateInterval
     * @HoldTimeout()
     */
    private $holdTimeout;

    /**
     * Sets the interval within which the order can be paid for
     *
     * @var DateInterval|null
     */
    private $orderTimeout;

    /**
     * Card token for recarring withdrawals
     *
     * @var string|null
     */
    private $recToken;

    /**
     * Array with the products of order
     *
     * @var Product[]
     */
    private $products;

    /**
     * Unique identifier in merchant’s system (login, email and etc.)
     *
     * @var string|null
     */
    private $clientAccountId;

    /**
     * @var string|null
     */
    private $socialUri;

    /**
     * @var ContactInterface|null
     */
    private $client;

    /**
     * @var Contact|null
     */
    private $delivery;

    /**
     * @var Avia|null
     */
    private $avia;

    public function __construct(
        int $reference,
        DateTime $date,
        string $currency,
        float $amount = 0.0
    ) {
        $this->reference = $reference;
        $this->date = $date;
        $this->currency = $currency;
        $this->amount = $amount;
        $this->holdTimeout = new DateInterval('P20D');
        $this->products = [];
    }

    /**
     * @return int
     */
    public function getReference(): int {
        return $this->reference;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime {
        return $this->date;
    }

    /**
     * @return float
     */
    public function getAmount(): float {
        return $this->amount;
    }

    /**
     * @param float $amount
     */
    public function setAmount(float $amount): void {
        $this->amount = $amount;
    }

    /**
     * @return string
     */
    public function getCurrency(): string {
        return $this->currency;
    }

    /**
     * @return float|null
     */
    public function getAlternativeAmount(): ?float {
        return $this->alternativeAmount;
    }

    /**
     * @param float|null $alternativeAmount
     */
    public function setAlternativeAmount(?float $alternativeAmount): void {
        $this->alternativeAmount = $alternativeAmount;
    }

    /**
     * @return string|null
     */
    public function getAlternativeCurrency(): ?string {
        return $this->alternativeCurrency;
    }

    /**
     * @param string|null $alternativeCurrency
     */
    public function setAlternativeCurrency(?string $alternativeCurrency): void {
        $this->alternativeCurrency = $alternativeCurrency;
    }

    /**
     * @return DateInterval
     */
    public function getHoldTimeout(): DateInterval {
        return $this->holdTimeout;
    }

    /**
     * @param DateInterval $holdTimeout
     */
    public function setHoldTimeout(DateInterval $holdTimeout): void {
        $this->holdTimeout = $holdTimeout;
    }

    /**
     * @return DateInterval|null
     */
    public function getOrderTimeout(): ?DateInterval {
        return $this->orderTimeout;
    }

    /**
     * @param DateInterval|null $orderTimeout
     */
    public function setOrderTimeout(?DateInterval $orderTimeout): void {
        $this->orderTimeout = $orderTimeout;
    }

    /**
     * @return string|null
     */
    public function getRecToken(): ?string {
        return $this->recToken;
    }

    /**
     * @param string|null $recToken
     */
    public function setRecToken(?string $recToken): void {
        $this->recToken = $recToken;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array {
        return $this->products;
    }

    /**
     * @param Product[] $products
     */
    public function setProducts(array $products): void {
        $this->products = $products;
    }

    /**
     * @return string|null
     */
    public function getClientAccountId(): ?string {
        return $this->clientAccountId;
    }

    /**
     * @param string|null $clientAccountId
     */
    public function setClientAccountId(?string $clientAccountId): void {
        $this->clientAccountId = $clientAccountId;
    }

    /**
     * @return string|null
     */
    public function getSocialUri(): ?string {
        return $this->socialUri;
    }

    /**
     * @param string|null $socialUri
     */
    public function setSocialUri(?string $socialUri): void {
        $this->socialUri = $socialUri;
    }

    /**
     * @return ContactInterface|null
     */
    public function getClient(): ?ContactInterface {
        return $this->client;
    }

    /**
     * @param ContactInterface|null $client
     */
    public function setClient(?ContactInterface $client): void {
        $this->client = $client;
    }

    /**
     * @return Contact|null
     */
    public function getDelivery(): ?Contact {
        return $this->delivery;
    }

    /**
     * @param Contact|null $delivery
     */
    public function setDelivery(?Contact $delivery): void {
        $this->delivery = $delivery;
    }

    /**
     * @return Avia|null
     */
    public function getAvia(): ?Avia {
        return $this->avia;
    }

    /**
     * @param Avia|null $avia
     */
    public function setAvia(?Avia $avia): void {
        $this->avia = $avia;
    }


}
