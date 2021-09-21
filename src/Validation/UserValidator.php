<?php
namespace App\Validation;

class UserValidator
{
	private \App\Models\User $user;
	private array $errors;

	function __construct(\App\Models\User $user)
	{
		$this->user = $user;
		$this->errors = [];
	}

	public function validateUser(): bool
	{
		$this->errors = [];
		$dateOfBirth = $this->user->getDateOfBirth();

		if (strlen($this->user->getName()) == 0) {
			$this->errors[] = "Please enter a name.";
		}

		if (strlen($this->user->getSurname()) == 0) {
			$this->errors[] = "Please enter a surname.";
		}

		if (!DateOfBirthValidator::isValidDateOfBirth($dateOfBirth)) {
			$this->errors[] = "Date of Birth is invalid. Date of birth must be in the format of 'dd/mm/YYYY' (31-12-2020).";
		}

		$idNumber = $this->user->getIdNumber();
		if (!IdNumberValidator::isValidIdNumber($idNumber)) {
			$this->errors[] = "ID number is invalid. Please use a valid RSA ID nummber.";
		}

		if (!IdNumberValidator::isValidDateOfBirth($idNumber, $dateOfBirth)) {
			$this->errors[] = "Date of Birth in ID number does not match the date of birth specified.";
		}

		if (\App\UserStore::idNumberExists($idNumber)) {
			$this->errors[] = "The ID number specified already exists.";
		}

		return count($this->errors) == 0;
	}

	public function getErrors(): array
	{
		// does PHP return the reference to the array or is this a copy?
		return $this->errors;
	}
}
?>
