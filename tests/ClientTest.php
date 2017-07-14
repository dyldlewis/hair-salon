<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class ClientTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Client::deleteAll();
            Stylist::deleteAll();
        }

        function test_save()
        {
            //Arrange
            $name = "Roger";
            $test_stylist = new Stylist($name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Cindy";
            $test_client = new Client($name, $stylist_id);

            $executed = $test_client->save();
            // Assert
            $this->assertTrue($executed, "Task not successfully saved to database");
        }

        function testGetAll()
        {
            //Arrange
            $stylist_name = "Elon";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Cindy";
            $name2 = "Lary";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $stylist_name = "Andy";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Bill";
            $name2 = "Jerry";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function testGetId()
        {
            //Arrange

            $stylist_name = "Anthony";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Nancy";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertTrue(is_numeric($result));
        }

        function testFind()
        {
            //Arrange
            $stylist_name = "Jose";
            $test_stylist = new Stylist($stylist_name);
            $test_stylist->save();
            $stylist_id = $test_stylist->getId();

            $name = "Bobby";
            $name2 = "Karen";
            $test_client = new Client($name, $stylist_id);
            $test_client->save();
            $test_client2 = new Client($name2, $stylist_id);
            $test_client2->save();

            //Act
            $id = $test_client->getId();
            $result = Client::find($id);

            //Assert
            $this->assertEquals($test_client, $result);
        }

        function testGetStylistId()
        {
            //Arrange
            $name = "Theresa";
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $stylist_id = $test_stylist->getId();
            $client_name = "Barbra";
            $test_client = new Client($client_name, $stylist_id);
            $test_client->save();

            //Act
            $result = $test_client->getStylistId();

            //Assert
            $this->assertEquals($stylist_id, $result);;
        }

    }
?>
