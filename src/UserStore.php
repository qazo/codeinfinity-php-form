<?php
namespace App;

class UserStore
{
	private const DB_COLLECTION_NAME = "users";

	public static function idNumberExists(string $idNumber): bool
	{
		$userCollection = \App\Database\MongoDb::getDbCollection(self::DB_COLLECTION_NAME);
		$sameIdCount = $userCollection->count([
			"id_number" => $idNumber
		]);

		return $sameIdCount > 0;
	}

	public function storeUser(\App\Models\User $user): int
	{
		$userCollection = \App\Database\MongoDb::getDbCollection(self::DB_COLLECTION_NAME);

		$result = $userCollection->insertOne([
			"name" => $user->getName(),
			"surname" => $user->getSurname(),
			"id_number" => $user->getIdNumber(),
			"date_of_birth" => $user->getDateOfBirth()
		]);

		return $result->getInsertedCount();
	}
}
?>
