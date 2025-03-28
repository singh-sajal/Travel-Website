<?php

namespace App\Http\Controllers\Agent;

use App\Models\Agent;
use App\Models\Query;
use App\Models\Package;
use App\Models\Destination;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    // public function buyLeads()
    // {
    //     $leads = Query::with([
    //         'package',
    //         'package.destination'
    //     ])->where('status', 1)->get();
    //     return view('agent.buyLeads', compact('leads'));
    // }

    public function buyLeads(Request $request)
    {
        $query = Query::with('package.destination');

        // Filter by city
        if ($request->has('city') && $request->city != '') {
            $query->where('pickup_location', $request->city);
        }

        // Filter by type
        if ($request->has('type') && $request->type != '') {
            $query->whereHas('package.destination', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }

        // Filter by date
        if ($request->has('date') && $request->date != '') {
            $query->whereDate('expected_date', $request->date);
        }

        // Sorting
        if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            } elseif ($request->sort == 'low_high') {
                $query->orderBy('package.price', 'asc');
            } elseif ($request->sort == 'high_low') {
                $query->orderBy('package.price', 'desc');
            }
        }

        $leads = $query->get();
        $cities = Query::pluck('pickup_location')->unique(); // Get unique cities

        return view('agent.buyLeads', compact('leads', 'cities'));
    }

    public function filterLeads(Request $request)
    {
        $query = Query::query();

        // Filter by City
        if ($request->has('city') && !empty($request->city)) {
            $query->where('pickup_location', $request->city);
        }

        // Filter by Type
        if ($request->has('type') && !empty($request->type)) {
            $query->whereHas('package.destination', function ($q) use ($request) {
                $q->where('type', $request->type);
            });
        }

        // Filter by Date
        if ($request->has('date') && !empty($request->date)) {
            $query->whereDate('expected_date', $request->date);
        }

        // Sorting
        if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'oldest') {
                $query->orderBy('created_at', 'asc');
            } elseif ($request->sort == 'high') {
                $query->orderBy('package.price', 'desc');
            } elseif ($request->sort == 'low') {
                $query->orderBy('package.price', 'asc');
            }
        }

        $leads = $query->get();

        return response()->json($leads);
    }


    public function boughtLead(Request $request){

        $leadId = $request->leadId;
        $agent = Auth::guard('agent')->user();


        // return $agent;
        $finalBalance = $this->getFinalBalance($agent->id);

        if($finalBalance >= $leadId->price){  //leadId->price means after finding the price of the lead
            
        }

    }

    public function getFinalBalance($id)
    {
        // Get the last transaction of the agent
        $lastTransaction = Transaction::where('id', $id)->latest()->first();

        // Get the last balance, default to 0 if no previous transaction
        $lastBalance = $lastTransaction ? (float) $lastTransaction->final_balance : 0;

        return $lastBalance;
    }

    function generateTransactionNumber($agentId)
    {
        return 'TXN-' . $agentId . '-' . strtoupper(uniqid());
    }
}
