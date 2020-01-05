<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Http\Resources\PeopleResourceCollection;
use App\People;
use Illuminate\Http\Request;

class peopleController extends Controller
{
    public function show(People $person): PeopleResource

    {
         return new PeopleResource($person);
    }
    /**
     * @return PersonResourceCollection
     *
     */
    public function index() : PeopleResourceCollection
    {
        return new PeopleResourceCollection(People::paginate());
    }

    public function store ()

    {
        $data =  request()->validate([

            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'city' => 'required'
        ]);

      $person =  People::create($data);

        return new PeopleResource($person);
    }

    public function update(People $person) : PeopleResource

    {
        //  $data =  request()->validate([

        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required',
        //     'phone' => 'required',
        //     'city' => 'required'
        // ]);


        $recordedUpdated = $person->update(request([
            'first_name' , 'last_name', 'phone', 'city', 'email'

            ])

        );

        return new PeopleResource($person);
    }

    public function destroy(People $person)
    {
        $person->delete();

        return response()->json([

           'message' => 'record delete',

           'status' => 200,

           'id' => $person->id,

           ]);
    }
}
