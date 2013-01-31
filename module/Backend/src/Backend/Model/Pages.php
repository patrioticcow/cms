<?php

namespace Backend\Model;

class Pages
{
    public $page_id;
    public $title;
    public $content;
    public $time;

    public function exchangeArray($data)
    {
        $this->page_id  = (isset($data['page_id'])) ? $data['page_id'] : null;
        $this->title    = (isset($data['title']))   ? $data['title']   : null;
        $this->content  = (isset($data['content'])) ? $data['content'] : null;
        $this->time     = (isset($data['time']))    ? $data['time']    : null;
    }
}