<?php
/**
 * User: nemishkor
 * Date: 28.05.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay\ObjectValues;


use DateTime;

class CheckStatusResponse {

    /**
     * Seller identifier
     * @var string|null
     */
    private $merchantAccount;

    /**
     * Unique number of the order in merchant’s system
     * @var string|null
     */
    private $orderReference;

    /**
     * hash_hmac
     * @var string|null
     */
    private $merchantSignature;

    /**
     * Amount of order
     * @var string|null
     */
    private $amount;

    /**
     * Currency of order
     * @var string|null
     */
    private $currency;

    /**
     * Authorization code - assigned by Bank
     * @var string|null
     */
    private $authCode;

    /**
     * Date of creation request  in psp (UTC)
     * @var DateTime|null
     */
    private $createdDate;

    /**
     * Date of transaction processing
     * @var DateTime|null
     */
    private $processingDate;

    /**
     * Masked card number
     * @var string|null
     */
    private $cardPan;

    /**
     * Card Type: Visa/MasterCard
     * @var string|null
     */
    private $cardType;

    /**
     * Country of card
     * @var string|null
     */
    private $issuerBankCountry;

    /**
     * Name of the issuer of the Bank Card
     * @var string|null
     */
    private $issuerBankName;

    /**
     * Transaction status
     * https://wiki.wayforpay.com/uk/view/852131
     * @var string|null
     */
    private $transactionStatus;

    /**
     * Reason for refusal
     * https://wiki.wayforpay.com/uk/view/852131
     * @var string|null
     */
    private $reason;

    /**
     * Code of refusal
     * https://wiki.wayforpay.com/uk/view/852131
     * @var integer|null
     */
    private $reasonCode;

    /**
     * Date for refund of transaction Merchant
     * @var DateTime|null
     */
    private $settlementDate;

    /**
     * Amount of settlement
     * @var string|null
     */
    private $settlementAmount;

    /**
     * Commission psp
     * @var string|null
     */
    private $fee;

    /**
     * Amount of all refunds
     * @var string|null
     */
    private $refundAmount;

    /**
     * @var string|null
     */
    private $baseAmount;

    /**
     * @var string|null
     */
    private $baseCurrency;

    /**
     * @return string|null
     */
    public function getMerchantAccount(): ?string {
        return $this->merchantAccount;
    }

    /**
     * @param string|null $merchantAccount
     */
    public function setMerchantAccount(?string $merchantAccount): void {
        $this->merchantAccount = $merchantAccount;
    }

    /**
     * @return string|null
     */
    public function getOrderReference(): ?string {
        return $this->orderReference;
    }

    /**
     * @param string|null $orderReference
     */
    public function setOrderReference(?string $orderReference): void {
        $this->orderReference = $orderReference;
    }

    /**
     * @return string|null
     */
    public function getMerchantSignature(): ?string {
        return $this->merchantSignature;
    }

    /**
     * @param string|null $merchantSignature
     */
    public function setMerchantSignature(?string $merchantSignature): void {
        $this->merchantSignature = $merchantSignature;
    }

    /**
     * @return string|null
     */
    public function getAmount(): ?string {
        return $this->amount;
    }

    /**
     * @param string|null $amount
     */
    public function setAmount(?string $amount): void {
        $this->amount = $amount;
    }

    /**
     * @return string|null
     */
    public function getCurrency(): ?string {
        return $this->currency;
    }

    /**
     * @param string|null $currency
     */
    public function setCurrency(?string $currency): void {
        $this->currency = $currency;
    }

    /**
     * @return string|null
     */
    public function getAuthCode(): ?string {
        return $this->authCode;
    }

    /**
     * @param string|null $authCode
     */
    public function setAuthCode(?string $authCode): void {
        $this->authCode = $authCode;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedDate(): ?DateTime {
        return $this->createdDate;
    }

    /**
     * @param DateTime|null $createdDate
     */
    public function setCreatedDate(?DateTime $createdDate): void {
        $this->createdDate = $createdDate;
    }

    /**
     * @return DateTime|null
     */
    public function getProcessingDate(): ?DateTime {
        return $this->processingDate;
    }

    /**
     * @param DateTime|null $processingDate
     */
    public function setProcessingDate(?DateTime $processingDate): void {
        $this->processingDate = $processingDate;
    }

    /**
     * @return string|null
     */
    public function getCardPan(): ?string {
        return $this->cardPan;
    }

    /**
     * @param string|null $cardPan
     */
    public function setCardPan(?string $cardPan): void {
        $this->cardPan = $cardPan;
    }

    /**
     * @return string|null
     */
    public function getCardType(): ?string {
        return $this->cardType;
    }

    /**
     * @param string|null $cardType
     */
    public function setCardType(?string $cardType): void {
        $this->cardType = $cardType;
    }

    /**
     * @return string|null
     */
    public function getIssuerBankCountry(): ?string {
        return $this->issuerBankCountry;
    }

    /**
     * @param string|null $issuerBankCountry
     */
    public function setIssuerBankCountry(?string $issuerBankCountry): void {
        $this->issuerBankCountry = $issuerBankCountry;
    }

    /**
     * @return string|null
     */
    public function getIssuerBankName(): ?string {
        return $this->issuerBankName;
    }

    /**
     * @param string|null $issuerBankName
     */
    public function setIssuerBankName(?string $issuerBankName): void {
        $this->issuerBankName = $issuerBankName;
    }

    /**
     * @return string|null
     */
    public function getTransactionStatus(): ?string {
        return $this->transactionStatus;
    }

    /**
     * @param string|null $transactionStatus
     */
    public function setTransactionStatus(?string $transactionStatus): void {
        $this->transactionStatus = $transactionStatus;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string {
        return $this->reason;
    }

    /**
     * @param string|null $reason
     */
    public function setReason(?string $reason): void {
        $this->reason = $reason;
    }

    /**
     * @return int|null
     */
    public function getReasonCode(): ?int {
        return $this->reasonCode;
    }

    /**
     * @param int|null $reasonCode
     */
    public function setReasonCode(?int $reasonCode): void {
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
     * @return string|null
     */
    public function getSettlementAmount(): ?string {
        return $this->settlementAmount;
    }

    /**
     * @param string|null $settlementAmount
     */
    public function setSettlementAmount(?string $settlementAmount): void {
        $this->settlementAmount = $settlementAmount;
    }

    /**
     * @return string|null
     */
    public function getFee(): ?string {
        return $this->fee;
    }

    /**
     * @param string|null $fee
     */
    public function setFee(?string $fee): void {
        $this->fee = $fee;
    }

    /**
     * @return string|null
     */
    public function getRefundAmount(): ?string {
        return $this->refundAmount;
    }

    /**
     * @param string|null $refundAmount
     */
    public function setRefundAmount(?string $refundAmount): void {
        $this->refundAmount = $refundAmount;
    }

    /**
     * @return string|null
     */
    public function getBaseAmount(): ?string {
        return $this->baseAmount;
    }

    /**
     * @param string|null $baseAmount
     */
    public function setBaseAmount(?string $baseAmount): void {
        $this->baseAmount = $baseAmount;
    }

    /**
     * @return string|null
     */
    public function getBaseCurrency(): ?string {
        return $this->baseCurrency;
    }

    /**
     * @param string|null $baseCurrency
     */
    public function setBaseCurrency(?string $baseCurrency): void {
        $this->baseCurrency = $baseCurrency;
    }

}
