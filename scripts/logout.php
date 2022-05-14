<?php

include_once(ROOT . '/services/auth_service.php');

logout();
header("Location: index.php?page=login");
?>