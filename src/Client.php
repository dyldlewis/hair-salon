<?php
class Client
{
    private $name;
    private $id;

    function __construct($name, $id = null)
    {
        $this->name = $name;
        $this->id = $id;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function setName($new_name)
    {
        $this->name = (string) $new_name;
    }

    function save()
    {
          $executed = $GLOBALS['DB']->exec("INSERT INTO clients (name) VALUES ('{$this->getName()}');");
          if ($executed) {
                return true;
          } else {
                return false;
          }
    }

    static function getAll()
    {
        $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients;");
        $clients = array();
        foreach($returned_clients as $client) {
            $name = $client['name'];
            $new_client = new Client($name);
            array_push($clients, $new_client);
        }
    return $clients;
    }

    static function deleteAll()
    {
        $executed = $GLOBALS['DB']->exec("DELETE FROM clients;");
        if ($executed) {
           return true;
        } else {
           return false;
        }
    }
}
?>
