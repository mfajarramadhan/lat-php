<?php

if (!session_id()) session_start();
// // sama saja
// if (!session_id()) {
//     session_start();
// }

require_once '../app/init.php';

$app = new App();
