<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function blog(Request $request)
    {
    	$this->validate($request,[
            'contact_name'                   => 'required',
            'contact_phone'                  => 'required',
            'contact_email'                  => 'required',
            'contact_msg'                    => 'required',
        ]);

    	$contact                           = new Contact();
        $contact->contact_name             = $request->contact_name;
        $contact->contact_phone            = $request->contact_phone;
        $contact->contact_email            = $request->contact_email;
        $contact->contact_msg              = $request->contact_msg;
       
      
        $contact->save();

       // Toastr::success('Message request sent successfully.','Success',["positionClass" => "toast-top-right"]);
       // Toastr::error('message', 'title', ['options']);
       // Toastr::error('Message request sent Not successfully.','Error',["positionClass" => "toast-top-right"]);

       return redirect()->back();
    }
}
