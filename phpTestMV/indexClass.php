<?php
namespace MVTest;

class AllIndex
{
    private $username;
    private $minutes;
    private $seconds;

    function constructor( $username, $minutes, $seconds )
    {
        $this->username = $username;
        $this->minutes = $minutes;
        $this->seconds = $seconds;
    }

    function getUsername(){
        return $this->username;
    }

    function getMinutes() {
        return $this->minutes;
    }

    function getSeconds() {
        return $this->seconds;
    }
}

?>