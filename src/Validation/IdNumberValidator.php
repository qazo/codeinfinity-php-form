<?php
namespace App\Validation;

class IdNumberValidator
{
	private const ID_NUMBER_LENGTH = 13;

	public static function isValidIdNumber(string $idNumber): bool
	{
		if ($idNumber == "") {
			return false;
		}

		if (!is_numeric($idNumber)) {
			return false;
		}

		return strlen($idNumber) == self::ID_NUMBER_LENGTH;
	}

	public static function isValidDateOfBirth(string $idNumber, string $dateOfBirth): bool
	{
		$date = \DateTime::createFromFormat(DateOfBirthValidator::DATE_FORMAT, $dateOfBirth);
		$formattedDateOfBirth = $date->format("ymd");

		$idDateOfBirth = substr($idNumber, 0, 6);
		return $formattedDateOfBirth == $idDateOfBirth;
	}
}
?>
