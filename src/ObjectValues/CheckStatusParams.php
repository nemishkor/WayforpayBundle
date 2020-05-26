<?php
/**
 * User: nemishkor
 * Date: 25.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues;


use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\Entity\Order;
use Nemishkor\Wayforpay\ObjectValues\Merchant\TransactionType;

class CheckStatusParams {

    /**
     * Seller
     * @var Merchant
     */
    private $merchant;

    /**
     * Order in merchant’s system
     * @var Order
     */
    private $order;

    public function __construct(Merchant $merchant, Order $order) {
        $this->merchant = $merchant;
        $this->order = $order;
        $this->merchant->setTransactionType(TransactionType::checkStatus());
    }

    /**
     * @return Order
     */
    public function getOrder(): Order {
        return $this->order;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant {
        return $this->merchant;
    }

}
