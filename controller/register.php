<?php

    include_once __DIR__.'/../model/user_session.php';
    include_once __DIR__.'/../model/connectionBD.php';

    $connection = connectionBD();
    register($connection);

    include_once __DIR__.'/../view/registered.php';

?>