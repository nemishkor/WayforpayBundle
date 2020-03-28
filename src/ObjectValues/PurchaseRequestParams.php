<?php

declare(strict_types=1);

namespace Nemishkor\Wayforpay\ObjectValues;


use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\Entity\Order;
use Symfony\Component\Validator\Constraints;

class PurchaseRequestParams {

    /**
     * @var Merchant
     */
    private $merchant;

    /**
     * Language of payment page.
     *
     * @var string
     * @Constraints\Choice(choices={"AUTO", "RU", "UA", "EN"})
     */
    private $language;

    /**
     * URL, to which the system has to transfer client with the payment result.
     * In case of absence of parameter readdressing is performed to the page of payment result checkout psp
     *
     * @var string|null
     */
    private $returnUrl;

    /**
     * URL, to which the system has to send a response with the payment result directly to the merchant
     *
     * @var string|null
     */
    private $serviceUrl;

    /**
     * @var Order
     */
    private $order;

    /**
     * The list of payment systems available for client in case of selection of payment method at the payment page.
     * On default all the payment systems allowed for the merchant are available for client.
     *
     * @var string[]|null
     */
    private $paymentSystems;

    /**
     * Payment system that will be first represented for the payer at payment page.
     * On default - card
     *
     * @var string|null
     */
    private $defaultPaymentSystem;

    public function __construct(
        Merchant $merchant,
        Order $order
    ) {
        $this->merchant = $merchant;
        $this->language = 'AUTO';
        $this->order = $order;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant {
        return $this->merchant;
    }

    /**
     * @return string
     */
    public function getLanguage(): string {
        return $this->language;
    }

    /**
     * @param string $language
     */
    public function setLanguage(string $language): void {
        $this->language = $language;
    }

    /**
     * @return string|null
     */
    public function getReturnUrl(): ?string {
        return $this->returnUrl;
    }

    /**
     * @param string|null $returnUrl
     */
    public function setReturnUrl(?string $returnUrl): void {
        $this->returnUrl = $returnUrl;
    }

    /**
     * @return string|null
     */
    public function getServiceUrl(): ?string {
        return $this->serviceUrl;
    }

    /**
     * @param string|null $serviceUrl
     */
    public function setServiceUrl(?string $serviceUrl): void {
        $this->serviceUrl = $serviceUrl;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order {
        return $this->order;
    }

    /**
     * @return string[]|null
     */
    public function getPaymentSystems(): ?array {
        return $this->paymentSystems;
    }

    /**
     * @param string[]|null $paymentSystems
     */
    public function setPaymentSystems(?array $paymentSystems): void {
        $this->paymentSystems = $paymentSystems;
    }

    /**
     * @return string|null
     */
    public function getDefaultPaymentSystem(): ?string {
        return $this->defaultPaymentSystem;
    }

    /**
     * @param string|null $defaultPaymentSystem
     */
    public function setDefaultPaymentSystem(?string $defaultPaymentSystem): void {
        $this->defaultPaymentSystem = $defaultPaymentSystem;
    }

}
