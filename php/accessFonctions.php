<?php
require_once '../inc/accessBd.inc';
$fonction = $_POST['fonction'];
unset($_POST['fonction']);
$fonction($_POST);