<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  /**  ################################################################################################ */
    /**
     * Show the information of a specific user
     *
     *
     * @return Response
     */
    public function SelectAll()
    {
        $users = DB::table('users')->get();

        if ($users <> "[]") {
            return response()->json(

                $users
                ,
                200
            );
        }
    }
/**  ################################################################################################ */
/**  ################################################################################################ */
    /**
     * Show the average score for each user
     *
     * @return Response
     */
    public function ListAverage()
    {
        $user = DB::table('games')
        ->select(DB::raw('idUser , avg(score) as avg_score'))
        ->groupby('idUser')
        ->get();

        return response()->json(
            $user
            ,
            202
        );
    }
    /**  ################################################################################################ */
    /**  ################################################################################################ */

    /**
     * Admin functions
     */

    /**
     * Validate players
     *
     * @return Response
     */
    public function ListValidatePlayer()
    {
        $users = User::where([
            ['isEnabled', 0],
            ['isDelete', 0]
        ])
            ->get();

        if ($users <> "[]") {
            return response()->json(

                $users
                ,
                200
            );
        }
    }
    /**  ################################################################################################ */
    /**  ################################################################################################ */
    /**
     * Validate a user by id
     *
     * @return Response
     */
    public function ValidatePlayer($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->isEnabled = 1;

            $user->save();

            return response()->json([
                $user
            ],
                202
            );

        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    "statusText" => "<h2>No se ha encontrado la id solicitada</h2>",
                    "statusCode" => "<h1>404</h1>"
                ],
                404
            );
        }
    }
    /**  ################################################################################################ */
    /**  ################################################################################################ */

    /**
     * Drop a user.
     *
     * $request->id
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function DropUser(Request $request)
    {
        // Validate the request...

        if ($request->id <> null) {
            $rows = DB::update('update users set isDelete = ? where id = ?', [1, $request->id]);
            Auth::logout();

            return response()->json(
                [
                    'Rows afected' => $rows,
                    "statusCode" => "<h1>202</h1>"
                ],
                202
            );
        }
    }
    /**  ################################################################################################ */
    /**  ################################################################################################ */
    /**
     * Delete a user by id.
     *
     * @return Response
     */
    public function DeleteUser($id)
    {
        $rows = User::where('id', $id)->delete();

        return response()->json(
            [
                'Rows afected' => $rows,
                "statusCode" => "<h1>202</h1>"
            ],
            202
        );
    }

    /**
     * Shared Functions
     */
     /**  ################################################################################################ */
     /**  ################################################################################################ */
    /**
     * Create a new user instance.
     *
     * $request->name
     * $request->nick
     * $request->email
     * $request->pass
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function NewUser(Request $request)
    {
        try {

            if ($request->name <> null &&
                $request->nick <> null &&
                $request->email <> null &&
                $request->telf <> null &&
                $request->pass <> null
            ) {
                $user = new User();

                $user->name = $request->name;
                $user->nick = $request->nick;
                $user->email = $request->email;
                $user->telf = $request->telf;
                $user->password = $request->pass;

                $user->save();

                return response()->json(

                    $user
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
                    "Error found" => $e,
                    "statusText" => "<h2>Usuario existente</h2>",
                    "statusCode" => "<h1>409</h1>"
                ],
                409
            );
        }
    }

    /**  ################################################################################################ */
    /**  ################################################################################################ */
    /**
     * Create a new user instance.
     *
     * @param  Request $request
     *
     * @return Response
     */
    public function UpdateUser($id, Request $request)
    {
      if($id==null)
        $if=$request->id;
        try {
            if ($request->name <> null ||
                $request->nick <> null ||
                $request->email <> null ||
                $request->telf <> null ||
                $request->pass <> null
            ) {
                if ($request->name <> null)
                    $rows = DB::update('update users set name = ? where id = ?', [$request->name, $id]);
                if ($request->nick <> null)
                    $rows = DB::update('update users set nick = ? where id = ?', [$request->nick, $id]);
                if ($request->email <> null)
                    $rows = DB::update('update users set email = ? where id = ?', [$request->email, $id]);
                if ($request->telf <> null)
                    $rows = DB::update('update users set telf = ? where id = ?', [$request->telf, $id]);
                if ($request->pass <> null)
                    $rows = DB::update('update users set password = ? where id = ?', [$request->pass, $id]);

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
    /**  ################################################################################################ */
    /**  ################################################################################################ */
    /**
     * Show the information of a specific user
     *
     * @param integer $id
     *
     * @return Response
     */
    public function SelectById($id)
    {
        try {
            $user = User::findOrFail($id);

            return response()->json([
                $user
            ],
                202
            );

        } catch (ModelNotFoundException $e) {
            return response()->json(
                [
                    "statusText" => "<h2>No se ha encontrado la id solicitada</h2>",
                    "statusCode" => "<h1>404</h1>"
                ],
                404
            );
        }
    }
    /**  ################################################################################################ */

}
