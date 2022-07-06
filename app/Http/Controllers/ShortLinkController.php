<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    //
    // $id=ShortLink::max('id');
        // $shortLinks = ShortLink::latest()->find($id);
        // public function createlink(){
        //     return view('createlink');
        // }
        public function index()
        {
            $id=ShortLink::max('id');
             $shortLinks = ShortLink::latest()->find($id);
       
            return view('shortenLink', compact('shortLinks'));
        }
       
        public function store(Request $request)
        {
            $request->validate([
               'link' => 'required|url'
            ]);
       
            $input['link'] = $request->link;
            $input['code'] = Str::random(6);
       
            ShortLink::create($input);
      
            return redirect('/')
                 ->with('success', 'Shorten Link Generated Successfully!');
        }
       
       
        public function shortenLink($code)
        {
            $find = ShortLink::where('code', $code)->first();
       
            return redirect($find->link);
        }
        //////////

      

}
