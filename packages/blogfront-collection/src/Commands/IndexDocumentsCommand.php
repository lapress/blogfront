<?php

namespace LaPress\BlogFront\Collection\Commands;

use LaPress\BlogFront\Collection\ElasticSearchCollectionService;
use LaPress\BlogFront\Collection\Jobs\SaveCollectionDocumentJob;
use LaPress\BlogFront\Commands\BaseCommand;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class IndexDocumentsCommand extends BaseCommand
{
    protected $signature = 'blogfront:collection:reindex';
    protected $description = 'Reindex all documents';

    protected $results = [];

    /**
     * @var ElasticSearchCollectionService
     */
    private $collectionService;

    /**
     * @param ElasticSearchCollectionService $collectionService
     */
    public function __construct(ElasticSearchCollectionService $collectionService)
    {
        parent::__construct();
        $this->collectionService = $collectionService;
    }

    public function handle()
    {
        $indexes = config('collection.indexes', []);

        foreach ($indexes as $key => $resources ) {
            foreach ($resources as $resource) {
                $this->handleResource($key, $resource);
//                class_basename(new $resource);
//
//                $resource::published()->chunk(100, function ($chunk) use($key){
//                    foreach ($chunk as $item) {
//                        $this->collectionService->saveDocument($key, $item);
//                    }
//                });
            }
        }
    }

    public function handleResource($key, $resource)
    {
        // fixme add verification on interface
        $name = class_basename(new $resource);
        $resource = $resource::indexable();
        $count = $resource->count();

        $this->results[$name] = $count;

        $this->line(sprintf('Found %d items of type %s', $count, $name));
        $bar = $this->output->createProgressBar($count);

        $resource->chunk(100, function ($chunk) use ($bar, $key){
            foreach($chunk as $item) {
                SaveCollectionDocumentJob::dispatchNow($key, $item);
                $bar->advance();
            }
        });
        $bar->finish();
    }
}
