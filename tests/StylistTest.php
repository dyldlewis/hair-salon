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
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

        function testSave()
        {
            $name = "Leslie";
            $test_client = new Stylist($name);


            $executed = $test_client->save();

            $this->assertTrue($executed, "Stylist not successfully saved to database");
        }

        function testGetAll()
        {
            $name = "John";
            $name2 = "Sandy";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist2], $result);
        }

        function testDeleteAll()
        {
            $name = "Alexandra";
            $name2 = "Roberto";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist2->save();

            Stylist::deleteAll();
            $result = Stylist::getAll();
            $this->assertEquals([], $result);
        }
    }
?>
