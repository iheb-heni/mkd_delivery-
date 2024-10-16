<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    // Store a new contact
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'login' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Create a new contact entry
        Contact::create($request->all());

        // Redirect or show success message
        return redirect()->back()->with('success', 'Le contact a été effectuée avec succès!');
    }

    // List all contacts
    public function index()
    {
        // Get all contacts
        $contacts = Contact::all();

        // Return the view with contacts
        return view('admin.sections.contacts.index', compact('contacts'));
    }

    // Show a single contact
    public function show($id)
    {
        // Find contact by id
        $contact = Contact::findOrFail($id);

        // Return the view with the contact details
        return view('admin.sections.contacts.show', compact('contact'));
    }

    // Delete a contact
    public function destroy($id)
    {
        // Find the contact by id and delete it
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Redirect with success message
        return redirect()->route('contacts.index')->with('success', 'Le contact a été supprimé avec succès.');
    }
}
