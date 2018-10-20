<?php

namespace pxgamer\CoinAPI;

/**
 * Class Quotes
 */
class Quotes
{
    use Traits\ApiCallable;

    /**
     * Retrieve current quotes for all symbols.
     *
     * @param array $filterSymbolIds
     * @return \stdClass[]
     */
    public function getCurrent(array $filterSymbolIds = []): array
    {
        $query = [];

        if (!empty($filterSymbolIds)) {
            $query['filter_symbol_id'] = implode(';', $filterSymbolIds);
        }

        return $this->call('quotes/current', $query);
    }

    /**
     * Retrieve current quotes for a specific symbol.
     *
     * @param string $symbolId
     * @return \stdClass[]
     */
    public function getSymbolCurrent(string $symbolId): array
    {
        return $this->call('quotes/'.$symbolId.'/current');
    }

    /**
     * Retrieve latest quotes for all symbols.
     *
     * @param array|null $filterSymbolIds
     * @param int|null   $limit
     * @return \stdClass[]
     */
    public function getLatest(array $filterSymbolIds = [], int $limit = null): array
    {
        $query = [];

        if ($limit) {
            $query['limit'] = $limit;
        }

        if (!empty($filterSymbolIds)) {
            $query['filter_symbol_id'] = implode(';', $filterSymbolIds);
        }

        return $this->call('quotes/latest', $query);
    }

    /**
     * Retrieve latest quotes for a specific symbol.
     *
     * @param string   $symbolId
     * @param int|null $limit
     * @return \stdClass[]
     */
    public function getSymbolLatest(string $symbolId, int $limit = null): array
    {
        $query = [];

        if ($limit) {
            $query['limit'] = $limit;
        }

        return $this->call('quotes/'.$symbolId.'/latest', $query);
    }

    /**
     * Retrieve historical quote updates within requested time range, returned in time ascending order.
     *
     * @param string         $symbolId
     * @param \DateTime      $startTime
     * @param \DateTime|null $endTime
     * @param int|null       $limit
     * @return \stdClass[]
     */
    public function getHistory(
        string $symbolId,
        \DateTime $startTime,
        \DateTime $endTime = null,
        int $limit = null
    ): array {
        $query = [
            'time_start' => CoinAPI::formatTimestamp($startTime),
        ];

        if ($endTime) {
            $query['time_end'] = CoinAPI::formatTimestamp($endTime);
        }

        if ($limit) {
            $query['limit'] = $limit;
        }

        return $this->call('quotes/'.$symbolId.'/history', $query);
    }
}
