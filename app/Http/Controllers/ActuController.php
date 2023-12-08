<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActuController extends Controller
{
    private const ABILITY = 'actu';

    public function index()
    {
        $actualites = $this->getNews();
        return view(self::ABILITY . '.index', compact('actualites'));
    }

    public function getNews(){
        $rssUrl = "https://bonpote.com/feed/";

        if ($rssUrl !== false)
        {
            $rss = simplexml_load_file($rssUrl);
            if ($rss !== false)
            {
                $items = [];

                foreach($rss->channel->item as $item) {
                    array_push($items, $item);
                }

                return $items;
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
