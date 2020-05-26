<?php
/**
 * User: nemishkor
 * Date: 28.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay;


use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\Entity\Order;
use Nemishkor\Wayforpay\ObjectValues\CheckStatusParams;
use Nemishkor\Wayforpay\ObjectValues\PurchaseRequestParams;

class RequestParamsFactory {

    /** @var string */
    private $merchantAccount;

    /** @var string */
    private $merchantDomainName;

    public function __construct(
        string $merchantAccount,
        string $merchantDomainName
    ) {
        $this->merchantAccount = $merchantAccount;
        $this->merchantDomainName = $merchantDomainName;
    }

    private function getMerchant(): Merchant {
        $merchant = new Merchant($this->merchantAccount);
        $merchant->setDomainName($this->merchantDomainName);

        return $merchant;
    }

    public function createPurchaseRequestParams(Order $order): PurchaseRequestParams {
        return new PurchaseRequestParams($this->getMerchant(), $order);
    }

    public function createCheckStatusRequestParams(Order $order): CheckStatusParams {
        return new CheckStatusParams($this->getMerchant(), $order);
    }

}
