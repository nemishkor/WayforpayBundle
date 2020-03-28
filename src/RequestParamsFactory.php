<?php
/**
 * User: nemishkor
 * Date: 28.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay;


use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\Entity\Order;
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

    public function createPurchaseRequestParams(Order $order): PurchaseRequestParams {

        $merchant = new Merchant($this->merchantAccount, $this->merchantDomainName);

        return new PurchaseRequestParams(
            $merchant,
            $order
        );
    }

}
