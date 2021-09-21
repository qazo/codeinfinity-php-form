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

		// NOTE (Kwezilomso Mhaga <kwezimhaga@live.com>):
		// could possibly validte the date of birth part as well
		return strlen($idNumber) == self::ID_NUMBER_LENGTH;
	}
}
?>
