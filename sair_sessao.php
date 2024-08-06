<?php
    session_start();
    session_unset(); // remove as variaveis da sessão actual.
    session_destroy();

?>