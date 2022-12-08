<?php

namespace App\Infrastructure;

use App\Infrastructure\Exception\HttpClientWarehouseException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class HttpClientWarehouse
{
    public function __invoke(int $idRequest): int
    {
        $httpClient = HttpClient::create();

        try {
            $response = $httpClient->request('POST', 'http://25.4.246.193:7001/generateRequest', [
                'json' => ['id' => $idRequest]
            ]);
        } catch (TransportExceptionInterface) {
            throw new HttpClientWarehouseException("No se pudo conectar al almacén");
        }
        $content = $response->toArray();

        return $content['id'];
    }

}
