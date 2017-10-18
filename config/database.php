<?php

error_reporting(0);
include_once('config.php');

class database {

    private $dbc;
    private $rows;
    public $result;
    private $row;
    private $ids;
    private $error;

    public function __construct() {
        try {
            $this->dbc = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE . "", DB_USER, DB_PASS);
            $this->dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $ex) {
            $this->dbc = "Connection failed: " . die($ex->getMessage());
        }
        return $this->dbc;
    }

    public function __destruct() {
        unset($this->dbc);
    }

    public function insert($tablename, $array) {
        $fields = '';
        $filedsvalue = '';
        foreach ($array as $keys => $value) {
            $fields .= "`" . $keys . "`,";            //insert all fields in a one variable
            //$filedsvalue.="'" . $value . "',";
            $filedsvalue .= '"' . $value . '",';
        }
        $fields = rtrim($fields, ",");
        $filedsvalue = rtrim($filedsvalue, ",");

        $sql = "INSERT INTO " . $tablename . " (" . $fields . ") VALUES (" . $filedsvalue . ")";
        try {
            $rslt = $this->dbc->prepare($sql);
            $rslt->execute();
            $this->result = $this->dbc->lastInsertId();
        } catch (PDOException $ex) {
            $this->dbc = "Fail To Insert :  " . $sql . die($ex->getMessage());
        }
        return $this->result;
    }

    public function update($tablename, $array, $condtn) {
        try {
            $fields = '';
            foreach ($array as $key => $value) {
                $fields .= "`" . $key . "`='" . $value . "',";
            }
            $fields = rtrim($fields, ",");
            $sql = "UPDATE " . $tablename . " SET " . $fields . " WHERE " . $condtn . "";
            $rslt = $this->dbc->prepare($sql);
            $rslt->execute();
            $this->result = $rslt->rowCount();
            $message = $this->result;
        } catch (PDOException $ex) {
            $message = $this->result = "Fail To Update :  " . $sql . die($ex->getMessage());
        }
        return $message;
    }

    public function rows($str) {
        try {
            $this->result = $this->dbc->prepare($str);
            $this->result->execute();
            if ($this->result->rowCount() >= 1) {
                $r = $this->result->rowCount();
                $message = $r;
            } else {
                $message = '0';
            }
        } catch (PDOException $e) {

            $message = "Display Single failed (displaySingle): " . die($e->getMessage()) . $error_query;
        }
        return $message;
    }

    function select_query_array($qry) {
        try {
            $result = $this->dbc->prepare($qry);
            $result->execute();
            if ($result->rowCount() >= 1) {
                $r = $result->fetchAll(PDO::FETCH_OBJ);
                $message = $r;
            } else {
                $message = '0';
            }
        } catch (PDOException $ex) {
            $message = 'Error To Select' . die($ex->getMessage());
        }
        return $message;
    }

    function delete($qry) {
        try {
            $rslt = $this->dbc->prepare($qry);
            $rslt->execute();
            $this->result = $rslt->rowCount();
            $message = $this->result;
        } catch (PDOException $ex) {
            $message = 'Error To Delete' . $ex->getMessage();
        }
        return $message;
        ;
    }

    function send_admin_mail($subject, $body) {
        require_once 'php_mailer.php';
        $email = 'alwafaagroups@hotmail.com';
        // $email = 'upendrakumarprasad381@gmail.com';
        $mail = new Mail();
        $email_Arr = [$email];
        $result = $mail->send_mail($email_Arr, $subject, $body);
        echo $result;
    }

}

?>