<?php
namespace App\Validation;

class DateOfBirthValidator
{
	public const DATE_FORMAT = "d/m/Y";

	public static function isValidDateOfBirth(string $dateOfBirth): bool
	{
		if ($dateOfBirth == "") {
			return false;
		}

		$date = \DateTime::createFromFormat(self::DATE_FORMAT, $dateOfBirth);
		return $date->format(self::DATE_FORMAT) == $dateOfBirth;
	}
}
?>
