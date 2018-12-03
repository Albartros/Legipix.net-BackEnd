<?php

namespace Game;

//use Slim\Router;
use Slim\Http\Response;
use Game\Code;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class CodeController
{
    public function __construct()
    {
        //
    }

    public function getCode($request, $response, $params)
    {
        try {
            $sequence = Code::findOrFail((int)$params['id']);
            $sequence->increment('views', 1);

            $content = array('status' => '200', 'code' => 'OK', 'title' => $sequence->title, 'video_id' => $sequence->video);
            return $response->withJSON(
                $content
            );
        } catch (ModelNotFoundException $ex) {
            $error = array('status' => '404', 'code' => 'not-found', 'title' => 'Sequence Not Found', 'details' =>  'Sequence ' . (int)$params['id'] . ' is doesn\'t exist in the database');
            return $response->withStatus(404)->withJSON($error);
        }
    }

    public function sumCodeViews($request, $response, $params)
    {
        $views = Code::all()->sum('views');

        $content = array('status' => '200', 'code' => 'OK', 'title' => 'Total Counts', 'value' => $views);
        return $response->withJSON(
            $content
        );
    }
}
