<?php
function disconnect () {
   global $pdo, $stm;
   $stm = null;
   $pdo = null;
}
?>