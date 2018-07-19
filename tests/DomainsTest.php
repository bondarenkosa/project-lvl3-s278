<?php
namespace Tests;

use Tests\TestCase;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    use DatabaseMigrations;

    public function testDomainsPost()
    {
        $data = ['name' => 'site.com'];
        $response = $this->post('domains', $data);
        $this->assertResponseStatus(302);

        $this->seeInDatabase('domains', $data);
    }

    public function testDomainCreateAndView()
    {
        $data = ['name' => 'test.org'];
        $domain = factory('App\Domain')->create($data);
        $this->seeInDatabase('domains', $data);

        $this->get("domains/{$domain->id}");
        $this->assertResponseOk();
    }
}
