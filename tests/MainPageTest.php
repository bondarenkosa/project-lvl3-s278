<?php
namespace Tests;

use Tests\TestCase;

class MainPageTest extends TestCase
{
    public function testMainPage()
    {
        $this->get('/');
        $this->assertResponseOk();
    }
}
