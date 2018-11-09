<?php

namespace src\repository;

use src\model\GifModel;

class GifRepository
{

    /**
     * Searches for gifs based on a title
     *
     * @param string $keyword
     * @return GifModel[]
     */
    public function search(string $keyword) : array
    {
        $data = [];

        foreach ($this->getMockGifs() as $gif) {
            if (stripos($gif->getTitle(), $keyword) !== false) {
                $data[] = $gif;
            }
        }

        return $data;
    }

    /**
     * @return array
     * @throws \Exception
     */
    private function getMockGifs() : array
    {
        try {
            return [
                new GifModel('banana', 'http://gifapi.com/banana'),
                new GifModel('blue banana', 'http://gifapi.com/blue_banana'),
                new GifModel('apple', 'http://gifapi.com/apple'),
                new GifModel('red apple', 'http://gifapi.com/red_apple'),
                new GifModel('green banana', 'http://gifapi.com/green_banana'),
                new GifModel('orange', 'http://gifapi.com/orange'),
                new GifModel('brown orange', 'http://gifapi.com/brown_orange'),
            ];

        } catch (\Exception $e) {
            throw new \Exception("Technical error occurred");
        }
    }
}