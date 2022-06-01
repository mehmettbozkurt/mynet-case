<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Address;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $persons = [];
        if(Cache::has('persons')){
            $persons = Cache::get('persons');
        } else {
            $persons = $persons = Person::with('address')->get();
            Cache::put('persons', $persons, 600);
        }

        return view('person.list', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('person.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\PersonRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PersonRequest $request)
    {
        $data = $request->validated();
        $person = new Person();
        $person->name = $data['name'];
        $person->birthday = $data['birthday'];
        $person->gender = $data['gender'];
        $person->save();

        $person_id = $person->id;
        $address = new Address();
        $address->address = $data['address'];
        $address->post_code = $data['post_code'];
        $address->city_name = $data['city_name'];
        $address->country_name = $data['country_name'];
        $address->person_id = $person_id;
        $address->save();

        return redirect()->route('person.index')->with('success','Person created successfully!');

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
        $person = Person::with("address")->findOrFail($id);

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\PersonRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PersonRequest $request, $id)
    {
        $data = $request->validated();

        $person = Person::findOrFail($id);
        $person->name = $data['name'];
        $person->birthday = $data['birthday'];
        $person->gender = $data['gender'];
        $person->address->address = $data['address'];
        $person->address->post_code = $data['post_code'];
        $person->address->city_name = $data['city_name'];
        $person->address->country_name = $data['country_name'];
        $person->push();

        return redirect('person')->with('success','Person updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $person = Person::findOrFail($id);
        $person->delete();
        return redirect('person')->with('success','Person deleted successfully!');
    }

    // person tablosu için gerekli fillableları al ve person tablosu için list,create,update,delete işlemlerinin yazıldığı metodlar



}
