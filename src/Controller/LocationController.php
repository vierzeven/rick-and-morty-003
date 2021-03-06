<?php

namespace App\Controller;

use App\Http\RickAndMortyApiClient;

class LocationController
{
    /**
     * @var RickAndMortyApiClient
     */
    private $apiClient;

    /**
     * CharacterController constructor method
     */
    public function __construct()
    {
        $this->apiClient = new RickAndMortyApiClient();
    }

    /**
     * Returns all locations
     * @return mixed
     */
    public function index($page)
    {
        $locations = $this->apiClient->callAPI('location?page=' . $page);
        return isset($locations['error']) ? [] : $locations;
    }

    /**
     * Returns one specific location
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $location = $this->apiClient->callAPI('location/' . $id);
        return isset($location['error']) ? [] : $location;
    }

}
