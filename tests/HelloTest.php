<?php

require_once "vendor/autoload.php";

class HelloTest extends PHPUnit_Extensions_Database_TestCase
{
    static private $pdo = null;

    private $conn = null;

    final public function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new PDO('mysql:host=127.0.0.1;dbname=circle_test', 'ubuntu', '');
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, 'play');
        }

        return $this->conn;

    }

    protected function getDataSet()
    {
        return new PHPUnit_Extensions_Database_DataSet_YamlDataSet(
            dirname(__FILE__)."/fruits.yml"
        );
    }


    public function testSuccess()
    {
        $stmt = self::$pdo->query("SELECT * FROM fruits");
        $fruits = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->assertCount(2, $fruits);

    }

    public function testTrue()
    {
        $this->assertTrue(1 === 1);
    }
}

