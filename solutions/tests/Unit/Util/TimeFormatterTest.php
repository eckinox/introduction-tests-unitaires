<?php

namespace App\Tests\Unit\Util;

use App\Util\TimeFormatter;
use PHPUnit\Framework\TestCase;

class TimeFormatterTest extends TestCase
{
	public function testFormatHoursWithZeroReturnsNull(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertNull($timeFormatter->formatHours(0));

	}

	public function testFormatHoursWorksWithLessThanOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("59m", $timeFormatter->formatHours(0.983333333333));

	}

	public function testFormatHoursWorksWithOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("1h", $timeFormatter->formatHours(1));
		
	}
	
	public function testFormatHoursWorksWithMoreThanOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("1h 30m", $timeFormatter->formatHours(1.5));
	}

	public function testFormatMinutesWithZeroReturnsNull(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertNull($timeFormatter->formatMinutes(0));
	}

	public function testFormatMinutesWorksWithLessThanOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("59m", $timeFormatter->formatMinutes(59));
	}

	public function testFormatMinutesWorksWithOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("1h", $timeFormatter->formatMinutes(60));
	}

	public function testFormatMinutesWorksWithMoreThanOneHour(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("1h 30m", $timeFormatter->formatMinutes(90));
	}

	public function testFormatMinutesRoundsSecondsToNearestMinute(): void
	{
		$timeFormatter = new TimeFormatter();

		$this->assertSame("1h 31m", $timeFormatter->formatMinutes(90.5));
	}
}