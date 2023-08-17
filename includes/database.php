<?php
require_once LIB_PATH . DS . "config.php";

class Database
{
    public $sql_string = '';
    public $error_no = 0;
    public $error_msg = '';
    private $conn;
    public $last_query;

    public function __construct()
    {
        $this->open_connection();
    }

    public function open_connection()
    {
        $this->conn = new mysqli(server, user, pass, database_name);
        if ($this->conn->connect_errno) {
            echo "Problem in database connection! Contact administrator!";
            exit();
        }
    }

    public function setQuery($sql = '')
    {
        $this->sql_string = $sql;
    }

    public function executeQuery()
    {
        $result = $this->conn->query($this->sql_string);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result)
    {
        if (!$result) {
            $this->error_no = $this->conn->errno;
            $this->error_msg = $this->conn->error;
            return false;
        }
        return $result;
    }

    public function loadResultList($key = '')
    {
        $cur = $this->executeQuery();

        $array = array();
        while ($row = $cur->fetch_object()) {
            if ($key) {
                $array[$row->$key] = $row;
            } else {
                $array[] = $row;
            }
        }
        $cur->free_result();
        return $array;
    }

    public function loadSingleResult()
    {
        $cur = $this->executeQuery();

        while ($row = $cur->fetch_object()) {
            return $data = $row;
        }
        $cur->free_result();
    }

    public function getFieldsOnOneTable($tbl_name)
    {
        $this->setQuery("DESC " . $tbl_name);
        $rows = $this->loadResultList();

        $f = array();
        for ($x = 0; $x < count($rows); $x++) {
            $f[] = $rows[$x]->Field;
        }

        return $f;
    }

    public function fetch_array($result)
    {
        return $result->fetch_array();
    }

    public function num_rows($result_set)
    {
        return $result_set->num_rows;
    }

    public function insert_id()
    {
        // get the last id inserted over the current db connection
        return $this->conn->insert_id;
    }

    public function affected_rows()
    {
        return $this->conn->affected_rows;
    }

    public function escape_value($value)
    {
        return $this->conn->real_escape_string($value);
    }

    public function close_connection()
    {
        if (isset($this->conn)) {
            $this->conn->close();
            unset($this->conn);
        }
    }
}

$mydb = new Database();
?>