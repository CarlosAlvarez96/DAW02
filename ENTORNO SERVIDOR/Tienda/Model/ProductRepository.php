<?php
class ProductRepository{
    public static function getProducts(){
        $products=[];
        $bd=Conectar::conexion();
        $q="SELECT * FROM product";
        $result=$bd->query($q);
        while($datos=$result -> fetch_assoc()){
            $products[] = new Product($datos);
        }
        return $products;
    }

    public static function getProductById($id){
        $bd=Conectar::conexion();
        $q="SELECT * FROM product WHERE id=".$id;
        $result=$bd->query($q);
        while($datos=$result -> fetch_assoc()){
            return new Product($datos);
        }
    }

    public static function newProduct($datos,$files){
        $image=$files['img']['name'];

        move_uploaded_file($files['img']['tmp_name'],'public/img/'.$image);
        
        $bd=Conectar::conexion();
        $q="INSERT INTO product VALUES (NULL,
                                          '".$datos['name']."',
                                          '".$datos['description']."',
                                          '".$image."',
                                          ".$datos['price'].",
                                          ".$datos['stock'].")";
        $bd->query($q);
        return $bd->insert_id;
    }
}
?>