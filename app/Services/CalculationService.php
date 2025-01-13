<?php

namespace App\Services;

use PSpell\Config;
use SoapClient;
use Illuminate\Support\Facades\Config as FacadesConfig;
use Illuminate\Support\Facades\Cache;

class CalculationService
{
    protected $client;

    public function __construct()
    {
        // Initialize the SOAP client
        $this->client = new SoapClient(FacadesConfig::get('services.calculation.url'));
    }

    /**
     * Add two numbers.
     *
     * @param int $intA
     * @param int $intB
     * @return int
     */
    public function add(int $intA, int $intB): int
    {
        $params = [
            'intA' => $intA,
            'intB' => $intB,
        ];

        return $this->client->__soapCall('Add', [$params])->AddResult;
    }

    /**
     * Subtract two numbers.
     *
     * @param int $intA
     * @param int $intB
     * @return int
     */
    public function subtract(int $intA, int $intB): int
    {
        $params = [
            'intA' => $intA,
            'intB' => $intB,
        ];

        return $this->client->__soapCall('Subtract', [$params])->SubtractResult;
    }

    // TODO: Implement cache methods for multiply
    /**
     * Multiply two numbers.
     *
     * @param int $intA
     * @param int $intB
     * @return int
     */
    // public function multiply(int $intA, int $intB): int
    // {
    //     $params = [
    //         'intA' => $intA,
    //         'intB' => $intB,
    //     ];

    //     return $this->client->__soapCall('Multiply', [$params])->MultiplyResult;
    // }

    public function multiply($a, $b)
    {
        // Generate a unique cache key
        $cacheKey = "multiply_{$a}_{$b}";

        // Attempt to fetch from cache, or call the API if not cached
        return Cache::remember($cacheKey, now()->addMinutes(10), function () use ($a, $b) {
            $response = $this->client->__soapCall('Multiply', [
                'parameters' => [
                    'intA' => $a,
                    'intB' => $b,
                ],
            ]);

            return $response->MultiplyResult ?? null;
        });
    }

    /**
     * Divide two numbers.
     *
     * @param int $intA
     * @param int $intB
     * @return float
     */
    public function divide(int $intA, int $intB): float
    {
        $params = [
            'intA' => $intA,
            'intB' => $intB,
        ];

        return $this->client->__soapCall('Divide', [$params])->DivideResult;
    }
}
