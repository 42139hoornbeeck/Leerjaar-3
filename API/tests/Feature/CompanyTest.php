<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class CompanyTest extends TestCase
{

    use RefreshDatabase;

    private $user;

    public function setUp(): void
    {
        parent::setUp();

        User::factory(1)->create(['password' => Hash::make('testing')]);
        $this->user = (new User)->first();
    }

    // 1
    public function test_get_single_company_expect_exact_result()
    {
        $this->actingAs($this->user);

        $company = Company::factory(1)->create()->first();
        $response = $this->getJson('/api/companies/' . $company->id);

        $response->assertStatus(200)->assertExactJson(["data" => [
            "id" => $company->id,
            "name" => $company->name,
            "created_at" => $company->created_at,
            "updated_at" => $company->updated_at
        ]
        ]);
    }

    // 2
    public function test_get_5_companies_expect_see_result()
    {
        $this->actingAs($this->user);

        $company = Company::factory(5)->create();
        $response = $this->getJson('/api/companies/');

        $response->assertStatus(200)->assertSee([
            'data',
            'links',
            'meta'
        ]);
    }

    // 3
    public function test_post_new_company_expect_200()
    {
        $this->actingAs($this->user);

        $response = $this->post('/api/companies/', ['name' => 'Sally']);

        $response->assertStatus(200);
    }

    // 4
    public function test_update_new_company_expect_200()
    {
        $this->actingAs($this->user);

        $company = Company::factory(1)->create()->first();

        $response = $this->put('/api/companies/' . $company->id, ['name' => 'Bevers']);

        $response->assertStatus(200);
    }

    // 5
    public function test_delete_new_company_expect_200()
    {
        $this->actingAs($this->user);

        $company = Company::factory(1)->create()->first();

        $response = $this->delete('/api/companies/' . $company->id);

        $response->assertStatus(200);
    }
}
