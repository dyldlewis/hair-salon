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


    class TaskTest extends PHPUnit_Framework_TestCase
    {

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
    }
?>
