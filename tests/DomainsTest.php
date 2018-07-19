<?php
namespace Tests;

use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    use DatabaseMigrations;

    protected $newData = ['name' => 'site.com'];

    public function testDomainsPost()
    {
        $response = $this->post('domains', $this->newData);
        $this->assertResponseStatus(302);

        $this->seeInDatabase('domains', $this->newData);
    }

    public function testDomainsCreateAndView()
    {
        $domain = factory('App\Domain')->create($this->newData);
        $this->seeInDatabase('domains', $this->newData);

        $this->get("domains/{$domain->id}");
        $this->assertResponseOk();

        $this->get("domains");
        $this->assertResponseOk();
    }
}
