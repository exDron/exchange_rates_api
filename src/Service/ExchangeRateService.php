<?php


namespace App\Service;


use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ExchangeRateService
{
    private HttpClientInterface $httpClient;

    private const API_URL = 'https://api.exchangeratesapi.io/latest';

    /**
     * ExchangeRateService constructor.
     *
     * @param HttpClientInterface $httpClient
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param string $currencies
     * @param string $base
     *
     * @return array
     */
    public function getCurrenciesRates(string $currencies, string $base): array
    {
        $data = [
            'error' => 'Something wrong with API request!',
        ];

        try {
            $response = $this->httpClient->request(
                'GET',
                self::API_URL,
                [
                    'query' => [
                        'symbols' => $currencies,
                        'base' => $base,
                    ],
                    'headers' => [
                        'Accept' => 'application/json',
                    ],
                ],
            );

            $statusCode = $response->getStatusCode();

            if ($statusCode === 200) {
                $data = $response->toArray();
            }

        } catch (TransportExceptionInterface $e) {
        } catch (ClientExceptionInterface $e) {
        } catch (RedirectionExceptionInterface $e) {
        } catch (ServerExceptionInterface $e) {
        } catch (DecodingExceptionInterface $e) {
        }

        return $data;
    }
}