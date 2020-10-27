<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\SubmissionFactory;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Submission;

class WebListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');
        $response->assertSee('All contacts');
    }

    public function testSingle()
    {
        $response = $this->get('/submission/3');
        $response->assertStatus(200);
    }

    public function testSingleNotFound()
    {
        $response = $this->get('/submission/xyz');
        $response->assertStatus(404);
    }

    public function testContact()
    {
        $response = $this->get('/contact');
        $response->assertStatus(200);
        $response->assertSee('Email address');
    }

    public function testFormSubmission()
    {
        $submissionCount = Submission::count();

        $submission = SubmissionFactory::new()->make();

        $submission['email_address'] = '';

        $submissionArray = $submission->toArray();

        // $submissionArray['_token'] = csrf_token();
        // $submissionArray['_method'] = 'POST';

        $response = $this->followingRedirects()->post('/contact-submit', $submissionArray)->assertSee('All contacts');
    }
}
