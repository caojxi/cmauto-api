<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }

    public function getObjectId($response)
    {
        $response = json_decode($response->getContent());

        return $response->data->id;
    }
    
    public function makeCreateShowUpdateTest($data, $route, $updatedData)
    {
        $response = $this->call('POST', $route, $data);

        $id = $this->getObjectId($response);

        $this->get("{$route}/{$id}")->seeJson($data);

        $this->post("/{$route}/{$id}", $updatedData)->seeJson($updatedData);
    }
}
