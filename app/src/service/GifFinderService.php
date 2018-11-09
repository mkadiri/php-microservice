<?php

namespace src\service;

use src\repository\GifRepository;

class GifFinderService
{
    private $gifRepository;

    public function __construct(GifRepository $gifRepository)
    {
        $this->gifRepository = $gifRepository;
    }

    /**
     * Returns a formatted array of gif models
     *
     * @param $keyword
     * @return array
     */
    public function find($keyword) : array
    {
        $data = [];
        $gifs = $this->gifRepository->search($keyword);

        foreach ($gifs as $gif) {
            $data[] = [
                'title' => $gif->getTitle(),
                'url' => $gif->getUrl()
            ];
        }

        return $data;
    }
}