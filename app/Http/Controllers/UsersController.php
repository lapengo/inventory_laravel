<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Http\Resources\PostResource;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use App\Helpers\EnumsHelper;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = UsersModel::latest()->paginate(5);
        return new PostResource(true, 'List Data Posts', $posts);
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
        //
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
        //
    }


    public function generateRandomData($count)
    {
        $faker = Faker::create();

        $count = is_int($count) && $count > 0 ? $count : 1;
        $data = [];
        $status = false;
        if($count > 0)
        {
            for ($i = 0; $i < $count; $i++) {
                try {
                    $one = new UsersModel([
                        'username' => $faker->userName,
                        'password' => bcrypt($faker->password(5, 20)),
                        'email' => $faker->companyEmail,
                    ]);
                    $one->save();
                    $data[] =[$one];
                    $status = true;
                }catch (\Exception $e){
                    $status = false;
                }

            }

        }

        if ($status)
        {
            return new PostResource(EnumsHelper::HttpStatusCode()::CREATED, EnumsHelper::StatusApi()::CREATED, $data);
        }else{
            return new PostResource(EnumsHelper::HttpStatusCode()::BAD_REQUEST, EnumsHelper::StatusApi()::BAD_REQUEST, $data);
        }

    }
}
