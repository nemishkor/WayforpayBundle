<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Merchant;


abstract class TransactionType {

    /** @var string */
    private $name;

    /** @var self */
    static private $auto;

    /** @var self */
    static private $auth;

    /** @var self */
    static private $sale;

    /** @var self */
    static private $checkStatus;

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

        self::$auto = new AutoTransactionType('AUTO');
        self::$auth = new AuthTransactionType('AUTH');
        self::$sale = new SaleTransactionType('SALE');
        self::$checkStatus = new SaleTransactionType('CHECK_STATUS');

    }

    /**
     * @return TransactionType
     */
    public static function auto(): TransactionType {
        self::ensureThatInitialized();

        return self::$auto;
    }

    /**
     * @return TransactionType
     */
    public static function auth(): TransactionType {
        self::ensureThatInitialized();

        return self::$auth;
    }

    /**
     * @return TransactionType
     */
    public static function sale(): TransactionType {
        self::ensureThatInitialized();

        return self::$sale;
    }

    /**
     * @return TransactionType
     */
    public static function checkStatus(): TransactionType {
        self::ensureThatInitialized();

        return self::$checkStatus;
    }

}
