<?php

class RssReader {
    
    private $url;
    
    private $error = FALSE;
    
    public $rss;

    public function __construct($url)
    {
        $this->url = $url;
        $this->rss = simplexml_load_file($this->url);
        $this->error = ! ($this->rss);
        /*
        if($this->rss)
        {
            $this->error = FALSE;
        }
        else 
        {
            $this->error = TRUE;
        }
        */
    }
    
    public function error()
    {
        return $this->error;
    }
          
}
/*
echo '<h1>'.$rss->channel->title.'</h1>';
echo '<li>'.$rss->channel->pubDate.'</li>';
$items = $rss->channel->item;
foreach($items as $item)
{
$title = $item->title;
$link = $item->link;
$published_on = $item->pubDate;
$description = $item->description;
echo '<h3><a href="'.$link.'">'.$title.'</a></h3>';
echo '<span>('.$published_on.')</span>';
echo '<p>'.$description.'</p>';
}
}
 * 
 */