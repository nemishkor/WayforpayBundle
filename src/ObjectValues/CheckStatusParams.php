<?php
/**
 * User: nemishkor
 * Date: 25.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues;


use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\ObjectValues\Merchant\TransactionType;
use Nemishkor\Wayforpay\ObjectValues\Order\OrderInterface;

class CheckStatusParams {

    /**
     * Seller
     * @var Merchant
     */
    private $merchant;

    /**
     * Order in merchant’s system
     * @var OrderInterface
     */
    private $order;

    public function __construct(Merchant $merchant, OrderInterface $order) {
        $this->merchant = $merchant;
        $this->order = $order;
        $this->merchant->setTransactionType(TransactionType::checkStatus());
    }

    /**
     * @return OrderInterface
     */
    public function getOrder(): OrderInterface {
        return $this->order;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant {
        return $this->merchant;
    }

}
