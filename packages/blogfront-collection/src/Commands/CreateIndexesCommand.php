<?php

namespace LaPress\BlogFront\Collection\Commands;

use LaPress\BlogFront\Collection\ElasticSearchCollectionService;
use LaPress\BlogFront\Collection\Mappings\MappingInterface;
use LaPress\BlogFront\Commands\BaseCommand;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class CreateIndexesCommand extends BaseCommand
{
    protected $signature = 'blogfront:collection:indexes';
    protected $description = 'Refresh elastic search indexes';
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
        $this->comment('This action will remove following collection indexes:');
        foreach ($this->collectionService->getIndexesResourcesNames() as $name) {
            $this->line('- '.$name);
        }
        $confirmed = $this->confirm('Are you sure?');

        if (!$confirmed) {
            return;
        }

        $indexes = array_keys(config('collection.indexes', []));
        foreach ($indexes as $index) {
            $mappings = [];
            $mappingsClass = config('collection.mappings.'.$index);

            if ($mappingsClass && new $mappingsClass instanceof MappingInterface) {
                /** @var MappingInterface $mappingsClass */
                $mappings = $mappingsClass::get();
            }

            $this->collectionService->refresh($index, $mappings);
            $this->icon('✔', 'Index created', $index);
        }
    }
}
