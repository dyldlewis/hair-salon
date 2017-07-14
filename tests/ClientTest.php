<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Cindy";
            $test_client = new Client($name);

            //Act
            $executed = $test_client->save();

            // Assert
            $this->assertTrue($executed, "Task not successfully saved to database");
        }

        function testGetAll()
        {
            //Arrange
            $name = "Cindy";
            $name2 = "Lary";
            $test_client = new Client($name);
            $test_client->save();
            $test_client2 = new Client($name2);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = "Bill";
            $name2 = "Jerry";
            $test_client = new Client($name);
            $test_client->save();
            $test_client2 = new Client($name2);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

    }
?>
