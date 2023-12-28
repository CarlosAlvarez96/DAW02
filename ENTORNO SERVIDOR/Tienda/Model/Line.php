<?php
class Line implements JsonSerializable
{
    private $idProduct, $idPedido, $lot, $state;

    public function __construct($data)
    {
        $this->idProduct = $data['idProduct'];
        $this->idPedido = $data['idPedido'];
        $this->lot = $data['lot'];
        $this->state = $data['state'];
    }

    public function getIdProduct()
    {
        return $this->idProduct;
    }

    public function getIdPedido()
    {
        return $this->idPedido;
    }

    public function getLot()
    {
        return $this->lot;
    }

    public function getState()
    {
        return $this->state;
    }

    public function jsonSerialize()
    {
        return [
            'idProduct' => $this->idProduct,
            'idPedido' => $this->idPedido,
            'lot' => $this->lot,
            'state' => $this->state,
        ];
    }
}
