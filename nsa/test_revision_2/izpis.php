<?php

require_once("utils.php");

check_access(["A", "X"]);

session_destroy();