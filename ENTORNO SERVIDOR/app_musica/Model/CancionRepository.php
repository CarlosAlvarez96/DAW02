<?php
class CancionRepository{ 
    public static function getCanciones(){
        $bd=Conectar::conexion();
        $q="SELECT * FROM songs";
        $result=$bd->query($q);
        while($datos=$result->fetch_assoc()){
            $songs[] = new Cancion($datos);
        }
        return $songs;
    }

    
    public static function addSong($datos,$files){
        $image = $files['img']['name'];
        move_uploaded_file($files['img']['tmp_name'],'./public/'.$image);
        $song = $files['song']['name'];
        move_uploaded_file($files['song']['tmp_name'],'./public/'.$song);
        $imgl='./public/'.$image;
        $songl='./public/'.$song;
        $bd=Conectar::conexion();
        $q="INSERT INTO songs VALUES (null,'".$datos["tNSong"]."','".$datos["ath"]."','".$datos["dur"]."','".$imgl."',".$_SESSION['user']->getId().",'".$songl."')";
        $result=$bd->query($q);
    }


    public static function searchSong($search,$order){
        $numSongs = 0;
        if(!empty($_GET['pag'])){
            if($_GET['pag']>=2){ 
                $numSongs=($_GET['pag']*5)-5;
            }
        }
        $bd=Conectar::conexion();
        $songs=NULL;
        if($order=="Non"){
            $q="SELECT * FROM songs WHERE tittle LIKE '%".$search."%' OR author LIKE '%".$search."%'";
        }
        else if($order=="Asc"){
            $q="SELECT * FROM songs WHERE tittle LIKE '%".$search."%' OR author LIKE '%".$search."%' ORDER BY tittle ASC";
        }
        else if($order=="Desc"){
            $q="SELECT * FROM songs WHERE tittle LIKE '%".$search."%' OR author LIKE '%".$search."%' ORDER BY tittle DESC";
        }
        $result=$bd->query($q);

        while($datos=$result->fetch_assoc()){
            $songs[] = new Cancion($datos);
        }
        return $songs;
    }

  
}
?>