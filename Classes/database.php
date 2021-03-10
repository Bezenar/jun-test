<?php
  class DB
  {
    private $server;
    private $user;
    private $pass;
    private $dbname;
    private $conn;
    function __construct($server, $user, $pass, $dbname)
    {
      $this->server = $server;
      $this->user = $user;
      $this->pass = $pass;
      $this->dbname = $dbname;
      $this->conn = new mysqli($server, $user, $pass, $dbname);
    }
    public function select($what, $from, $where = null, $orderby = null)
    {
      $fetched = array(); // Array for save data from DB.
      /**
       * Generate Sql query.
       */
      $sql = "SELECT ".$what." FROM ".$from;
      /**
       * Check arguments.
       * If argument is not null adding additional query parametrs.
       */
      if ($where != null) $sql .= " WHERE ".$where;
      if ($orderby != null) $sql .= " ORDERBY ".$orderby;
      // Creating DB query.
      $query = $this->conn->query($sql);
      /**
       * Checking query.
       * IF true -> starting generate array with database received data.
       * ELSE -> returning empry array.
       */
      if ($query)
      {
        $rows = mysqli_num_rows($query); // Query rows count.
        for ($i = 0; $i < $rows; $i++)
        {
          $res = mysqli_fetch_assoc($query); // Creating associative array.
          /**
           * Checking data for choose class.
           * IF -> creating DVD class.
           * ELSE IF -> creating book class.
           * ELSE -> creating furniture class.
           */
          if ($res["size"] !== NULL)
          {
            $fetched[$i] = new DVD($res["id"], $res["sku"], $res["name"], $res["price"], $res["size"]);
          }
          else if ($res["weight"] !== NULL)
          {
            $fetched[$i] = new Book($res["id"], $res["sku"], $res["name"], $res["price"], $res["weight"]);
          }
          else
          {
            $fetched[$i] = new Furniture($res["id"], $res["sku"], $res["name"], $res["price"], $res["height"], $res["width"], $res["length"]);
          }
        }
      }
      // Returning array.
      return $fetched;
    }
    public function insert($table, $values, $columns = null)
    {
      $sql = "INSERT INTO `".$table."`"; // Sql query.
      /**
       * Check function argument.
       * IF -> Creating complement with columns names for sql query.
       */
      if ($columns !== null)
      {
        $sql .= " (";
        $cols = array();
        foreach($columns as $col) {
          array_push($cols,  "`".$col."`");
        };
        $sql .= implode(", ", $cols); // Creating string from array.
        $sql .= ")";
      };
      // Complement sql query.
      $sql .= " VALUES (";
      // Creating complement with values.
      $vals = array();
      foreach($values as $key => $value)
      {
        if ($value)
        {
          array_push($vals, "'".$value."'");
        }
      }
      // Complement sql query.
      $sql .= implode(", ", $vals);
      $sql .= ")";
      // Create query to DB.
      $query = $this->conn->query($sql);
    }
    public function delete($table, $where, $values)
    {
      // Function for reduce method.
      function reduceFunction ($carry, $item) {
        array_push($carry, "'".$item."'");
        return $carry;
      }
      // Creating new array with changed value.
      $val = array_reduce($values, "reduceFunction", array());
      // Creating string from array.
      $val = implode(", ", $val);
      $sql = "DELETE FROM `".$table."` WHERE ".$where." IN (".$val.")"; // Sql query.
      // Delete selected products from database.
      $query = $this->conn->query($sql);
    }

  }
