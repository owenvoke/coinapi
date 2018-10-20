<?php

namespace pxgamer\CoinAPI;

/**
 * Class OrderBook
 */
class OrderBook
{
    use Traits\ApiCallable;

    /**
     * Retrieve current order book snapshot for all symbols without time limitation.
     *
     * @param int|null $limitLevels
     * @param string[] $filterSymbolIds
     * @return \stdClass[]
     */
    public function getCurrent(int $limitLevels = null, array $filterSymbolIds = []): array
    {
        $query = [];

        if ($limitLevels) {
            $query['limit_levels'] = $limitLevels;
        }

        if (!empty($filterSymbolIds)) {
            $query['filter_symbol_id'] = implode(';', $filterSymbolIds);
        }

        return $this->call('orderbooks/current', $query);
    }

    /**
     * Retrieve current order book snapshot for a specific symbol without time limitation.
     *
     * @param string   $symbolId
     * @param int|null $limitLevels
     * @return \stdClass[]
     */
    public function getSymbolCurrent(string $symbolId, int $limitLevels = null): array
    {
        $query = [];

        if ($limitLevels) {
            $query['limit_levels'] = $limitLevels;
        }

        return $this->call('orderbooks/'.$symbolId.'/current', $query);
    }

    /**
     * Retrieve latest order book snapshot for a specific symbol without time limitation.
     *
     * @param string   $symbolId
     * @param int|null $limitLevels
     * @param int|null $limit
     * @return \stdClass[]
     */
    public function getLatest(string $symbolId, int $limitLevels = null, int $limit = null): array
    {
        $query = [];

        if ($limitLevels) {
            $query['limit_levels'] = $limitLevels;
        }

        if ($limit) {
            $query['limit'] = $limit;
        }

        return $this->call('orderbooks/'.$symbolId.'/latest', $query);
    }

    /**
     * Retrieve history order book snapshots for a specific symbol, returned in time ascending order.
     *
     * @param string         $symbolId
     * @param \DateTime      $startTime
     * @param \DateTime|null $endTime
     * @param int|null       $limitLevels
     * @param int|null       $limit
     * @return \stdClass[]
     */
    public function getHistory(
        string $symbolId,
        \DateTime $startTime,
        \DateTime $endTime = null,
        int $limitLevels = null,
        int $limit = null
    ): array {
        $query = [
            'time_start' => CoinAPI::formatTimestamp($startTime),
        ];

        if ($endTime) {
            $query['time_end'] = CoinAPI::formatTimestamp($endTime);
        }

        if ($limitLevels) {
            $query['limit_levels'] = $limitLevels;
        }

        if ($limit) {
            $query['limit'] = $limit;
        }

        return $this->call('orderbooks/'.$symbolId.'/history', $query);
    }
}
