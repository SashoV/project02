<?php

function logMessage($msg)
{
    $logMessage = date("Y-m-d H:i:s", time()) . ": " . $msg . "\n";
    file_put_contents("log.txt", $logMessage, FILE_APPEND);
}

function checkModalEmail()
{
    if (empty($_POST['email'])) {
        header("Location: index.php?danger=required");
        die();
    }
}

function isEmailValid()
{
    if (!preg_match("/^(?=[^@]{4,}@)([\w\.-]*[a-zA-Z0-9_]@(?=.{4,}\.[^.]*$)[\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z])$/", strtolower($_POST['email']))) {
        header("Location: index.php?danger=notvalidemail");
        die();
    }
}

function checkRegisterEmail()
{
    if (!preg_match("/^(?=[^@]{4,}@)([\w\.-]*[a-zA-Z0-9_]@(?=.{4,}\.[^.]*$)[\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z])$/", strtolower($_POST['email']))) {
        header("Location: register.php?danger=notvalidemail");
        die();
    }
}

function checkLoginEmail()
{
    if (!preg_match("/^(?=[^@]{4,}@)([\w\.-]*[a-zA-Z0-9_]@(?=.{4,}\.[^.]*$)[\w\.-]*[a-zA-Z0-9]\.[a-zA-Z][a-zA-Z\.]*[a-zA-Z])$/", strtolower($_POST['email']))) {
        header("Location: login.php?danger=notvalidemail");
        die();
    }
}

function checkLoginFields()
{
    if (empty(strtolower($_POST['email'])) || empty($_POST['password'])) {
        header("Location: login.php?danger=required");
        die();
    }
}

function checkRegisterFields()
{
    if (empty($_POST['name']) || empty($_POST['lastname']) || empty($_POST['company']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['phone-number']) || empty($_POST['no-of-employees']) || empty($_POST['sector'])) {
        header("Location: register.php?danger=required");
        die();
    }
}
