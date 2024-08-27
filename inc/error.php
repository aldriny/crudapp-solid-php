<?php

if ($session->get('errors')){
        foreach ($session->get('errors') as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
        $session->remove('errors');
    }