<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->get('/');

        $pathToFileWithExpectedData = implode(DIRECTORY_SEPARATOR, ["tests", "fixtures", "navbar.html"]);
        $expected = file_get_contents($pathToFileWithExpectedData);

        $this->assertEquals(
            $expected, $this->response->getContent()
        );
    }
}
