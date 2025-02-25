<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function loginPage()
    {
        return view('agent.form');
    }

    public function store(Request $request)
    {
        // Validate input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:agents,email',
            'phone' => 'required|digits:10|unique:agents,phone',
            'password' => 'required|min:6|confirmed',
        ], [
            'name.required' => 'Full Name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.unique' => 'This email is already registered.',
            'phone.required' => 'Mobile number is required.',
            'phone.digits' => 'Mobile number must be exactly 10 digits.',
            'phone.unique' => 'This mobile number is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Store user
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'agent_id' => $this->generateUniqueAgentId(),
        ];

        $agent =  Agent::create($data);

        if ($agent) {
            session(['agent'=> $agent]);
            return redirect()->route('agent.verification')->with(
                'success','Account created successfully. Please verify your details.'
            );
        }
        else{
            return redirect()->back()->with('error','somthing went wrong ');
        }
    }

    public function verification_page(Request $request)
    {
        $agent  = session('agent');
        if (!$agent) {
            return redirect()->route('agent.login')->with('error', 'Session expired. Please register again.');
        }
        $details = Agent::where('email',$agent->email)->first();
        return view('agent.verification',['agent'=> $details]);
    }


    public function generateUniqueAgentId()
    {
        do {
            $uniqueId = 'AG_' . strtoupper(Str::random(8)); // Generate a random 8-character string
        } while (Agent::where('agent_id', $uniqueId)->exists()); // Ensure uniqueness

        return $uniqueId;
    }

}
