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

    public function password(){
        return view('password.form');
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
        $gender = $request->input('gender');

        //Creates a faker from the faker Factory
        $name = '';
        for ($i=0; $i<$parameter; $i++){
          $faker = \Faker\Factory::create();
          $name .= '<br /><br /><br /> <img src="'.$faker->imageUrl(150,150,'cats').'"><br />';

          if($gender == 'female'){
            $name .= $faker->name($gender = 'female') .'<br />';
          }elseif ($gender == 'male'){
            $name .= $faker->name($gender = 'male') .'<br />';
          }else{
            $name .= $faker->name .'<br />'; //puts names in an array of names
          }

          if($checked !== null){
            if (in_array('number', $checked)){
              $name .= 'Phone: '.$faker->phonenumber .'<br />';
            }
            if(in_array('location', $checked)){
              $name .= 'Address: '.$faker->address .'<br />';
            }
            if(in_array('job', $checked)){
              $name .= 'Employee at '.$faker->company .'<br />';
            }
            if(in_array('profile', $checked)){
              $name .= 'Favorite quote: "'.$faker->text .'"<br />';
            }
          }
        }
        return view('user.results')->with('name', $name);

    }

    public function PwGen(Request $request){
        $this -> validate($request,['wordcount' => 'required|numeric|min:1|max:10']);
        $this->validate($request,['symbol' => 'numeric|min:1|max:10']);

        $wordCount = $request->input('wordcount');
        $symbolStatus = $request->input('symbol');
        $numberStatus = $request->input('number');

        #Arrays
        $array = array("one", "two", "three", "four", "five", "six", "seven",
                      "eight", "nine","ten","hello","pumpkin","mint","boo","tree");
        $symbols = array("!", "@", "#", "$", "%", "^", "&", "(", ")","+", "=", "~",
                          "[", "]", "/", "?", "<", ">", ".");

        #variables that pull out a random index of an array
        $randomizer = array_rand($array, $wordCount);
        $password = array();

        if($symbolStatus !== ""){
        $symbolRandomizer = array_rand($symbols, $symbolStatus);
        }

        if($wordCount>0 AND $wordCount <= 10 AND ((int)$wordCount == $wordCount)){
          #server-side check to insure a number is entered
          if($wordCount !== "1"){
            for($i=0; $i<$wordCount; $i++){
              $password[]=($array[$randomizer[$i]]."-");
              //echo $array[$randomizer[$i]]."-";
            }
          }
          elseif ($wordCount == "1") { #when wordCount is 1, i is 0 and nothing is selected from the array
            $password[]=($array[array_rand($array,1)]);
            //print_r($array[array_rand($array,1)]);
          }

          if($numberStatus == 'on'){  #option to add a number from 0-9
            $randNumber = rand(0,9);
            $password[]=($randNumber);
          }
            #first checks the symbol form for a number between 1 and 10

          if($symbolStatus != null AND $symbolStatus>0 AND $symbolStatus <= 10 AND ((int)$symbolStatus == $symbolStatus)){
            if ($symbolStatus !== "1"){
              for ($i=0; $i<$symbolStatus; $i++){
                $password[]=($symbols[$symbolRandomizer[$i]]);
              }
              $newPassword= implode("",$password);  #turns the $password array into a string for printing
            }
            elseif($symbolStatus == "1"){
              $password[]=($symbols[array_rand($symbols,1)]);
              $newPassword= implode("",$password);
            }
            else{
              $newPassword= implode("",$password);
            }
          }
          elseif(empty($symbolStatus)){
              $newPassword= implode("",$password);
          }

        return view('password.results') ->with('newPassword', $newPassword);
    }
}
}
