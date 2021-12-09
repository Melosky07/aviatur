<?php

$usuario = implode("", file("../templates/user-profile.html"));
$userTabla = implode("", file("../templates/user-table.html"));
$user_info = implode("", file("../templates/user_info.html"));
$usuario = str_replace("[USER-TABLA]", $userTabla, $usuario);
$usuario = str_replace("[USER-INFO]", $user_info, $usuario);
echo $usuario;

