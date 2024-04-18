<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contacts = Contact::query()
        ->when($request->search, function(Builder $query, string $search) {
            $query->whereAny(
                Contact::$filterable,
                'like',
                "%$search%"
            );
        })
        ->where('user_id', Auth::id())->paginate(10);


        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contact = new Contact();

        return view('contacts.create', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactRequest $request)
    {
        $user =  Auth::user();
        $user->contacts()->create($request->validated());

        return redirect()->route('contacts.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return back();
    }
}
