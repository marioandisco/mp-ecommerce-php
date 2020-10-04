<?php
// SDK de Mercado Pago
//require __DIR__ .  '/vendor/autoload.php';
include_once("vendor/autoload.php");

// Agrega credenciales
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "https://marioandisco-mp-comerce-php.herokuapp.com/success.php",
    "failure" => "http://marioandisco-mp-comerce-php.herokuapp.com/failure.php?error=failure",
    "pending" => "http://marioandisco-mp-comerce-php.herokuapp.com/pending.php?error=pending"
);
$preference->auto_return = "approved";
// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = $_POST["id"];
$item->title = $_POST["title"];
$item->descripcion = $_POST["descripcion"];
$item->quantity = 1;
$item->img = $_POST["img"];
$item->unit_price = $_POST["price"];
$item->external_reference = $_POST["external_reference"];
$preference->items = array($item);
$preference->save();
?>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title></title>
</head>

<body>
<form action="/procesar-pago.php" method="POST">
  <script
   src="https://www.mercadopago.com.mx/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>

</body>

</html>
