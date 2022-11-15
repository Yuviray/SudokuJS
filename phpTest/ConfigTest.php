<?php
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase {
    /** @test */
    public function configTest(){
        $config = new Tester\ConfigClass("empty","hello","empty","empty");
        $result = $config->getRoot("hello");

        // Yuvanesh's firsttime unit testng with php
        // we only have 1 php class to test and its simple
        // to run tests use this command: ./vendor/bin/phpunit
        $this->assertNotEmpty($result);
        $this->assertEquals("hello",$result);


        //Waleed Naveed 
        $config_test = new Tester\ConfigClass("host","root","pass","db");
 

        $this->assertSame("host", $config_test->getHost());
        $this->assertSame("root", $config_test->getRoot());
        $this->assertSame("pass", $config_test->getPass());
        $this->assertSame("db", $config_test->getDb());

       
    }
 }