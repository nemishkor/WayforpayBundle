<?php
/**
 * User: nemishkor
 * Date: 26.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues;


use DateTime;
use Nemishkor\Wayforpay\Entity\Merchant;
use Nemishkor\Wayforpay\Entity\Order;

class CheckStatusResult {

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

    /**
     * @var string
     */
    private $merchantSignature;

    /**
     * Authorization code - assigned by Bank
     * @var string
     */
    private $authCode;

    /**
     * Date of creation request in psp (UTC)
     * @var DateTime
     */
    private $createdDate;

    /**
     * Date of transaction processing
     * @var DateTime
     */
    private $processingDate;

    /**
     * Masked card number
     * @var string
     */
    private $cardPan;

    /**
     * Card Type: Visa/MasterCard
     * @var string
     */
    private $cardType;

    /**
     * Country of card
     * @var string
     */
    private $issuerBankCountry;

    /**
     * Name of the issuer of the Bank Card
     * @var string
     */
    private $issuerBankName;

    /**
     * Transaction status
     * @var string
     */
    private $transactionStatus;

    /**
     * Reason for refusal
     * @var string
     */
    private $reason;

    /**
     * Code of refusal
     * @var string
     */
    private $reasonCode;

    /**
     * Date for refund of transaction Merchant
     * @var DateTime|null
     */
    private $settlementDate;

    /**
     * Amount of settlement
     * @var string
     */
    private $settlementAmount;

    /**
     * Commission psp
     * @var string
     */
    private $fee;

    /**
     * Amount of all refunds
     * @var string
     */
    private $refundAmount;

    /**
     * @return string
     */
    public function getMerchantSignature(): string {
        return $this->merchantSignature;
    }

    /**
     * @param string $merchantSignature
     */
    public function setMerchantSignature(string $merchantSignature): void {
        $this->merchantSignature = $merchantSignature;
    }

    /**
     * @return Merchant
     */
    public function getMerchant(): Merchant {
        return $this->merchant;
    }

    /**
     * @param Merchant $merchant
     */
    public function setMerchant(Merchant $merchant): void {
        $this->merchant = $merchant;
    }

    /**
     * @return Order
     */
    public function getOrder(): Order {
        return $this->order;
    }

    /**
     * @param Order $order
     */
    public function setOrder(Order $order): void {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getAuthCode(): string {
        return $this->authCode;
    }

    /**
     * @param string $authCode
     */
    public function setAuthCode(string $authCode): void {
        $this->authCode = $authCode;
    }

    /**
     * @return DateTime
     */
    public function getCreatedDate(): DateTime {
        return $this->createdDate;
    }

    /**
     * @param DateTime $createdDate
     */
    public function setCreatedDate(DateTime $createdDate): void {
        $this->createdDate = $createdDate;
    }

    /**
     * @return DateTime
     */
    public function getProcessingDate(): DateTime {
        return $this->processingDate;
    }

    /**
     * @param DateTime $processingDate
     */
    public function setProcessingDate(DateTime $processingDate): void {
        $this->processingDate = $processingDate;
    }

    /**
     * @return string
     */
    public function getCardPan(): string {
        return $this->cardPan;
    }

    /**
     * @param string $cardPan
     */
    public function setCardPan(string $cardPan): void {
        $this->cardPan = $cardPan;
    }

    /**
     * @return string
     */
    public function getCardType(): string {
        return $this->cardType;
    }

    /**
     * @param string $cardType
     */
    public function setCardType(string $cardType): void {
        $this->cardType = $cardType;
    }

    /**
     * @return string
     */
    public function getIssuerBankCountry(): string {
        return $this->issuerBankCountry;
    }

    /**
     * @param string $issuerBankCountry
     */
    public function setIssuerBankCountry(string $issuerBankCountry): void {
        $this->issuerBankCountry = $issuerBankCountry;
    }

    /**
     * @return string
     */
    public function getIssuerBankName(): string {
        return $this->issuerBankName;
    }

    /**
     * @param string $issuerBankName
     */
    public function setIssuerBankName(string $issuerBankName): void {
        $this->issuerBankName = $issuerBankName;
    }

    /**
     * @return string
     */
    public function getTransactionStatus(): string {
        return $this->transactionStatus;
    }

    /**
     * @param string $transactionStatus
     */
    public function setTransactionStatus(string $transactionStatus): void {
        $this->transactionStatus = $transactionStatus;
    }

    /**
     * @return string
     */
    public function getReason(): string {
        return $this->reason;
    }

    /**
     * @param string $reason
     */
    public function setReason(string $reason): void {
        $this->reason = $reason;
    }

    /**
     * @return string
     */
    public function getReasonCode(): string {
        return $this->reasonCode;
    }

    /**
     * @param string $reasonCode
     */
    public function setReasonCode(string $reasonCode): void {
        $this->reasonCode = $reasonCode;
    }

    /**
     * @return DateTime|null
     */
    public function getSettlementDate(): ?DateTime {
        return $this->settlementDate;
    }

    /**
     * @param DateTime|null $settlementDate
     */
    public function setSettlementDate(?DateTime $settlementDate): void {
        $this->settlementDate = $settlementDate;
    }

    /**
     * @return string
     */
    public function getSettlementAmount(): string {
        return $this->settlementAmount;
    }

    /**
     * @param string $settlementAmount
     */
    public function setSettlementAmount(string $settlementAmount): void {
        $this->settlementAmount = $settlementAmount;
    }

    /**
     * @return string
     */
    public function getFee(): string {
        return $this->fee;
    }

    /**
     * @param string $fee
     */
    public function setFee(string $fee): void {
        $this->fee = $fee;
    }

    /**
     * @return string
     */
    public function getRefundAmount(): string {
        return $this->refundAmount;
    }

    /**
     * @param string $refundAmount
     */
    public function setRefundAmount(string $refundAmount): void {
        $this->refundAmount = $refundAmount;
    }

}
