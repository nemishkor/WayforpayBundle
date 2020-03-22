<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Merchant;


/**
 * Class TransactionSecureType
 * @package Nemishkor\Wayforpay\ObjectValues\Merchant
 * Type of safety for transaction completion
 */
abstract class TransactionSecureType {

    /** @var string */
    private $name;

    /** @var self */
    static private $auto;

    private function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string {
        return $this->name;
    }

    static private function ensureThatInitialized(): void {

        if (self::$auto !== null) {
            return;
        }

        self::$auto = new AutoTransactionSecureType('AUTO');

    }

    /**
     * @return TransactionSecureType
     */
    public static function auto(): TransactionSecureType {
        self::ensureThatInitialized();

        return self::$auto;
    }

}
