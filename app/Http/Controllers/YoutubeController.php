<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    public function index(){
        
        $videoLists = $this->_videoLists('laravel tutorial');
        
        return view('index', compact('videoLists'));
    }

    public function results(){

        return view('results');
    }

    public function watch($id){

        return view('watch');
    }

    protected function _videoLists($search_key){

        $part = 'snippet';
        $country = 'PH';
        $api_key = config('services.youtube.api_key');
        $endpoint = config('services.youtube.search_endpoint');
        $max_results = 12;
        $type = 'video';

        $url = "$endpoint?part=$part&maxResults=$max_results&regionCode=$country&type=$type&key=$api_key&q=$search_key";
        $response = Http::get($url);
        $results = json_decode($response);

        //store the json results in the storage path
        File::put(storage_path().'/app/public/results.json',$response->body());

        return $results;
    }
}