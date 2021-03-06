<?php

namespace App\Controller;

use App\Http\RickAndMortyApiClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController
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
     * Returns all characters
     * @return mixed
     */
    public function index($page)
    {
        $characters = $this->apiClient->callAPI('character?page=' . $page);
        return isset($characters['error']) ? [] : $characters;
    }

    /**
     * Returns one specific character
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $character = $this->apiClient->callAPI('character/' . $id);
        return isset($character['error']) ? [] : $character;
    }
}