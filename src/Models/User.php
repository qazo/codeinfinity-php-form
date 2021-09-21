<?php

namespace App\Models;

class User
{
	private string $name;
	private string $surname;
	private string $idNumber;
	private string $dateOfBirth;

	public function getName(): string
	{
		return $this->name;
	}

	public function setName(string $name): void
	{
		$this->name = $name;
	}

	public function getSurname(): string
	{
		return $this->surname;
	}

	public function setSurname(string $surname): void
	{
		$this->surname = $surname;
	}

	public function getIdNumber(): string
	{
		return $this->idNumber;
	}

	public function setIdNumber(string $idNumber): void
	{
		$this->idNumber = $idNumber;
	}

	public function getDateOfBirth(): string
	{
		return $this->dateOfBirth;
	}

	public function setDateOfBirth(string $dateOfBirth): void
	{
		$this->dateOfBirth = $dateOfBirth;
	}
}
?>
