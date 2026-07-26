<?php

require_once('../model/Response.php');

$response = new Response();
$response->httpstatuscode(404);
$response->setsuccess(false);
$response->addmessage("endpoint not found");
$response->send();
exit;
