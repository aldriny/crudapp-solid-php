<?php

if ($session->get('success')){
    echo "<div class='alert alert-success'>" . $session->get('success') . "</div>";
    $session->remove('success');
}