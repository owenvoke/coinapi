<?php

namespace pxgamer\CoinAPI;

/**
 * Class Trades
 */
class Trades
{
    use Traits\ApiCallable;

    /**
     * Retrieve latest trades for all symbols without time limitation.
     *
     * @param int|null $limit
     * @param string[] $filterSymbolIds
     * @return \stdClass[]
     */
    public function getLatest(int $limit = null, array $filterSymbolIds = []): array
    {
        $query = [];

        if ($limit) {
            $query['limit'] = $limit;
        }

        if (!empty($filterSymbolIds)) {
            $query['filter_symbol_id'] = implode(';', $filterSymbolIds);
        }

        return $this->call('trades/latest', $query);
    }

    /**
     * Retrieve latest trades for a specific symbol without time limitation.
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

        return $this->call('trades/'.$symbolId.'/latest', $query);
    }

    /**
     * Retrieve history transactions from specific symbol, returned in time ascending order.
     *
     * @param string         $symbolId
     * @param \DateTime      $startTime
     * @param \DateTime|null $endTime
     * @param int|null       $limit
     * @return array
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

        return $this->call('trades/'.$symbolId.'/history', $query);
    }
}
