<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    //


    public function index(Request $request)
    {
        $query = Contact::query();

        if ($request->has('search')) {
            $search = $request->input('search');

            if (Str::startsWith($search, '@')) {
                $text = Str::after($search, '@');
                $query->where('status', $text);
            } else {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('company_name', 'LIKE', "%{$search}%");
            }
        }

        $contacts = $query->paginate(15);  // Use the $query variable here
        return view('dashboard.tables.contact.contact-table', compact('contacts'));
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        if (!$contact) {
            Notyf()->warning('Contact not found');
            return redirect()->back();
        }
        $contact->delete();
        Notyf()->success('Contact deleted successfully');
        return redirect()->back();
    }
    public function updateStatus(Request $request)
    {

        $contact = Contact::find($request->id);
        if (!$contact) {
            Notyf()->warning('Contact not found');
            return redirect()->back();
        }
        $contact->status = $request->status;
        $contact->save();
        Notyf()->success('Contact status updated successfully');
        return redirect()->back();
    }
}
