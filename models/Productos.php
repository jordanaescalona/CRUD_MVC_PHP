<?php

class Producto extends Conectar{
    public function get_producto(){
        $conectar=parent::conexion();
        parent::set_names();

        $sql="SELECT * FROM productos WHERE prod_estado=1";
        $sql=$conectar->prepare($sql);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }
    public function get_producto_x_id($prod_id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM productos WHERE prod_id=?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();

        return $resultado=$sql->fetchAll();
    }
    public function delete_producto($prod_id){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE productos SET prod_estado=0,prod_feliminacion=now() WHERE prod_id=?;";
        $sql=$conectar->prepare(sql);
        $sql->bindValue(1,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function insert_producto($prod_nombre){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="INSERT INTO productos 
                    (prod_id,prod_nombre,prod_fcreacion,prod_fmodificacion,prod_feliminacion,prod_estado)
                VALUES
                    (NULL,?,now(),NULL,NULL,1);";
        $sql->bindValues(1,$prod_nombre);
        $sql->execute();
        return $resultado=$sql->fetchAll();

    }
    public function update_producto($prod_id,$prod_nombre){
        $conectar=parent::conexion();
        parent::set_names();
        $sql="UPDATE productos SET prod_nombre=?,prod_fmodificacion=now() WHERE prod_id=?";
        $sql->bindValue(1,$prod_nombre);
        $sql->binValue(2,$prod_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
}

?>