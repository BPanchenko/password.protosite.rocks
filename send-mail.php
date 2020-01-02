<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, PUT, PATH, DELETE, OPTIONS");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, toquery");

    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'OPTIONS') {
        header($_SERVER["SERVER_PROTOCOL"] . ' 200 OK', true, 200);
        exit();
    }

    $response = new \stdClass;
    $response->meta = new \stdClass;
    $response->data = NULL;

    $data = file_get_contents("php://input");
    $BODY = json_decode($data, true);

    $headers = 'From: Password Generator <noreplay@protosite.rocks>' . "\r\n";
    $headers .= 'Content-type: text/plain; charset=utf-8' . "\r\n";

    if (mail($BODY['to'], $BODY['subject'], $BODY['body'], $headers)) {
        header($_SERVER["SERVER_PROTOCOL"] . ' 200 OK', true, 200);
        $response->meta->code = 200;
    } else {
        header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
        $response->meta->code = 500;
    }

    die(json_encode($response));
?>