<?php
$request = new HttpRequest();
$request->setUrl('https://rest.coinapi.io/v1/assets');
$request->setMethod(HTTP_METH_GET);
$request->setHeaders(array(
  'X-CoinAPI-Key' => '73034021-THIS-IS-SAMPLE-KEY'
));

try {
  $response = $request->send();
  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}

