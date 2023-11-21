<?php

namespace App\Http\Controllers;

use App\Models\UsersModel;
use App\Http\Resources\ResponseResource;
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
    /**
     * @OA\Get(
     *     path="/api/users/user",
     *     tags={"Users"},
     *     summary="Get a list of users",
     *     @OA\Response(response="200", description="List of users"),
     * )
     */
    public function index()
    {
        $datas = UsersModel::latest()->paginate(5);
        return new ResponseResource(EnumsHelper::HttpStatusCode()::OK, $datas);
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
        $data = $request->all();

        $data["password"] = \Hash::make($data["password"]);
        $create = UsersModel::create($data);
        return new ResponseResource(EnumsHelper::HttpStatusCode()::CREATE, $create);
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

    public function GetByUsername(string $usename)
    {
        var_dump($usename);
        exit();

        if ($usename != '')
        {
            $data = UsersModel::where('username', $usename)->first();
            if($data['username'] != null || $data['username'] != '')
            {
                return new ResponseResource(EnumsHelper::HttpStatusCode()::OK, $usename);
            }
            return new ResponseResource(EnumsHelper::HttpStatusCode()::NOT_FOUND, null);
        }

        return new ResponseResource(EnumsHelper::HttpStatusCode()::NOT_FOUND, null);
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
        $data = UsersModel::findOrFail($id);

        $data->delete();

        return new ResponseResource(EnumsHelper::HttpStatusCode()::NO_CONTENT, $data);
    }


    public function generateRandomData(int $count)
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
            return new ResponseResource(EnumsHelper::HttpStatusCode()::CREATED, $data);
        }else{
            return new ResponseResource(EnumsHelper::HttpStatusCode()::BAD_REQUEST, $data);
        }

    }
}
