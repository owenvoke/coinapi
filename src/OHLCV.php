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
}
