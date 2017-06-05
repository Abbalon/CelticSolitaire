<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
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
              $game->score = $request->score;

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
          if ($scores<>"[]") {
              return response()->json(

                  $scores
                  , 200
              );
          } else {
              return response()->json(
                  [
                      "Server Message " => "No rows found",
                      "Status query " => "Correct"
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
   * @param Request $request
   *
   * @return Response
   */
  public function SelectScores(Request $request)
  {
      if ($request->rows == null)
          $request->rows = 5;
      $scores = DB::table('games')->where('idUser', $request->idUser)
          ->orderBy('score')->take($request->rows)->get();

      if ($scores <> "[]") {
          return response()->json(

              $scores
              , 200

          );
      } else {
          return response()->json(
              [
                  "Server Message " => "No rows found",
                  "Status query " => "Correct"
              ], 200
          );
      }
  }

  /**
   * Shows scores
   *
   * @param integer $idUser
   *
   * @return Response
   */
  public function SelectAll($idUser)
  {
      $scores = DB::table('games')->where('idUser', $idUser)
          ->orderBy('score')->get();

      if ($scores <> "[]") {
          return response()->json(

              $scores
              , 200
          );
      } else {
          return response()->json(
              [
                  "Server Message " => "No rows found",
                  "Status query " => "Correct"
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
              $rows = DB::table('games')->where('id', $id)->update('score', $request->score);

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
                  "statusText" => "<h2>Algo fue mal, avise al administrador.</h2>",
                  "statusCode" => "<h1>400</h1>"
              ],
              400
          );
      }
  }

  /**
   * TODO
   *
   * Restore the game
   *
   * $request->score
   *
   * @param  Request $request
   * @param Integer $id
   *
   * @return Response
   */
  public function Restore($id, Request $request)
  {
      try {
          if ($request->score <> null
          ) {
              $rows = DB::table('games')->where('id', $id)->update('score', $request->score);

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
                  "statusText" => "<h2>Algo fue mal, avise al administrador.</h2>",
                  "statusCode" => "<h1>400</h1>"
              ],
              400
          );
      }
  }
}
