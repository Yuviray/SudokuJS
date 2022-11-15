<?php

use MVTest\AllIndex;
use Tester\ConfigClass;
require "indexClass.php";
require "backend/configClass.php";

class IndexTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function testIndex()
    {   
        //********************************************************************************************************************/
        //Loads Server Backend as done in "index.php"
        $serverInit = new ConfigClass( "localhost","root","", "sudokuPlus" );
        $session = mysqli_connect($serverInit->getHost(), $serverInit->getRoot(),$serverInit->getPass(), $serverInit->getDb());
        $result = mysqli_query($session, "SELECT user_name, minutes, seconds FROM users ORDER BY minutes, seconds ASC");
        $row = mysqli_fetch_array($result);

        $username = $row['user_name'];
        $minutes  = $row['minutes'];
        $seconds  = $row['seconds']; 
        //********************************************************************************************************************/

        $testVals = new MVTest\AllIndex( "Null", "Null", "Null" ); //Loads value retrived values into class for testing

        $returnedUsername = $testVals->getUsername();
        $returnedMinutes = $testVals->getMinutes();
        $returnedSeconds = $testVals->getSeconds();

        //If NULL, Backend not started.
        $this->assertNotNull($username, "NULL. SudokuPlus backend server is NOT active");
        $this->assertNotNull($minutes, "NULL. SudokuPlus backend server is NOT active");
        $this->assertNotNull($seconds, "NULL. SudokuPlus backend server is NOT active");

        //If Backend active, check if is vals aren't NULL (ex: no registered users)
        //Class init to NULL vals, so it compares to them.
        $this->assertNotSame($username, $returnedUsername);
        $this->assertNotEquals($minutes, $returnedMinutes);
        $this->assertNotEquals($seconds, $returnedSeconds);

        //If Backend active and aren't null. Assure they are contain valid values.
        $this->assertIsString($username);
        $this->assertIsNumeric($minutes);
        $this->assertIsNumeric($seconds);

    }
}
