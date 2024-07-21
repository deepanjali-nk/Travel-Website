<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function getContacts()
    {
        $contacts = DB::table('contacts')->paginate(3);

        return view('admin.sections.contacts.contacts', compact('contacts'));
    }
}
