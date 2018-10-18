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
     * @return \stdClass[]
     */
    public function getExchanges(): array
    {
        return $this->call('exchanges');
    }

    /**
     * Retrieve a detailed list of all assets.
     *
     * @return \stdClass[]
     */
    public function getAssets(): array
    {
        return $this->call('assets');
    }

    /**
     * Retrieve a detailed list of all symbols.
     *
     * @param string[] $filterSymbolIds
     * @return \stdClass[]
     */
    public function getSymbols(array $filterSymbolIds = []): array
    {
        $data = [
            'filter_symbol_id' => implode(';', $filterSymbolIds),
        ];

        return $this->call('symbols', $data);
    }
}
