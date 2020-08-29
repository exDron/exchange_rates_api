<?php
namespace App\Controller;

use App\Service\ExchangeRateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api", name="api_")
 *
 */
class ApiController extends AbstractController
{
    /**
     * @Route("/rates", name="rates", methods={"GET"})
     * @param ExchangeRateService $exchangeRateService
     *
     * @return JsonResponse
     */
    public function rates(ExchangeRateService $exchangeRateService): JsonResponse
    {
        $rates = $exchangeRateService->getCurrenciesRates('USD,RUB,CNY', 'EUR');

        return new JsonResponse($rates);
    }
}