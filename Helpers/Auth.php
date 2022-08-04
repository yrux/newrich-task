<?php 
// namespace Helpers;
include __DIR__.'/Connection.php';
class Auth{
    protected $connection;
    protected $permissions = [];
    protected $isLoggedIn = false;
    public function __construct(){
        $connectionClass = new Connection();
        $this->connection = $connectionClass->getConnection();
        if(isset($_SESSION['valid'])) {
            $this->isLoggedIn = true;
        }
        if($this->isLoggedIn){
            $permissions = mysqli_query($this->connection, "SELECT permission_id FROM login_permissions where user_type_id = ".intval($_SESSION['details']['user_type']))
            or die("Could not execute the select query.");
            $this->permissions = [];
            while($row = mysqli_fetch_assoc($permissions)) {
                $this->permissions[] = intval($row['permission_id']);
            }
        }
    }
    public function isAllowed($permission_id){
        return in_array(intval($permission_id), $this->permissions);
    }
    public function userLoggedIn(){
        if(isset($_SESSION['valid'])) {
            return true;
        }
        return false;
    }
}

?>