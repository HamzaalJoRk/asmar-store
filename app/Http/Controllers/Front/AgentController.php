<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Agent;
class AgentController extends Controller
{


    /**
     * Show the application dashboard.
     *layouts-scrollable
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $agents =Agent::IsActive()->get();
        return view('front.agents.index')->with([
            'agents'=>$agents,
        ]);
    }

}
