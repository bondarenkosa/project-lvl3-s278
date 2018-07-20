<?php
namespace Tests;

use Tests\TestCase;
use App\Domain;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class DomainsTest extends TestCase
{
    use DatabaseMigrations;

    protected $newData = ['name' => 'https://ru.hexlet.io'];

    public function testDomainsPost()
    {
        $this->post('domains', $this->newData);
        $this->assertResponseStatus(302);
        $this->seeInDatabase('domains', $this->newData);

        $wrongData = ['name' => 'not valid url'];
        $this->post('domains', $wrongData);
        $this->assertResponseStatus(422);
        $this->notSeeInDatabase('domains', $wrongData);
    }

    public function testDomainsMassAssignment()
    {
        $wrongId = 9999;
        $domainName = 'https://ya.ru';
        $wrongData = [
            'id' => $wrongId,
            'name' => $domainName
        ];
        $this->post('domains', $wrongData);
        $this->assertResponseStatus(302);
        $this->notSeeInDatabase('domains', $wrongData);
        $this->seeInDatabase('domains', ['name' => $domainName]);
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
