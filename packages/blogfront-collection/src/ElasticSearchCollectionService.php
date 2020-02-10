<?php

namespace LaPress\BlogFront\Collection;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

/**
 * @author    Sebastian Szczepański
 * @copyright ably
 */
class ElasticSearchCollectionService
{
    /**
     * @var Client
     */
    private $elasticsearch;

    /**
     */
    public function __construct()
    {
        $this->elasticsearch = ClientBuilder::create()->build();
    }

    /**
     * @return string[]
     */
    public function getIndexesNames(): array
    {
        return array_map(function ($resource) {
            return $this->getIndexName($resource);
        }, $this->getIndexesResourcesNames());
    }

    /**
     * @return array
     */
    public function getIndexesResourcesNames(): array
    {
        return array_keys(config('collection.indexes', []));
    }

    /**
     * @param string $resource
     * @return string
     */
    public function getIndexName(string $resource): string
    {
        return config('collection.prefix').$resource;
    }

    /**
     * @param string $name
     * @param array  $mappings
     */
    public function createIndex(string $name, array $mappings = [])
    {
        $mappings = empty($mappings) ? [] : ['properties' => $mappings];
        $mappings = array_merge(['_source' => ['enabled' => true]], $mappings);
        $name = $this->getIndexName($name);

        try {
            $this->elasticsearch->indices()->create([
                'index' => $name,
                'body'  => [
                    'mappings' => [$name => $mappings],
                ],
            ]);
        } catch (\Exception $e) {
            try {
                $this->elasticsearch->indices()->create([
                    'index' => $name,
                    'body'  => [
                        'mappings' => $mappings,
                    ],
                ]);
            } catch (\Exception $e) {

            }
        }
    }

    /**
     * @param $name
     * @return array
     */
    public function deleteIndex($name)
    {
        try {
            return $this->elasticsearch->indices()->delete(['index' => $name]);
        } catch (\Exception $e) {

        }
    }

    /**
     * @param string $resource
     * @param array  $mappings
     */
    public function refresh(string $resource, array $mappings = [])
    {
        $index = $this->getIndexName($resource);

        try {
            $this->deleteIndex($index);
        } catch (\Exception $e) {

        }

        $this->createIndex($resource, $mappings);
    }

    public function saveDocument($resource, $model)
    {
        $index = $this->getIndexName($resource);

        $this->delete($resource, $model);

        $data = $model->toArray();

//        dump([
//            'index' => $index,
//            'type'  => $index,
//            'id'    => $data['id'],
//            'body'  => $data,
//        ]);die();

//        $this->elasticsearch->index([
//            'index' => $index,
//            'type'  => $index,
//            'id'    => $data['id'],
//            'body'  => $data,
//        ]);

//        return;

        $this->elasticsearch->index([
            'index' => $index,
            'type'  => $index,
            'id'    => $data['id'],
            'body'  => $data,
        ]);
    }

    public function delete($index, $model)
    {
        $data = $model->toArray();
        $id = $data['id'];

        try {
            return $this->elasticsearch->delete([
                'index' => $this->getIndexName($index),
                'type'  => $this->getIndexName($index),
                'id'    => $id,
            ]);
        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * @param string $resource
     * @return array
     */
    public function search(string $resource)
    {
        $index = $this->getIndexName($resource);

        return $this->elasticsearch->search([
            'index' => $index,
            'type'  => $index,
        ]);
    }
}
