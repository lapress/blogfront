<?php

namespace App\Http\Controllers\Collection;

use App\Http\Controllers\Controller;
use LaPress\BlogFront\Collection\ElasticSearchCollectionService;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class PostSearchController extends Controller
{
    /**
     * @var ElasticSearchCollectionService
     */
    private $collectionService;

    /**
     * @param ElasticSearchCollectionService $collectionService
     */
    public function __construct(ElasticSearchCollectionService $collectionService)
    {
        $this->collectionService = $collectionService;
    }

    public function index()
    {
        return $this->collectionService->search('post');
    }

    public function show(string $type)
    {
        // todo
        return $this->collectionService->search('post');
    }
}
