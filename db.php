<?php

class Database {
    protected $_server = 'localhost';
    protected $_username = 'root';
    protected $_password = '';
    protected $_db = '';
    protected $_conn;

    /**
     * Database constructor.
     */
    public function __construct () {
        // Create connection
        $this->_conn = new mysqli($this->_server, $this->_username, $this->_password, $this->_db);

        // Check connection
        if ($this->_conn->connect_error) {
            die("Connection failed: " . $this->_conn->connect_error);
        }

        $this->_conn->set_charset('utf8');
    }

    /**
     * @param $tablename
     * @param array|string $fields
     * @param array $where
     * @param string $whereMatch
     * @return array
     */
    public function fetch($tablename, $fields = '*', $where = array(), $whereMatch = '='){
        $sql = 'select '.(is_array($fields) ? '`'.implode($fields, '`, `').'`' : $fields).' from `'.$tablename.'`';
        if($where){
            $sql .= ' where ';
            $sqls = array();
            foreach($where as $column => $value){
                if($whereMatch === '='){
                    $sqls[] =  '`'.$column.'` = \'' . mysqli_escape_string($this->_conn, $value).'\'';
                }else{
                    $sqls[] =  '`'.$column.'` '.$whereMatch.' ' . mysqli_escape_string($this->_conn, $value);
                }

            }
            $sql .= implode($sqls, ' and ');
        }

        $result = $this->_conn->query($sql);
        $return = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $return[] = $row;
            }
        }

        return $return;
    }

    /**
     * @param $table
     * @param $array
     * @return bool|mysqli_result
     */
    public function insert($table, $array){
        $sql = 'insert into `'.$table.'` (`'.implode(array_keys($array), '`, `').'`) values (\''.implode(array_values($array), '\', \'').'\');';
        return $this->_conn->query($sql);
    }
}