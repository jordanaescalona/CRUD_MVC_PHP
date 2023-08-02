<?php 

class Conectar{
    protected $dbh; /* Data Base Host */
    protected function Conexion(){
        try {
            $conectar = $this->dbh=new PDO("mysql:local=localhost;dbname=crud_mvc_php","root","");
            return $conectar;
        } catch (Exception $e){
            print "Error BD!:".$e->getMessage()."<br>";
            die();
        }
    }
    /* Para no tener problemas con los acentos */
    public function set_names(){
        return $this->dbh->query("SET NAMES 'utf8'");
    }
}

?>