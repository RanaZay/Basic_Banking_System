<?php
class customer{
    public $id;
    public $name;
    public $email;
    public $registerationDate;
    
    public function __construct($id, $name, $email)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        
    }
    static function ViewAllCustomers()
    {

        require_once('config.php');
        $qry = "SELECT * FROM customers ORDER BY registerationDate asc ";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($result);
        mysqli_close($cn);
        return $data;
    }
    function getBalance($customer_id){
        require_once('config.php');
        $qry = "SELECT balance FROM accounts WHERE `Customers_id`=$customer_id";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_assoc($result);
        mysqli_close($cn);
        return $data;
    }
    function getAccountId($customer_id){
        require_once('config.php');
        $qry = "SELECT id FROM accounts WHERE `Customers_id`=$customer_id";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_assoc($result);
        mysqli_close($cn);
        return $data;
    }
    function getCustomerId ($account_id){
        require_once('config.php');
        $qry = "SELECT Customers_id FROM accounts WHERE `id`=$account_id";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_assoc($result);
        mysqli_close($cn);
        return $data;
    }
    function getName($customer_id){
        require_once('config.php');
        $qry = "SELECT name FROM customers WHERE `id`=$customer_id";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_assoc($result);
        mysqli_close($cn);
        return $data;
    }
    
    static function ViewAllTransactions()
    {

        require_once('config.php');
        $qry = "SELECT * FROM transactions ORDER BY `dateTime` Desc";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        $data = mysqli_fetch_all($result);
        mysqli_close($cn);
        return $data;
    }
    function MakeTransaction($amount,$account_id){
        require_once('config.php');
        $qry = "INSERT INTO transactions (amount,Accounts_id) VALUES($amount,$account_id)";
        $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
        $result = mysqli_query($cn, $qry);
        mysqli_close($cn);
        return $result;
    }
    function UpdateBalance($amount,$Customers_id){
                  require_once('config.php');
            $qry = "UPDATE accounts  SET balance=balance+$amount WHERE Customers_id=$Customers_id";
            $cn = mysqli_connect(DB_host, DB_user_name, DB_user_password, DB_name);
            $result = mysqli_query($cn, $qry);
            mysqli_close($cn);
            // $data=mysqli_fetch_assoc($result);
            return $result;
            }

}