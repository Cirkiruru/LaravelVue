<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteUsers;

class SiteUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteUsers = SiteUsers::all();
        return response()->json(
            [
                'siteUsers' => $siteUsers,
                'message' => 'Site Users',
                'code' => 200,
            ]

        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siteUsers = new SiteUsers;
        $siteUsers->name = $request->name;
        $siteUsers->email = $request->email;
        $siteUsers->comments = $request->comments;
        $siteUsers->save();
        return response()->json(
            [
                'siteUsers' => $siteUsers,
                'message' => 'Created new Site Users',
                'code' => 200,
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $siteUsers = SiteUsers::find($id);
        if ($siteUsers) {
            $siteUsers->delete();
            return response()->json(
                [
                    'message' => 'Delete Users Message',
                    'code' => 200,
                ]
            );
        } else {

            return response()->json(
                [
                    'message' => "Delete Users id:$id deos not exist",
                ]
            );
        };
    }
}
