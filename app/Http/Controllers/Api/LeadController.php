<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(Request $request) {

        $data = $request->all();

        $new_lead = new Lead();
        $new_lead->fill($data);
        $new_lead->save();

        $objectNewContact = new NewContact($new_lead);

        Mail::to('info@katialosignore.it')->send($objectNewContact);

        return response()->json(
            [
                 'success' => true
            ]
        );

    }
}
