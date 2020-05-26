<?php

declare(strict_types=1);

namespace Nemishkor\Wayforpay;


use Nemishkor\Wayforpay\Entity\Order;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class Wayforpay {

    /** @var RequestParamsFactory */
    private $requestParamsFactory;

    /** @var WayforpayRequestBuilder */
    private $requestBuilder;

    /** @var HttpClientInterface */
    private $httpClient;

    private $baseUrl = 'https://api.wayforpay.com/api';

    public function __construct(
        RequestParamsFactory $requestParamsFactory,
        WayforpayRequestBuilder $requestBuilder,
        HttpClientInterface $httpClient
    ) {
        $this->requestParamsFactory = $requestParamsFactory;
        $this->requestBuilder = $requestBuilder;
        $this->httpClient = $httpClient;
    }

    /**
     * @param Order $order
     * @return ResponseInterface
     * @throws TransportExceptionInterface
     */
    public function checkStatus(Order $order): ResponseInterface {

        $paramsFlatArray = $this->requestBuilder->getCheckStatusParamsArray(
            $this->requestParamsFactory->createCheckStatusRequestParams($order)
        );

        return $this->httpClient->request(
            'POST',
            $this->baseUrl,
            ['body' => http_build_query($paramsFlatArray)]
        );
    }

}
