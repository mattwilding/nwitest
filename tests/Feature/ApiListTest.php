<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Database\Factories\SubmissionFactory;

class ApiListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/api/submissions');
        $response->assertStatus(200);
    }

    public function testSingle()
    {
        $response = $this->get('/api/submissions/2');
        $response->assertStatus(200);
    }

    public function testAddSubmission()
    {
        $submission = SubmissionFactory::new()->make();

        $response = $this->withHeaders([
            'X-Header' => 'Value',
        ])->json('POST', '/api/submissions/new', $submission->toArray());

        $response->assertStatus(200)
            ->assertJson(['result' => 'success']);
    }

}
