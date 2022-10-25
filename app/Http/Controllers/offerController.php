<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

class offerController extends Controller
{
    public function create(){
        //view form to add this offer
        return view('ajaxoffers.create');
    }

    public function store(Offer $request)
    {
        //save offer into DB using AJAX

        $file_name = $this->saveImage($request->photo, 'images/offers');
        //insert  table offers in database
        $offer = Offer::create([
            'photo' => $file_name,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,

        ]);

        if ($offer)
            return response()->json([
                'status' => true,
                'msg' => 'تم الحفظ بنجاح',
            ]);

        else
            return response()->json([
                'status' => false,
                'msg' => 'فشل الحفظ برجاء المحاوله مجددا',
            ]);
        }

        public function all(){

            $offers = offer::select('id',
               'price',
               'photo',
               'name_' ,
               'details_'
           )->limit(10)->get(); // return collection

           return view('ajaxoffers.all', compact('offers'));
       }

}
