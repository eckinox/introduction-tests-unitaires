<?php

namespace App\Validator;

/**
 * Validates that the provided phone number is a valid phone number.
 *
 * To be valid, a phone number must have at least:
 * - the area code (ex.: `418`)
 * - the telephone prefix (ex.: `321`)
 * - the line number (ex.: `9012`)
 *
 * Numbers may be prefixed with a county code (ex.: `+1` or `1`).
 *
 * The following formats, or combinations of these formats, are accepted:
 * - Raw numbers (`4183219012`)
 * - Spaced out parts (`418 321 9012`)
 * - Kebab case numbers (`418-321-9012`)
 * - Dot notation (`418.321.9012`)
 * - Parenthesized area code (`(418) 321-9012`)
 * - Any combination of these (ex.: `+1.418.321-9012` )
 *
 * The number may be followed by notes, extensions, or anything other string without any validation.
 */
class PhoneNumberValidator
{
	public function isNumberValid(string $value, bool $allowSuffix): bool
	{
		// Optionnally starts with a country code, ex.: "+1" or "1"
		$pattern = "^(\+?[0-9]{1,2}[\s\.-]?)?";

		// 3-digit area code
		$pattern .= "\(?[0-9]{3}\)?[\s\.-]?";

		// 3-digit telephone prefix (city code)
		$pattern .= "[0-9]{3}[\s\.-]?";

		// 4-digit line number
		$pattern .= '[0-9]{4}';

		if ($allowSuffix) {
			// Optionally end with notes, extension number, etc.
			$pattern .= "([\s#].*)?";
		}

		$pattern .= '$';

		return preg_match('~'.$pattern.'~', $value) === 1;
	}
}