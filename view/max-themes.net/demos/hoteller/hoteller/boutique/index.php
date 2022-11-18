<?php
include 'header.php';

if ((isset($_GET['act'])) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'ourrooms':
            include "our-rooms.php";
            break;
        case 'dining':
            include "dining.php";
            break;
        case 'about':
            include "about.php";
            break;
        case 'contact':
            include "contact.php";
            break;
        case 'booknow':
            include "booking-now.php";
            break;
        case 'deluxe':
            include "deluxe-room.php";
            break;
        case 'superior':
            // include "deluxe-room.php";
            break;
        case 'signature':
            // include "deluxe-room.php";
            break;
        case 'luxury':
            // include "deluxe-room.php";
            break;
        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}
include 'footer.php';
