<?php

namespace src\service;

use src\repository\GifRepository;

class GifFInderServiceFactory
{
    public function create() : GifFinderService
    {
        $gifRepository = new GifRepository();

        return new GifFinderService($gifRepository);
    }
}