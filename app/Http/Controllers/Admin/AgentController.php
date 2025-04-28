<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgentRequest;
use App\Models\Agent;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:read_agents')->only(['index']);
        $this->middleware('permission:create_agents')->only(['create', 'store']);
        $this->middleware('permission:update_agents')->only(['edit', 'update']);
        $this->middleware('permission:delete_agents')->only(['delete']);

    }// end of __construct
    public function index(){
        $agents= Agent::latest()->paginate(10);
        return view('admin.agents.index',compact('agents'));
    }
    public function create(){
        return view('admin.agents.create');
    }
    public function store(AgentRequest $request){
        Agent::create($request->all());
        Alert::success(__('settings.success'), __('createsms'));
        return redirect()->route('ad.agents.index');
    }
    public function edit(Agent $agent){
        return view('admin.agents.edit',compact('agent'));
    }
    public function update(AgentRequest $request, Agent $agent){
        $agent->update($request->all());
        Alert::success(__('settings.success'), __('editsms'));
        return redirect()->route('ad.agents.index');
    }
    public function destroy(Agent $agent){
        $agent->delete();
        Alert::success(__('settings.success'), __('deletesms'));
        return redirect()->back();
    }
}
