<?php

function hashPassword($plainPassword){
    return password_hash($plainPassword, PASSWORD_DEFAULT);
}


function verifyPassword($plainsPassword,$hashPassword){
    return password_verify($plainsPassword,$hashPassword);
}