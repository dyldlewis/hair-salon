<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Stylist.php";
    require_once "src/Client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
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

        function testGetId()
        {
            //Arrange
            $name = "Angelica";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function testFind()
        {
            //Arrange
            $name = "Jessia Anne";
            $name2 = "Jessica";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $test_stylist2 = new Stylist($name2);
            $test_stylist->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }
    }
?>
