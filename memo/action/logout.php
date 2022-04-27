<?php
    session_start();
    $_SESSION = [];//セッション情報が消えないので空配列で上書き
    session_destroy();//セッションのデータを削除

    header('Location: ../../login/');
    exit;
