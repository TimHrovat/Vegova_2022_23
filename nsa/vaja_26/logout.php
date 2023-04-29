<?php

require_once("utils.php");

check_access();

session_unset();
session_destroy();

header("location: login.php");