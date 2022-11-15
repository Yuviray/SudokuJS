<?php

namespace Tester;
class ConfigClass {
 
    private $fname;
    private $lname;
    private $username;
    private $email;
    private $password;
    private $confirmpassword;

 
    function __construct( $fname, $lname, $username, $email, $password, $confirmpassword) {
        $this->fname = $fname;
        $this->lname = $lname;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->confirmpassword = $confirmpassword;
    }
 
    function getFname() {
        return $this->fname;
    }
    function getLname() {
        return $this->lname;
    }
    function getUsername() {
        return $this->username;
    }
    function getEmail() {
        return $this->email;
    }
    function getPassword() {
        return $this->password;
    }
    function getConfirmPassword() {
        return $this->confirmpassword;
    }
 
    
 
}
?>