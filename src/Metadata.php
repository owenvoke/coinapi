<?php

namespace pxgamer\CoinAPI;

/**
 * Class Metadata
 */
class Metadata
{
    use Traits\ApiCallable;

    /**
     * Retrieve a detailed list of all exchanges.
     *
     * @return array
     */
    public function getExchanges(): array
    {
        return $this->call('exchanges');
    }

    /**
     * Retrieve a detailed list of all assets.
     *
     * @return array
     */
    public function getAssets(): array
    {
        return $this->call('assets');
    }

    /**
     * Retrieve a detailed list of all symbols.
     *
     * @param string[] $filterSymbolIds
     * @return array
     */
    public function getSymbols(array $filterSymbolIds = []): array
    {
        $data = [
            'filter_symbol_id' => implode(';', $filterSymbolIds),
        ];

        return $this->call('symbols?'.http_build_query($data));
    }
}
