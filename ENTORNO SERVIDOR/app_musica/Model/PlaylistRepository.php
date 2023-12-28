<?php
class PlaylistRepository
{
    public static function cancionesPlaylist($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM songs INNER JOIN playlistsongs ON songs.id = playlistsongs.id_song WHERE id_playlist=" . $id . ";";
        $result = $bd->query($q);
        $songs = [];
        while ($datos = $result->fetch_assoc()) {
            $songs[] = new Cancion($datos);
        }
        return $songs;
    }

    public static function addsongtoplaylist($datos)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM songs WHERE tittle = '" . $datos['cancion'] . "'";
        $result = $bd->query($q);
        $songs = [];
        while ($datos = $result->fetch_assoc()) {
            $songs[] = new Cancion($datos);
        }
        $q = "INSERT INTO playlistsongs VALUES (" . $songs[0]->getId() . ",'" . $_GET["p"] . "')";
        $bd->query($q);
    }

    public static function addplaylist($datos, $img)
    {
        $image = $img['img']['name'];
        move_uploaded_file($img['img']['tmp_name'], 'public/' . $image);
        $imgl = './public/' . $image;
        $bd = Conectar::conexion();
        $q = "INSERT INTO playlist VALUES (null," . $_SESSION['user']->getId() . ",'" . $datos["tNPlay"] . "','" . $imgl . "')";
        $result = $bd->query($q);
    }

    public static function addplaylistliked($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE id = '" . $id . "'";
        $result = $bd->query($q);
        $playlist = [];
        while ($datos = $result->fetch_assoc()) {
            $playlist[] = new Playlist($datos);
        }
        $q = "INSERT INTO playlist VALUES (null," . $_SESSION['user']->getId() . ",'" . $playlist[0]->getTittle() . "','" . $playlist[0]->getImg() . "')";
        $bd->query($q);
        $q = "SELECT * FROM playlist WHERE id_user = '" . $_SESSION['user']->getId() . "' AND tittle='" . $playlist[0]->getTittle() . "'";
        $nplaylist = [];
        $result = $bd->query($q);
        while ($datos = $result->fetch_assoc()) {
            $nplaylist[] = new Playlist($datos);
        }
        $songs = $playlist[0]->getSongs();
        for ($i = 0; $i < $playlist[0]->getSongNum(); $i++) {
            $song = $songs[$i];
            $q = "INSERT INTO playlistsongs VALUES(" . $song->getId() . "," . $nplaylist[0]->getId() . ")";
            $bd->query($q);
        }
        $q = "INSERT INTO playlistliked VALUES ('" . $playlist[0]->getId() . "','" . $_SESSION['user']->getId() . "')";
        $bd->query($q);
    }

    public static function playlistnotliked($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlistliked WHERE id_playlistliked=" . $id . " AND id_user=" . $_SESSION['user']->getId() . ";";
        $result = $bd->query($q);
        $playlist = [];
        while ($datos = $result->fetch_assoc()) {
            $playlist[] = $datos;
        }
        if (count($playlist) > 0) {
            return false;
        } else {
            return true;
        }
    }

    public static function playlistUser($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE id_user=" . $id . ";";
        $result = $bd->query($q);
        $playlists = [];
        while ($datos = $result->fetch_assoc()) {
            $playlists[] = new Playlist($datos);
        }
        return $playlists;
    }

    public static function playlistNotUser($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE id_user!=" . $id . ";";
        $result = $bd->query($q);
        $playlists = [];
        while ($datos = $result->fetch_assoc()) {
            $playlists[] = new Playlist($datos);
        }
        return $playlists;
    }

    public static function playlistDuration($songs)
    {
        $total_seconds = 0;
        foreach ($songs as $song) {
            $str_time = $song->getDuration();
            sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
            $time_seconds = isset($seconds) ? $hours * 3600 + $minutes * 60 + $seconds : $hours * 60 + $minutes;
            $total_seconds += $time_seconds;
        }
        return gmdate("H:i:s", $total_seconds);
    }

    public static function getPlaylist($id)
    {
        $bd = Conectar::conexion();
        $q = "SELECT * FROM playlist WHERE id=" . $id . ";";
        $result = $bd->query($q);
        $playlist = [];
        while ($datos = $result->fetch_assoc()) {
            $playlist[] = new Playlist($datos);
        }
        return $playlist[0];
    }
}
