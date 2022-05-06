<?php

namespace App\Tests\Unit\Validator;

use App\Validator\PhoneNumberValidator;
use PHPUnit\Framework\TestCase;

class PhoneNumberValidatorTest extends TestCase
{
	public function testCommonFormatsWithoutNotesAreValid(): void
	{
		$validator = new PhoneNumberValidator();

		// Notes allowed
		$this->assertTrue($validator->isNumberValid('418 321-9012', true), "'418 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('418.321.9012', true), "'418.321.9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('(418) 321-9012', true), "'(418) 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1 418 321-9012', true), "'1 418 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1.418.321.9012', true), "'1.418.321.9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1-418-321-9012', true), "'1-418-321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('+1 418-321-9012', true), "'+1 418-321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('4183219012', true), "'4183219012' should be considered a valid phone number.");

		// Notes not allowed
		$this->assertTrue($validator->isNumberValid('418 321-9012', false), "'418 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('418.321.9012', false), "'418.321.9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('(418) 321-9012', false), "'(418) 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1 418 321-9012', false), "'1 418 321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1.418.321.9012', false), "'1.418.321.9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1-418-321-9012', false), "'1-418-321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('+1 418-321-9012', false), "'+1 418-321-9012' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('4183219012', false), "'4183219012' should be considered a valid phone number.");
	}

	public function testCommonFormatsWithNotesAreValid(): void
	{
		$validator = new PhoneNumberValidator();

		$this->assertTrue($validator->isNumberValid('1 418 321-9012 ext. 38', true), "'1 418 321-9012 ext. 38' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('418 321-9012 ext. 38', true), "'418 321-9012 ext. 38' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('418 321-9012 #38', true), "'418 321-9012 #38' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1 418 321-9012 #38', true), "'1 418 321-9012 #38' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('418 321-9012 (demander Jacob)', true), "'418 321-9012 (demander Jacob)' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1 418 321-9012 (demander Jacob)', true), "'1 418 321-9012 (demander Jacob)' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('1-418-321-9012 (demander Jacob)', true), "'1-418-321-9012 (demander Jacob)' should be considered a valid phone number.");
		$this->assertTrue($validator->isNumberValid('(418) 321-9012 (demander Jacob)', true), "'(418) 321-9012 (demander Jacob)' should be considered a valid phone number.");
	}

	public function testIncompleteNumbersAreInvalid(): void
	{
		$validator = new PhoneNumberValidator();

		$this->assertFalse($validator->isNumberValid('not a number', true), "'not a number' should be considered an invalid phone number");
		$this->assertFalse($validator->isNumberValid('41 321-9012', true), "'41 321-9012' should be considered an invalid phone number");
		$this->assertFalse($validator->isNumberValid('418 321-901', true), "'418 321-901' should be considered an invalid phone number");
		$this->assertFalse($validator->isNumberValid('418 32-9012', true), "'418 32-9012' should be considered an invalid phone number");
		$this->assertFalse($validator->isNumberValid('800 321-90123', true), "'800 321-90123' should be considered an invalid phone number");
	}

	public function testNumberWithNonAllowedNoteIsInvalid(): void
	{
		$validator = new PhoneNumberValidator();

		$this->assertFalse($validator->isNumberValid('418 321-9012 ext. 35', false), "'418 321-9012' should be considered a valid phone number.");
	}
}