<?php

namespace App\Util;

class TimeFormatter
{
	/**
	 * Formats a number of hours in an easy-to-read time string.
	 * Ex.:
	 *  - `1` => `"1h"`
	 *  - `1.5` => `"1h 30m"`
	 *  - `.25` => `"15m"`.
	 */
	public function formatHours(float|int $hours): ?string
	{
		$minutes = round(($hours - floor($hours)) * 60);
		$hours = floor($hours);
		$timeParts = [];

		if ($hours) {
			$timeParts[] = $hours . 'h';
		}

		if ($minutes) {
			$timeParts[] = $minutes . 'm';
		}

		if (!$timeParts) {
			return null;
		}

		return implode(' ', $timeParts);
	}

	/**
	 * Formats a number of minutes in an easy-to-read time string.
	 * Ex.:
	 *  - `20` => `"20m"`
	 *  - `60` => `"1h"`
	 *  - `75` => `"1h 15m"`
	 */
	public function formatMinutes(float|int $minutes): ?string
	{
		$hours = $minutes / 60;

		return $this->formatHours($hours);
	}
}