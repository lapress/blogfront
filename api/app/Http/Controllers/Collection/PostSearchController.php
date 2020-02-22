<?php

namespace App\Http\Controllers\Collection;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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

    public function index(Request $request)
    {
        $data = $this->validate($request, [
            'from' => 'integer',
            'size' => 'integer',
            'query' => 'array'
        ]);

        return $this->collectionService->search('post', $data);
    }

    public function show(string $type)
    {
        return $this->collectionService->search('post');
    }
}
