<?php

require(SYS . '/core/' . 'common.php');
require(SYS . '/core/' . 'controller.php');
require(SYS . '/core/' . 'model.php');
require(SYS . '/core/' . 'router.php');
$router = new router();
$router->initialize();