<?php
include 'database/configuration.php';
session_destroy();
header('location:index.php');