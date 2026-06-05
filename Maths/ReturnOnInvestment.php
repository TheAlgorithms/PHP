<?php

/**
 * Calculates Return on Investment (ROI) as a percentage.
 * ROI measures the profitability of an investment relative to its cost.
 *
 * Formula: ROI = (Gain - Cost) / Cost * 100
 *
 * @see https://www.investopedia.com/terms/r/returnoninvestment.asp
 *
 * @param float $gainFromInvestment total value gained from the investment
 * @param float $costOfInvestment   total cost of the investment
 * @return float ROI as a percentage
 * @throws \InvalidArgumentException if costOfInvestment is not positive
 */
function returnOnInvestment(float $gainFromInvestment, float $costOfInvestment): float
{
    if ($costOfInvestment <= 0) {
        throw new \InvalidArgumentException('costOfInvestment must be greater than 0');
    }
    return ($gainFromInvestment - $costOfInvestment) / $costOfInvestment * 100;
}
