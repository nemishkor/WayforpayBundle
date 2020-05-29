<?php

declare(strict_types=1);

namespace Nemishkor\Wayforpay;


use DateTime;
use Nemishkor\Wayforpay\ObjectValues\CheckStatusResponse;
use Nemishkor\Wayforpay\ObjectValues\Order\OrderInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\Exception\JsonException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PropertyAccess\PropertyAccessorInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Wayforpay {

    private $baseUrl = 'https://api.wayforpay.com/api';

    /** @var RequestParamsFactory */
    private $requestParamsFactory;

    /** @var WayforpayRequestBuilder */
    private $requestBuilder;

    /** @var HttpClientInterface */
    private $httpClient;

    /** @var PropertyAccessorInterface */
    private $propertyAccessor;

    /** @var LoggerInterface $logger */
    private $logger;

    public function __construct(
        RequestParamsFactory $requestParamsFactory,
        WayforpayRequestBuilder $requestBuilder,
        HttpClientInterface $httpClient,
        PropertyAccessorInterface $propertyAccessor,
        LoggerInterface $logger
    ) {
        $this->requestParamsFactory = $requestParamsFactory;
        $this->requestBuilder = $requestBuilder;
        $this->httpClient = $httpClient;
        $this->propertyAccessor = $propertyAccessor;
        $this->logger = $logger;
    }

    /**
     * @param OrderInterface $order
     * @return CheckStatusResponse
     * @throws ClientExceptionInterface
     * @throws JsonException
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws \Exception
     */
    public function checkStatus(OrderInterface $order): CheckStatusResponse {

        $paramsFlatArray = $this->requestBuilder->getCheckStatusParamsArray(
            $this->requestParamsFactory->createCheckStatusRequestParams($order)
        );

        $apiResponse = $this->httpClient->request(
            'POST',
            $this->baseUrl,
            ['json' => $paramsFlatArray]
        );

        $content = json_decode($apiResponse->getContent(false), true);

        if ($content === false) {
            throw new JsonException(sprintf('Can not decode string: %s', $apiResponse->getContent(false)));
        }

        $this->logger->debug(
            sprintf(
                'Response: ' . $apiResponse->getContent(false)
            )
        );

        $content = (new OptionsResolver())
            ->setRequired(
                [
                    'merchantAccount',
                    'orderReference',
                    'merchantSignature',
                    'currency',
                    'authCode',
                    'createdDate',
                    'processingDate',
                    'cardPan',
                    'cardType',
                    'issuerBankCountry',
                    'issuerBankName',
                    'transactionStatus',
                    'reason',
                    'reasonCode',
                    'settlementDate',
                    'settlementAmount',
                    'fee',
                    'refundAmount',
                ]
            )
            ->setDefined(
                [
                    'amount',
                    'baseAmount',
                    'baseCurrency',
                ]
            )
            ->resolve($content);

        $response = new CheckStatusResponse();

        foreach ($content as $field => $value) {
            switch ($field) {
                case 'createdDate':
                case 'processingDate':
                case 'settlementDate':
                    $this->propertyAccessor->setValue(
                        $response,
                        $field,
                        is_string($value) && strlen($value) === 0 ? null : new DateTime("@" . $value)
                    );
                    break;
                case 'issuerBankCountry':
                    $this->propertyAccessor->setValue(
                        $response,
                        $field,
                        is_string($value) && strlen($value) === 0 ? null : $value
                    );
                    break;
                default:
                    $this->propertyAccessor->setValue($response, $field, $value);
                    break;
            }
        }

        return $response;
    }

}
