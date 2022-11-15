<?php


class exampleTest extends \PHPUnit\Framework\TestCase {

    public function registerTest(){

        $register = new Tester\registerClass("Alberto", "Veloso", "albertoveloso", "aiv8","randompassword","ramdompassword")

        //tests
        $this->assertNotSame("randompassword", $register->getConfirmPassword());
        $this->assertSame("randompassword", $register->getPassword())
    }




}
//tried to run the tests by using "./vendor/bin/phpunit" but it gave me an error saying 
//No such file or directory while the file does exist in the director.