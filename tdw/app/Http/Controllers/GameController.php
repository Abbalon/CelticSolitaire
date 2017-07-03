<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Auth;

class GameController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Create a new game instance.
     *
     * $request->idUser
     * $request->score <> null
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function NewGame(Request $request)
    {
        try {

            if ($request->idUser <> null &&
                $request->score <> null
            ) {
                $game = new Game();

                $game->idUser = $request->idUser;
                //Omitido puesto que la BBDD le asigna un valor por defecto
                //$game->score = $request->score;

                $game->save();

                return response()->json(

                    $game
                    ,
                    201
                );
            } else {
                return response()->json(
                    [
                        "statusText" => "<h2>No se han introducido datos</h2>",
                        "statusCode" => "<h1>406</h1>"
                    ],
                    406
                );
            }
        } catch (QueryException $e) {
            return response()->json(
                [
                    "statusText" => $e,
                    "statusCode" => "<h1>409</h1>"
                ],
                409
            );
        }
    }

    /**
     * Shows top10 between two dates
     *
     * $request->firstDate
     * $request->lastDate
     * $request->rows
     *
     * @param Request $request
     * $param Integer $rows
     *
     * @return Response
     */
    public function SelectBetween(Request $request)
    {
        if ($request->firstDate <> null &&
            $request->lastDate <> null
        ) {
            if ($request->rows == null)
                $request->rows = 10;
            $scores = DB::table('games')->whereBetween('created_at', [$request->firstDate, $request->lastDate])
                ->orderBy('created_at')->take($request->rows)->get();
            if ($scores <> "[]") {
                return response()->json(

                    $scores
                    , 200
                );
            } else {
                return response()->json(
                    [
                        "ServerMessage" => "No rows found",
                        "StatusQuery" => "Correct"
                    ], 200
                );
            }
        } else {
            return response()->json(
                [
                    "statusText" => "<h2>No se han introducido datos</h2>",
                    "statusCode" => "<h1>406</h1>"
                ],
                406
            );
        }
    }

    /**
     * Shows topX scores
     *
     * X passed in the request
     *
     * $request->rows
     * $request->idUser
     *
     * @param Integer id
     *
     * @return Response
     */
    public function SelectScores($id)
    {
        $scores = DB::table('games')->where('idUser', $id)
            ->orderBy('score', 'desc')->take(5)->get();

        if ($scores <> "[]") {
            return response()->json(

                $scores
                , 200

            );
        } else {
            return response()->json(
                [
                    "ServerMessage" => "No rows found",
                    "StatusQuery" => "Correct"
                ], 200
            );
        }
    }

    /**
     * Shows scores
     *
     * @param Request request
     *
     * @return Response
     */
    public function SelectAll(Request $request)
    {
        $score = $request->id;
        $scores = DB::table('games')->where('idUser', $request->id)
            ->orderBy('created_at', 'desc')->take(1)->get();

        if ($scores <> "[]") {
            return response()->json(

                $scores
                , 200
            );
        } else {
            return response()->json(
                [
                    "ServerMessage " => "No rows found",
                    "Data found" => $score,
                    "StatusQuery" => "Correct"
                ], 200
            );
        }
    }

    /**
     * Save the game
     *
     * $request->score
     *
     * @param  Request $request
     * @param Integer $id
     *
     * @return Response
     */
    public function Save($id, Request $request)
    {
        try {
            if ($request->score <> null
            ) {
                $rows = DB::table('games')->where('id', $id)->update(['score' => $request->score, 'gameBoard' => $request->gameBoard]);

                return response()->json(
                    [
                        'Rows afected' => $rows,
                        "statusCode" => "<h1>202</h1>"
                    ],
                    202
                );
            } else {
                return response()->json(
                    [
                        "statusText" => "<h2>No se han introducido datos</h2>",
                        "statusCode" => "<h1>406</h1>"
                    ],
                    406
                );
            }
        } catch (QueryException $e) {
            return response()->json(
                [
                    "exceptionText" =>$e,
                    "statusText" => "<h2>Algo fue mal, avise al administrador.</h2>",
                    "statusCode" => "<h1>400</h1>"
                ],
                400
            );
        }
    }

    /**
     * Restore the game
     *
     * $request->score
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function Restore(Request $request)
    {
        try {
            if ($request->idUser <> null
            ) {
                $match = DB::table('games')
                  ->select('gameBoard')
                  ->where('idUser', $request->idUser)
                  ->orderBy('created_at', 'desc')
                  ->take(1)
                  ->get();

                return response()->json(
                    $match
                    ,
                    200
                );
            } else {
                return response()->json(
                    [
                        "statusText" => "<h2>No se han introducido datos</h2>",
                        "statusCode" => "<h1>406</h1>"
                    ],
                    406
                );
            }
        } catch (QueryException $e) {
            return response()->json(
                [
                    "statusText" => "<h2>Algo fue mal, avise al administrador.</h2>",
                    "statusCode" => "<h1>400</h1>"
                ],
                400
            );
        }
    }
}
