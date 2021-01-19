<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        // $title = 'Data Display';
        // return view('pages.index')->with('patrick', $title); //patrick is yung variable na pwede mong itawag sa kabilang php file then yung $title is yung nagpasok ka ng data

        // $datas = array(
        //     'id' => 1,
        //     'firstname' => 'John Patrick',
        //     'lastname' => 'Buco',
        //     'email' => 'jpbuco@cvsu.edu.ph'
        // );
        // return view('pages.index')->with('datas', $datas);

        $data = array(
            'students' => ['John Doe', 'Miracle', 'MATUMBAMAN', 'Anathan'],
            'adviser' => [
                'name' => ['John Patrick D. Buco', 'Kenneth J. Enrico'],
                'affiliation' => ['Computer Engineer 1', 'Computer Engineer 2']
            ],
            'critic' => [
                'name' => ['Gee Jay C. Bartolome', 'Junathan C. Roño'],
                'affiliation' => ['MS in Agricultural Engineer', 'Agricultural Engineer']
            ]
        );

        return view('pages.index')->with('data', $data);
    }
}
