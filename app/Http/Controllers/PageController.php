<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

class PageController extends Controller
{
    //Displays the form for Lorem Ipsum generator
    public function lorem()
    {
        return view('lorem.form');
    }

    //Displays the form for User generator
    public function user()
    {
        return view('user.form');
    }

    // Logic for validating and processing Lorem Ipsum generator form parameters
    public function LoremGen(Request $request)
    {
        #Validate paragraph data
        $this -> validate($request, [
          'parameter' => 'required|numeric|min:1|max:99',
        ]);

        #Code runs when validation passes
        $parameter = $request->input('parameter');
        $radio = $request->input('case'); //default is 'sentence'

        $lipsum = new \joshtronic\LoremIpsum();
        $result = $lipsum->paragraphs($parameter, 'p');

          if($radio == 'uppercase'){
            $result = strtoupper($result);
          }
          elseif($radio == 'lowercase'){
            $result = strtolower($result);
          }
          else{
            #do nothing since default is sentence case.
          };

        return view('lorem.results') ->with('result', $result);

    }

    //Logic for validating and processing User generator parameters.
    public function UserGen(Request $request)
    {
        //require_once '/path/to/Faker/src/autoload.php';
        $this->validate($request,['parameter' => 'required|numeric|min:1|max:99']);

        $parameter = $request ->input('parameter');

        #requests the array of attributes and sets them to a variable
        $checked = $request->input('attributes');

        //Creates a faker from the faker Factory
        for ($i=0; $i<$parameter; $i++){
          $faker = \Faker\Factory::create();
          $name[] = $faker->image;
          $name[] = $faker->name; //puts names in an array of names

          if (in_array('number', $checked)){
            $name[] = $faker->phonenumber;
          }
          if(in_array('location', $checked)){
            $name[] = $faker->address;
          }
          if(in_array('job', $checked)){
            $name[] = $faker->company;
          }
          if(in_array('profile', $checked)){
            $name[] = $faker->text;

          }
          else{
            //do nothing
          }
        }
        //$checked = dd($checked);
        $name = dump($name);
        //return $name;
        //return $result;
        return view('user.results')->with('name', $name);
        //return $checked;
    }
}
