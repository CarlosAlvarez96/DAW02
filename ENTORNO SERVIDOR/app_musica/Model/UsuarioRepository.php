<?php
class UsuarioRepository
{
    public static function registrarUsuario($password, $name, $img, $rol)
    {
        $bd = Conectar::conexion();
        $passHash = md5($password); // Hashea la contraseña con md5
        $q = "INSERT INTO reproductor.user VALUES (NULL, '$passHash','$name', '$img', '$rol')";
        $result = $bd->query($q);

        if ($result) {
            // La inserción fue exitosa
            return true;
        } else {
            // Error en la inserción
            return false;
        }
    }
    public static function checkLogin($u, $p)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM user WHERE name='" . $u . "'";
        $result = $bd->query($q);
        if ($datos = $result->fetch_assoc()) {
            if ($datos['password'] == md5($p)) {
                return new Usuario($datos);
            }
        } else return NULL;
    }


    public static function getUserById($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM user WHERE id='" . $id . "'";
        $result = $bd->query($q);
        if ($datos = $result->fetch_assoc()) {
            $user = new Usuario($datos);
            return $user->getName();
        } else return NULL;
    }
    public static function getImgByUserId($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM user WHERE id='" . $id . "'";
        $result = $bd->query($q);
        if ($datos = $result->fetch_assoc()) {
            $user = new Usuario($datos);
            return $user->getImg();
        } else return NULL;
    }
}
