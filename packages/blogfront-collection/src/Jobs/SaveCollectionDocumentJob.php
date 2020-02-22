<?php

namespace LaPress\BlogFront\Collection\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LaPress\BlogFront\Collection\ElasticSearchCollectionService;

class SaveCollectionDocumentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    private $type;

    /**
     * @var ElasticSearchCollectionService
     */
    private $collectionService;

    /**
     * @var Model
     */
    private $model;


    public function __construct(string $type, Model $model)
    {
        $this->type = $type;
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->collectionService = app(ElasticSearchCollectionService::class);
        if (!$this->model->isPublished()) {
            try{
                $this->collectionService->delete($this->type, $this->model);
            } catch(\Exception $e) {

            }

            return;
        }

        $this->collectionService->saveDocument($this->type, $this->model);
    }
}
