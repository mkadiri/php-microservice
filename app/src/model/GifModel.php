<?php

namespace src\model;

use Exception;
use src\exception\TitleInvalidException;
use src\exception\UrlInvalidException;

class GifModel
{
    private $title;
    private $url;

    /**
     * GifModel constructor.
     * @param string $title
     * @param string $url
     * @throws Exception
     */
    public function __construct(string $title, string $url)
    {
        if ($title == '') {
            throw new TitleInvalidException();
        }

        if ($url == '') {
            throw new UrlInvalidException();
        }

        $this->title = $title;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }
}