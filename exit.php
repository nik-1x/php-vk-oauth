<?php
session_start();

unset($_SESSION['token']);
unset($_SESSION['uid']);

header("Location: /");