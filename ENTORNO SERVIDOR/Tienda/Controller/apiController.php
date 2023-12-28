<?php
if (isset($_GET['carrito'])) {
    $pedido = PedidoRepository::getPedidoActual();
    $json = json_encode($pedido, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT para una salida más legible
    file_put_contents("./datos.json", $json);
    echo $json;
}

if (isset($_GET['pedido'])) {
    $pedido = PedidoRepository::getPedidoById($_GET['pedido']);
    $json = json_encode($pedido, JSON_PRETTY_PRINT);
    file_put_contents("./datos.json", $json);
    echo $json;
}

if (isset($_GET['allPedidos'])) {
    $pedidos = $_SESSION['user']->getOrders();
    $json = json_encode($pedidos, JSON_PRETTY_PRINT);
    file_put_contents("./datos.json", $json);
    echo $json;
}
