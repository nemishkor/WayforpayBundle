<?php
/**
 * User: nemishkor
 * Date: 28.03.20
 */

declare(strict_types=1);


namespace Nemishkor\Wayforpay;


use Nemishkor\Wayforpay\ObjectValues\Order\Product;
use Nemishkor\Wayforpay\ObjectValues\PurchaseRequestParams;

class WayforpayRequestBuilder {

    private $merchantSecret;

    public function __construct(
        string $merchantSecret
    ) {
        $this->merchantSecret = $merchantSecret;
    }

    public function getPurchaseRequestFlatContentParams(PurchaseRequestParams $params): array {

        $body = [
            'merchantAccount' => $params->getMerchant()->getAccount(),
            'merchantAuthType' => $params->getMerchant()->getAuthType()->getName(),
            'merchantDomainName' => $params->getMerchant()->getDomainName(),
            'merchantTransactionType' => $params->getMerchant()->getTransactionType()->getName(),
            'merchantTransactionSecureType' => $params->getMerchant()->getTransactionSecureType()->getName(),
            'language' => $params->getLanguage(),
            'orderReference' => $params->getOrder()->getReference(),
            'orderDate' => $params->getOrder()->getDate()->getTimestamp(),
            'amount' => $params->getOrder()->getAmount(),
            'currency' => $params->getOrder()->getCurrency(),
            'holdTimeout' => abs((new \DateTime())->add($params->getOrder()->getHoldTimeout())->getTimestamp() - (new \DateTime)->getTimestamp()),
            'productName' => array_map(
                static function(Product $product) {
                    return $product->getName();
                },
                $params->getOrder()->getProducts()
            ),
            'productPrice' => array_map(
                static function(Product $product): string {
                    return (string) $product->getPrice();
                },
                $params->getOrder()->getProducts()
            ),
            'productCount' => array_map(
                static function(Product $product): string {
                    return (string) $product->getCount();
                },
                $params->getOrder()->getProducts()
            ),
        ];

        if ($params->getReturnUrl() !== null) {
            $body['returnUrl'] = $params->getReturnUrl();
        }

        if ($params->getServiceUrl() !== null) {
            $body['serviceUrl'] = $params->getServiceUrl();
        }

        if ($params->getPaymentSystems() !== null) {
            $body['paymentSystems'] = implode(';', $params->getPaymentSystems());
        }

        if ($params->getDefaultPaymentSystem() !== null) {
            $body['defaultPaymentSystem'] = $params->getDefaultPaymentSystem();
        }

        if ($params->getOrder()->getAlternativeAmount() !== null) {
            $body['alternativeAmount'] = $params->getOrder()->getAlternativeAmount();
        }

        if ($params->getOrder()->getAlternativeCurrency() !== null) {
            $body['alternativeCurrency'] = $params->getOrder()->getAlternativeCurrency();
        }

        if ($params->getOrder()->getOrderTimeout() !== null) {
            $body['orderTimeout'] = abs((new \DateTime())->add($params->getOrder()->getOrderTimeout())->getTimestamp() - (new \DateTime)->getTimestamp());
        }

        if ($params->getOrder()->getRecToken() !== null) {
            $body['recToken'] = $params->getOrder()->getRecToken();
        }

        if ($params->getOrder()->getClientAccountId() !== null) {
            $body['clientAccountId'] = $params->getOrder()->getClientAccountId();
        }

        if ($params->getOrder()->getSocialUri() !== null) {
            $body['socialUri'] = $params->getOrder()->getSocialUri();
        }

        if ($params->getOrder()->getClient() !== null) {
            $body['clientFirstName'] = $params->getOrder()->getClient()->getFirstName();
            $body['clientLastName'] = $params->getOrder()->getClient()->getLastName();
            $body['clientAddress'] = $params->getOrder()->getClient()->getAddress();
            $body['clientCity'] = $params->getOrder()->getClient()->getCity();
            $body['clientState'] = $params->getOrder()->getClient()->getState();
            $body['clientZipCode'] = $params->getOrder()->getClient()->getZipCode();
            $body['clientCountry'] = $params->getOrder()->getClient()->getCountry();
            $body['clientEmail'] = $params->getOrder()->getClient()->getEmail();
            $body['clientPhone'] = $params->getOrder()->getClient()->getPhone();
        }

        if ($params->getOrder()->getClient() === null && $params->getOrder()->getDelivery() !== null) {
            $body['clientFirstName'] = $params->getOrder()->getDelivery()->getFirstName();
            $body['clientLastName'] = $params->getOrder()->getDelivery()->getLastName();
            $body['clientAddress'] = $params->getOrder()->getDelivery()->getAddress();
            $body['clientCity'] = $params->getOrder()->getDelivery()->getCity();
            $body['clientState'] = $params->getOrder()->getDelivery()->getState();
            $body['clientZipCode'] = $params->getOrder()->getDelivery()->getZipCode();
            $body['clientCountry'] = $params->getOrder()->getDelivery()->getCountry();
            $body['clientEmail'] = $params->getOrder()->getDelivery()->getEmail();
            $body['clientPhone'] = $params->getOrder()->getDelivery()->getPhone();
        }

        if ($params->getOrder()->getDelivery() !== null) {
            $body['deliveryFirstName'] = $params->getOrder()->getDelivery()->getFirstName();
            $body['deliveryLastName'] = $params->getOrder()->getDelivery()->getLastName();
            $body['deliveryAddress'] = $params->getOrder()->getDelivery()->getAddress();
            $body['deliveryCity'] = $params->getOrder()->getDelivery()->getCity();
            $body['deliveryState'] = $params->getOrder()->getDelivery()->getState();
            $body['deliveryZipCode'] = $params->getOrder()->getDelivery()->getZipCode();
            $body['deliveryCountry'] = $params->getOrder()->getDelivery()->getCountry();
            $body['deliveryEmail'] = $params->getOrder()->getDelivery()->getEmail();
            $body['deliveryPhone'] = $params->getOrder()->getDelivery()->getPhone();
        }

        if ($params->getOrder()->getAvia() !== null) {
            $body['aviaDepartureDate'] = $params->getOrder()->getAvia()->getDepartureDate();
            $body['aviaLocationNumber'] = $params->getOrder()->getAvia()->getLocationNumber();
            $body['aviaLocationCodes'] = $params->getOrder()->getAvia()->getLocationCodes();
            $body['aviaFirstName'] = $params->getOrder()->getAvia()->getFirstName();
            $body['aviaLastName'] = $params->getOrder()->getAvia()->getLastName();
            $body['aviaReservationCode'] = $params->getOrder()->getAvia()->getReservationCode();
        }

        $paramsForSignature = array_merge(
            [
                $body['merchantAccount'],
                $body['merchantDomainName'],
                $body['orderReference'],
                $body['orderDate'],
                $body['amount'],
                $body['currency'],
            ],
            $body['productName'],
            $body['productCount'],
            $body['productPrice']
        );

        $body['merchantSignature'] = $this->calculateSignature($paramsForSignature);

        return $body;
    }

    /**
     * @param array $params
     * @return string
     */
    private function calculateSignature(array $params): string {
        return hash_hmac("md5", implode(';', $params), $this->merchantSecret);
    }

}
