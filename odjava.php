<?php
session_start();
$_SESSION['korisnik']=NULL;
header("Location: login.html");