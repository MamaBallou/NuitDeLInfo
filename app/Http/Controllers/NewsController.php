<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getNews(){
        $rssUrl = "https://bonpote.com/feed/";

        if ($rssUrl !== false)
        {
            $rss = simplexml_load_file($rssUrl);
            if ($rss !== false)
            {
                $items = $rss->channel->item;
                return view('actu')->with('items', $items);
            }
            else
            {
                return "Erreur lors de l\'analyse du flux RSS.";
            }
        }
        else
        {
            return "Erreur lors de la récupération du flux RSS.";
        }
    }
}
