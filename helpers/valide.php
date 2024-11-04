<?php

$errors = [];

if(!$title){
    $errors[] = 'titre de produit est vide ';
};

if(!$date){
    $errors[] = 'choisi la date ';
};

if(!$body){
    $errors[] = 'description de produit est vide ';
};