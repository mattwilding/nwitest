<?php

namespace App\Http\Controllers;

use App\Mail\ContactSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Submission;

use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{

    public function index(){
        $submissions = Submission::all();
        return view('all-contacts')->with(compact(['submissions']));
    }

    public function show($id){
        $submission = Submission::findOrFail($id);
        return view('show-contact')->with(compact(['submission']));
    }

    public function create(){
        return view('contact-form');
    }

    public function store(ContactRequest $request){
        $s = new Submission();
        $s->name = strip_tags($request->name);
        $s->email_address = $request->email_address;
        $s->message = strip_tags($request->message);
        $s->save();
        Mail::to('mattjwilding@gmail.com')->send(new ContactSubmitted($s));
        return redirect('/');
    }

}
