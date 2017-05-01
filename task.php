<?php

// $host = 'localhost';
// $user = 'root';
// $pass = ' ';
// $errors = false;
// $errorMessages = "There is one or more error : ";

/*
$_POST['name'] = "Peter Jenkins";
$_POST['email'] = "da@da.dk";
$_POST['password'] = "1234DD!!$";
$_POST['street'] = "Gug gaden 11 ";
$_POST['postnr'] = 1222;
$_POST['socialsecuritynumber'] = '120593-3522229';
*/
if( true ) //isset( $_POST['submit_form'] )
{

/*
a number 
from 0000-9999

*/
function validatePostnr($data){

}
/*
 min length 8
 max length 64
 min letter
 min one number 
 min one of special !@#$% 
*/
function validatePassword($data){

}
/*
 min length = 5
  max length = 128
  a-zA-Z é and a space for the rest (after é there is an space )
*/
function validateName($data)
{ 

}

// a valid Email
function validateEmail($data) {

}
/*
  min length = 5
  max length = 128
  a-zA-Z +øæåØÅ and a space for the rest (after é there is an space )
  Note a better way would be a lookup in somekind of database eg google 
*/
function validateStreet($data) {

}
/*
 10 numbers in the format of xxxxxx-xxxx (6-4) or xxxxxxxxxx (10) 
*/
function validateSocialSecurityNumber($data) {
    
}

//simpe tests 
// echo validateName("René Larsen");

// echo validateName("Egon 22Løkke");

//email
//echo "\nvalid: ".validateEmail("aa@dr.dk");
//echo "\nnot valid: ".validateEmail("####<script><>dda.!d@dd.dk");p
//echo "\nvalid: ". validateEmail("!def!x+yz%./abc@example.ninja");

//Password
//echo "\nvalid password: ". validatePassword("1dkopmn!");
//echo "\nnot valid password: ". validatePassword("1dk!");

//address 
//echo "\nvalid address: ". validateStreet("jonstup vej 2");
//echo "\nvalid address: ". validateStreet("tøj bov  ej 2");
//echo "\ninvalid address: ". validateStreet("a 22");

//validate cpr
// echo "\n valid cpr". validateSocialSecurityNumber("190579-2222");
// echo "\n valid cpr". validateSocialSecurityNumber("1905792222");

}
?>
