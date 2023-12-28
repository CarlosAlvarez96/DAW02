<?php

class Pedido implements JsonSerializable
{
    private $id, $lines, $idUser, $state, $datetime, $total;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this->lines = LineRepository::getLinesById($data['id']);
        $this->idUser = $data['idUser'];
        $this->state = $data['state'];
        $this->datetime = $data['datetime'];
        $this->total = $data['total'];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function deleteLines()
    {
        $this->lines = [];
    }

    public function addLine($line)
    {
        $this->lines[] = $line;
    }

    public function getIdUser()
    {
        return $this->idUser;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'lines' => $this->lines,
            'idUser' => $this->idUser,
            'state' => $this->state,
            'datetime' => $this->datetime,
            'total' => $this->total
        ];
    }
}
