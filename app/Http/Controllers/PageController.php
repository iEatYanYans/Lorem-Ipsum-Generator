<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lorem()
    {
        return view('lorem.form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        return view('user.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function loremgen(Request $request)
    {
        //return 'Process ' .$_POST['paragraphs'];
        #Validate Paragraph data
        $this -> validate($request, [
          'parameter' => 'required|numeric|min:1|max:99',
        ]);

        #Code runs when validation passes
        $parameter = $request->input('parameter');
        $radio = $request->input('case'); //output is 'sentence'

        $lipsum = new \joshtronic\LoremIpsum();
        $result = $lipsum->paragraphs($parameter, 'p');

          if($radio == 'uppercase'){
            $result = strtoupper($result);
          }
          elseif($radio == 'lowercase'){
            $result = strtolower($result);
          }
          else{
            //do nothing since default is sentence case.
          };

        return $result;

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
}
