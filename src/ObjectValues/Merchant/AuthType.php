<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues\Merchant;


/**
 * Class AuthType
 * @package Nemishkor\Wayforpay\ObjectValues\Merchant
 * Authorization type
 */
abstract class AuthType {

    /** @var string */
    private $name;

    /** @var self */
    static private $simpleSignature;

    /** @var self */
    static private $ticket;

    /** @var self */
    static private $password;

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

        if (self::$simpleSignature !== null) {
            return;
        }

        self::$simpleSignature = new SimpleSignatureAuthType('simpleSignature');
        self::$ticket = new TicketAuthType('ticket');
        self::$password = new PasswordAuthType('password');

    }

    /**
     * @return AuthType
     */
    public static function simpleSignature(): AuthType {
        self::ensureThatInitialized();

        return self::$simpleSignature;
    }

    /**
     * @return AuthType
     */
    public static function ticket(): AuthType {
        self::ensureThatInitialized();

        return self::$ticket;
    }

    /**
     * @return AuthType
     */
    public static function password(): AuthType {
        self::ensureThatInitialized();

        return self::$password;
    }

}
