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
		$idNumber = $this->user->getIdNumber();
		if (!IdNumberValidator::isValidIdNumber($idNumber)) {
			$this->errors[] = "ID number is invalid. Please use a valid RSA ID nummber. {$idNumber}";
		}

		if (\App\UserStore::idNumberExists($idNumber)) {
			$this->errors[] = "The ID number specified already exists.";
		}

		$dateOfBirth = $this->user->getDateOfBirth();
		if (!DateOfBirthValidator::isValidDateOfBirth($dateOfBirth)) {
			$this->errors[] = "Date of Birth is invalid. Date of birth must be in the format of 'dd/mm/YYYY' (31-12-2020). {$dateOfBirth}";
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
