<?php

declare(strict_types=1);

date_default_timezone_set('America/La_Paz');

/**
 * Configuracion SIAT centralizada.
 * Ajusta aqui CUIS/CUFD por punto de venta (0 y 1).
 */
function obtenerDatosSiat(int $codigoPuntoVenta): array
{
    $config = [
        'nit' => '5744789016',
        'token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJkaXZpbmFwMzEyMUBnbWFpbC5jb20iLCJjb2RpZ29TaXN0ZW1hIjoiMzc0NEU1QTFGMkIxNDYyQjQyRUUiLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0xTnpFeHQ3QTBNRFFEQUJWVUtsSUtBQUFBIiwiaWQiOjUyMDY4ODYsImV4cCI6MTc5ODcwNTcwNSwiaWF0IjoxNzkwODU3Njc1LCJuaXREZWxlZ2FkbyI6NTc0NDc4OTAxNiwic3Vic2lzdGVtYSI6IlNGRSJ9.SQ4YLB9eQEsQBMoEc2R14fP3rSv_SO6voH4CDgBwLmGs40ONKEUQ_n8JY2NezN-rIaqYvKvkaLarTrLET7Sktg',
        'codigoAmbiente' => 2,
        'codigoSistema' => '3744E5A1F2B1462B42EE',
        'codigoSucursal' => 0,
        'codigoModalidad' => 2,
        'puntosVenta' => [
            0 => [
                'cuis' => '19E5079E',
                'cufd' => 'VBQUFBQi9fZUhBI0MTcwQkJGMkM2Q3nDmlhHRGJKYVMjI4NTRDREM4M0',
                'codigoControl' => '93D430E2743BF74',
            ],
            1 => [
                'cuis' => '619326BD',
                'cufd' => 'JBQUFCL19lSEE=I0MTcwQkJGMkM2Q0ttekdEYkphVUMjI4NTRDREM4M0',
                'codigoControl' => '35FF90E2743BF74',
            ],
        ],
    ];

    if (!isset($config['puntosVenta'][$codigoPuntoVenta])) {
        throw new InvalidArgumentException('Punto de venta no configurado: ' . $codigoPuntoVenta);
    }

    $puntoVenta = $config['puntosVenta'][$codigoPuntoVenta];

    return [
        'nit' => $config['nit'],
        'token' => $config['token'],
        'codigoAmbiente' => $config['codigoAmbiente'],
        'codigoSistema' => $config['codigoSistema'],
        'codigoSucursal' => $config['codigoSucursal'],
        'codigoModalidad' => $config['codigoModalidad'],
        'codigoPuntoVenta' => $codigoPuntoVenta,
        'cuis' => $puntoVenta['cuis'],
        'cufd' => $puntoVenta['cufd'],
        'codigoControl' => $puntoVenta['codigoControl'],
    ];
}
