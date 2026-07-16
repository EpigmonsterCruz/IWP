<?php
session_unset();
session_destroy();

header('location: ' . BASE_URL . '/login');
exit();
