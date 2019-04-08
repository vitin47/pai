<?php

//anti-sql injection

function anti_injection($sql){
$sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "" ,$sql);
$sql = trim($sql);
$sql = strip_tags($sql);
$sql = (get_magic_quotes_gpc()) ? addslashes($sql) : $sql;
return $sql;
}
?>