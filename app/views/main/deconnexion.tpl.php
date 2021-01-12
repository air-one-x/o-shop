<?php

session_destroy();
header('location:'.$router->generate('main-home'));