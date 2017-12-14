<?php
class Database{
    public $host= DB_HOST;
    public $user= DB_USER;
    public $pass= DB_PASS;
    public $name= DB_NAME;
    
    public $link;
    public $error;
    
    //clasa de construct
    public function __construct(){
        //apeleaza functia de connect
        $this->connect();
    }
    
    //connectorul
    private function connect(){
      $this->link = new mysqli($this->host, $this->user, $this->pass, $this->name);
    
      if(!$this->link){
      echo $this->error = "Connection failed:".$this->link->connect_error;
      return false;
    }
      
    }
    
    //creaza metoda de select din baza de date
    public function select($query){
        $result = $this->link->query($query) or die($this->link->connect_error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
        
    }
  
    //creaza metoda de insert in baza de date
    public function insert($query){
        $insert_row = $this->link->query($query) or die($this->link->connect_error.__LINE__);
        
        //valideaza insertul
        if($insert_row){
            header("Location: index.php?msg=".urlencode('Record added'));
            exit();
        }else{
           die('Error: ('. $this->link->errno.')'.$this->link->error);
        }
    }
    
    //creaza metoda de update
    public function update($query){
        $update_row = $this->link->query($query) or die($this->link->connect_error.__LINE__);
        
        //valideaza insertul
        if($update_row){
            header("Location: index.php?msg=".urlencode('Record updated'));
            exit();
        }else{
           die('Error: ('. $this->link->errno.')'.$this->link->error);
        }
    }
    
    //creaza metoda de delete
    public function delete($query){
        $delete_row = $this->link->query($query) or die($this->link->connect_error.__LINE__);
        
        //valideaza insertul
        if($delete_row){
            header("Location: index.php?msg=".urlencode('Record deleted'));
            exit();
        }else{
           die('Error: ('. $this->link->errno.')'.$this->link->error);
        }
    }
}
