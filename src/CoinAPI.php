<?php

namespace pxgamer\CoinAPI;

/**
 * Class CoinAPI
 */
class CoinAPI
{
    /**
     * The base URI for the CoinAPI main site.
     */
    public const BASE_URI = 'https://coinapi.io';
    /**
     * The base URI for the CoinAPI API.
     */
    public const API_BASE_URI = 'https://rest.coinapi.io/v1/';

    /**
     * Format a DateTime object to a compatible string.
     *
     * @param \DateTime $dateTime
     * @return string
     */
    public static function formatTimestamp(\DateTime $dateTime): string
    {
        $timeString = str_replace(
            ' ',
            'T',
            $dateTime->format('Y-m-d H:i:s.u')
        );

        return $timeString.'0Z';
    }
}
