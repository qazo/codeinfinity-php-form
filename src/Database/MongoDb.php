<?php

namespace App\Database;
require_once(__DIR__ . '/../../vendor/autoload.php');

class MongoDb
{
	const CONN_STR = "";

	public static function getDatabase() : \MongoDB\Database
	{
		$client = new \MongoDB\Client(self::CONN_STR);
		return $client->selectDatabase("codeinfinity_test");
	}

	public static function getDbCollection(string $collectionName): \MongoDB\Collection
	{
		$db = self::getDatabase();
		return $db->selectCollection($collectionName);
	}

	public static function testDbConnection(): bool
	{
		try {
			$db = self::getDatabase();
		}
		catch(Exception $ex) {
			return false;
		}
		return true;
	}
}
?>
