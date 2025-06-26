<?php
function redirectView($url){
    header("location: $url");
    exit();
}