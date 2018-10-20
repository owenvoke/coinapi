<?php

namespace pxgamer\CoinAPI;

/**
 * Class OHLCV
 * This class relates to the "Open, High, Low, Close, Volume" data API.
 */
class OHLCV
{
    use Traits\ApiCallable;

    /**
     * Get full list of supported time periods available for requesting OHLCV timeseries data.
     *
     * @return \stdClass[]
     */
    public function getPeriods(): array
    {
        return $this->call('ohlcv/periods');
    }

    /**
     * Get OHLCV latest timeseries data for requested symbol and period, returned in time descending order.
     *
     * @param string   $symbolId
     * @param string   $periodId
     * @param int|null $limit
     * @return mixed
     */
    public function getLatest(string $symbolId, string $periodId, int $limit = null)
    {
        $query = [
            'period_id' => $periodId,
        ];

        if ($limit) {
            $query['limit'] = $limit;
        }

        return $this->call('ohlcv/'.$symbolId.'/latest', $query);
    }
}
