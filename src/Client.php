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
              $this->id = $GLOBALS['DB']->lastInsertId();
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
            $client_id = $client['id'];
            $new_client = new Client($name, $client_id);
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

    static function find($search_id)
    {
        $returned_clients = $GLOBALS['DB']->prepare("SELECT * FROM clients WHERE id = :id");
        $returned_clients->bindParam(':id', $search_id, PDO::PARAM_STR);
        $returned_clients->execute();
        foreach ($returned_clients as $client) {
           $client_name = $client['name'];
           $client_id = $client['id'];
           if ($client_id == $search_id) {
              $found_client = new Client($client_name, $client_id);
           }
    }

    return $found_client;
    }
}
?>
