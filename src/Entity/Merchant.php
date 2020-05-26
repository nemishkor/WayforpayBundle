<?php
/**
 * User: nemishkor
 * Date: 22.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\Entity;


use Nemishkor\Wayforpay\ObjectValues\Merchant\AuthType;
use Nemishkor\Wayforpay\ObjectValues\Merchant\TransactionSecureType;
use Nemishkor\Wayforpay\ObjectValues\Merchant\TransactionType;
use Symfony\Component\Validator\Constraints;

class Merchant {

    /**
     * Seller identifier. This value is assigned to You from the side of WayForPay
     *
     * @var string
     * @Constraints\NotBlank()
     */
    private $account;

    /**
     * Authorization type
     *
     * @var AuthType
     */
    private $authType;

    /**
     * Domain name of merchant’s web-site
     *
     * @var string
     * @Constraints\NotBlank()
     */
    private $domainName;

    /**
     * Transaction type
     *
     * @var TransactionType
     */
    private $transactionType;

    /**
     * Type of safety for transaction completion
     *
     * @var TransactionSecureType
     */
    private $transactionSecureType;

    public function __construct(
        string $account
    ) {
        $this->account = $account;
        $this->authType = AuthType::simpleSignature();
        $this->transactionType = TransactionType::auto();
        $this->transactionSecureType = TransactionSecureType::auto();
    }

    /**
     * @return string
     */
    public function getAccount(): string {
        return $this->account;
    }

    /**
     * @return AuthType
     */
    public function getAuthType(): AuthType {
        return $this->authType;
    }

    /**
     * @param AuthType $authType
     */
    public function setAuthType(AuthType $authType): void {
        $this->authType = $authType;
    }

    /**
     * @return string
     */
    public function getDomainName(): string {
        return $this->domainName;
    }

    /**
     * @param TransactionType $transactionType
     */
    public function setTransactionType(TransactionType $transactionType): void {
        $this->transactionType = $transactionType;
    }

    /**
     * @return TransactionType
     */
    public function getTransactionType(): TransactionType {
        return $this->transactionType;
    }

    /**
     * @param TransactionSecureType $transactionSecureType
     */
    public function setTransactionSecureType(TransactionSecureType $transactionSecureType): void {
        $this->transactionSecureType = $transactionSecureType;
    }

    /**
     * @return TransactionSecureType
     */
    public function getTransactionSecureType(): TransactionSecureType {
        return $this->transactionSecureType;
    }

    /**
     * @param string $domainName
     */
    public function setDomainName(string $domainName): void {
        $this->domainName = $domainName;
    }

}
