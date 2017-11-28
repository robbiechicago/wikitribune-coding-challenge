<?php

require 'team.class.php'

class team_test extends PHPUnit_Framework_TestCase {

  private $team;
 
    protected function setUp()
    {
        $this->team = new Team();
    }
 
    protected function tearDown()
    {
        $this->team = NULL;
    }
 
    public function testAdd()
    {
        $result = $this->team->add_result(2, 1);
        $this->assertEquals(1, $result->total_games_played);
    }

}

?>