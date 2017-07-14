<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function testSave()
        {
            $name = "Leslie";
            $test_client = new Stylist($name);


            $executed = $test_client->save();

            $this->assertTrue($executed, "Stylist not successfully saved to database");
        }




    }
?>
