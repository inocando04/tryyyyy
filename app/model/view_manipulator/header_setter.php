<?php
//Sets the header key
if($_SESSION['requestedPage'] === 'system'){
    $_SESSION['header_tracker'] = "in";
} else {
    $_SESSION['header_tracker'] = "out";
}