<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::paginate(10);
        return view('leave_requests.index', compact('leaveRequests'));
    }

    // Method to return all leave requests (for API or other purposes)
    public function all()
    {
        return LeaveRequest::all();
    }
    public function create()
    {
        return view('leave_requests.create');
    }
    // Store a new leave request
    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'employee_name' => 'required|string|max:255',
            'leave_type' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string',
        ]);

        try {
            // Create the leave request
            LeaveRequest::create($validatedData);

            if ($request->wantsJson()) {
                // Return JSON response for API requests
                return response()->json(['message' => 'Leave Request added successfully.'], 201);
            } else {
                // Redirect with flash message for web requests
                return redirect()->route('leave-requests.index')->with('success', 'Leave Request added successfully.');
            }
        } catch (\Exception $e) {
            if ($request->wantsJson()) {
                // Return JSON response for API requests
                return response()->json(['message' => 'Failed to add leave request.'], 500);
            } else {
                // Redirect with error message for web requests
                return redirect()->route('leave-requests.index')->with('error', 'Failed to add leave request.');
            }
        }
    }


    public function edit($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        return view('leave_requests.edit', compact('leaveRequest'));
    }
    
    public function update(Request $request, $id)
{
    // Validate the incoming request
    $validatedData = $request->validate([
        'employee_name' => 'required|string',
        'leave_type' => 'required|string',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'reason' => 'required|string',
    ]);

    try {
        $leaveRequest = LeaveRequest::findOrFail($id);
        // actual insert done here
        $leaveRequest->update($validatedData);

        if ($request->wantsJson()) {
            // Return JSON response for API requests
            return response()->json(['message' => 'Leave request updated successfully.']);
        } else {
            // Redirect with flash message for web requests
            return redirect()->route('leave-requests.index')->with('success', 'Leave request updated successfully.');
        }
    } catch (\Exception $e) {
        if ($request->wantsJson()) {
            // Return JSON response for API requests
            return response()->json(['message' => 'Failed to update leave request.'], 500);
        } else {
            // Redirect with error message for web requests
            return redirect()->route('leave-requests.index')->with('error', 'Failed to update leave request.');
        }
    }
}

    
public function destroy($id)
{
    try {
        LeaveRequest::destroy($id);

        if (request()->wantsJson()) {
            // Return JSON response for API requests
            return response()->json(['message' => 'Leave request deleted successfully.']);
        } else {
            // Redirect with flash message for web requests
            return redirect()->route('leave-requests.index')->with('success', 'Leave request deleted successfully.');
        }
    } catch (\Exception $e) {
        if (request()->wantsJson()) {
            // Return JSON response for API requests
            return response()->json(['message' => 'Failed to delete leave request.'], 500);
        } else {
            // Redirect with error message for web requests
            return redirect()->route('leave-requests.index')->with('error', 'Failed to delete leave request.');
        }
    }
}


}
