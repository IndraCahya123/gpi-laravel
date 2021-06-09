<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getData(Profile $profile)
    {
        $data = $profile->all();

        return response()->json($data);
    }

    public function addData(Request $request)
    {
        $fullname = $request->fullname;
        $age = $request->age;
        $city = $request->city;

        // $agemanipulate = explode(" ", $age, 2);
        // $realAge = $agemanipulate[0];

        $addNewData = Profile::create([
            'fullname' => strtoupper($fullname),
            'age' => $age,
            'city' => strtoupper($city)
        ]);
        return response($addNewData, 201);
    }
}