<?php

namespace pxgamer\CoinAPI;

/**
 * Class ExchangeRates
 */
class ExchangeRates
{
    use Traits\ApiCallable;

    /**
     * Retrieve the current exchange rate between requested asset and all other assets.
     *
     * @param string   $assetIdBase
     * @param string[] $filterAssetIds
     * @return \stdClass
     */
    public function getExchangeRates(string $assetIdBase, array $filterAssetIds = []): \stdClass
    {
        $data = [
            'filter_symbol_id' => implode(';', $filterAssetIds),
        ];

        return $this->call('exchangerate/'.strtoupper($assetIdBase).'?'.http_build_query($data));
    }

    /**
     * Retrieve exchange rate between pair of requested assets at specific or current time.
     *
     * @param string      $assetIdBase
     * @param string      $assetIdQuote
     * @param string|null $time
     * @return \stdClass
     */
    public function getExchangeRate(string $assetIdBase, string $assetIdQuote, string $time = null): \stdClass
    {
        $data = [
            'time' => $time,
        ];

        return $this->call(
            'exchangerate/'.strtoupper($assetIdBase).'/'.strtoupper($assetIdQuote),
            $data
        );
    }
}
