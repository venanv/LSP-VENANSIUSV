<?php

namespace App\Http\Controllers;

use App\Models\Member; // Import the Member model

use Illuminate\Http\Request;  

class MemberController extends Controller
{
    // Method to display a list of members
    public function index()
    {
        $members = Member::all(); // Fetch all members from the database
        return view('members.index', compact('members')); // Pass members data to the view
    }

    // Method to display a specific member by ID
    public function show($id)
    {
        $member = Member::findOrFail($id); // Fetch member by ID or fail if not found
        return view('members.show', compact('member')); // Pass member data to the view
    }
    public function create()
    {
        return view('members.create');
    }

    // Store the new member in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
        ]);

        Member::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }

    // Show the form to edit an existing member
    public function edit($id)
    {
        $member = Member::findOrFail($id); // Find the member by ID
        return view('members.edit', compact('member')); // Pass member data to the view
    }

    // Update the member in the database
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id, // Ensure the email is unique except for the current member
        ]);

        $member = Member::findOrFail($id); // Find the member by ID
        $member->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    // Delete a member from the database
    public function destroy($id)
    {
        $member = Member::findOrFail($id); // Find the member by ID
        $member->delete(); // Delete the member

        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }
}
