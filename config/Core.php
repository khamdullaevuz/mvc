<?php

namespace Config;

class Core
{
    const APP_NAME = "MVC";

    const HOSTNAME = "localhost";
    const DBNAME = "mvc";
    const USERNAME = "root";
    const PASSWORD = "";
    const OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];
}
