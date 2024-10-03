<?php

session_start();//inicia sessão que foi aberta
session_unset();//limpamos as variaveis globais das sessoes
session_destroy();//destroi sessao

echo "<script> alert('Você encerrou a sessão. Para recomçar, faça o login.');top.location.href='login.php';</script>";
?>