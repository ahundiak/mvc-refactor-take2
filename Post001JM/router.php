<?php
// php -S localhost:8008 router.php
if (is_file('.' . $_SERVER["REQUEST_URI"])) return false;
require 'index.php';
