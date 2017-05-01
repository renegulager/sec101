<?php

 $host = 'localhost';
 $user = 'root';
 $pass = ' ';
 $errors = false;
 $errorMessages = "There is one or more error : ";
$_POST['name'] = "rene<h1>";
$_POST['email'] = "####<script><>dda.!d@dd.dk";
$_POST['password'] = "1234DD!!$";
$_POST['street'] = "Gågaden 11 ";
$_POST['postnr'] = 1222;
$_POST['socialsecuritynumber'] = '120593-3522229';

if( true ) //isset( $_POST['submit_form'] )
{

 
 /*
  validates and whielist no need for sanitization
 */
 function validatePostnr($data){

 	if (preg_match("/^[0-9]{4}$/", $data))
		{
    		return true;
		}
	return false;	
 }

/* 
  is the password valid accorting to the rulse, cool, then  encryptit
*/ 
 function validatePassword($data){
/*
from  ^
to  $
at lest one number (?=.*\d) subpattern
at least one letter (?=.*[A-Za-z]) subpatten
and it has to be a number, a letter or one of the following: !@#$% -> [0-9A-Za-z!@#$%]
and there have to be 8-64 characters -> {8,64}
*/
  if(preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,64}$/', $data)) {
    return password_hash($data, PASSWORD_DEFAULT); 
            
  }
    else{
      //handle error 
      return; 
    }

 }

/*
  min length = 5
  max length = 128
  a-zA-Z é and a space for the rest (after é there is an space )
  
*/
function validateName($data)
{ 

 if (preg_match('/^[a-zA-ZøæåØÆÅ+é ]{5,128}$/', $data) ) {
   return $data;

 }
 else {
  //handle error
  return ;
 } 
}
/*
Checks   it is a valid email
clears it up.
*/
function validateEmail($data) {
  if(filter_var($data, FILTER_VALIDATE_EMAIL)){ 
    return filter_var($data, FILTER_SANITIZE_EMAIL);
  } else {
   //handle error
   return;
  }


}

/*
  min length = 5
  max length = 128
  a-zA-Z +øæåØÅ and a space for the rest (after é there is an space )
  Note a better way would be a lookup in somekind of database eg google 

*/
function validateStreet($data) {
 if (preg_match('/^[a-zA-Z0-9+ØÆÅøæå ]{5,128}$/', $data) ) {
   return ucfirst ( $data) ; //first character should be capital

 }
 else {
  //handle error
  return ;
 } 

}


/* cpr numbers are complex to validate, and would require a complex regex to validate 100%
    clean up data, 
    makesure it is int and 10 charactrhas
    HASH it, never ever store cpr numbers! if not needed.

*/  
function validateSocialSecurityNumber($data) {
    
      $data = str_replace('-','', $data); //remove - in cpr numbers
      $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    
      if(strlen($data)==10){
   
         $data  = hash('sha256', $data.'salt');
        return $data; 
        } 
      else{
        //handle error
        return; 
      }
 }

//simpe tests 
// echo validateName("René Gulager Larsens");

//email
//echo "\nvalid: ".validateEmail("aa@dr.dk");
//echo "\nnot valid: ".validateEmail("####<script><>dda.!d@dd.dk");p
//echo "\nvalid:". validateEmail("!def!x+yz%./abc@example.ninja");

//Password
//echo "\nvalid password: ". validatePassword("1dkopmn!");
//echo "\nnot valid password: ". validatePassword("1dk!");

//address 
//echo "\nvalid address: ". validateStreet("Højbovej 2");
//echo "\nvalid address: ". validateStreet("tøj bov  ej 2");
//echo "\ninvalid address: ". validateStreet("a 22");

//validate cpr
// echo "\n valid cpr". validateSocialSecurityNumber("190579-2222");
// echo "\n valid cpr". validateSocialSecurityNumber("1905792222");

/*
 if($errors) {
  echo $errorMessages;
 } else {

    $insertData=" INSERT INTO user_data VALUES('$name','$street','$postnr','$socialsecuritynumber', '$email','$password')";
  
    
    mysql_connect($host, $user, $pass);
    mysql_select_db('demo');
    mysqli_query($insertdata);
  }
*/
}
?>
