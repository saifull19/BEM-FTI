<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Symfony\Components\HttpFoundation\Response;

use Auth;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\ExperienceUser;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderStatus;

class MemberController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('freelancer_id', Auth::user()->id)->get();

        $progresss = Order::where('freelancer_id', Auth::user()->id)
                        ->where('order_status_id', 2)
                        ->count();
        $completedd = Order::where('freelancer_id', Auth::user()->id)
                        ->where('order_status_id', 1)
                        ->count();
        $freelancerr = Order::where('buyer_id', Auth::user()->id)
                        ->where('order_status_id', 2)
                        ->distinct('freelancer_id')
                        ->count();

        

        $service = Service::all();

        
        $progress = Order::all()->count();

        $completed = Service::all()->count();

        $freelancer = User::all()->count();

        // $progress = Order::where('freelancer_id', Auth::user()->id)->where('order_status_id', 2)->count();

        // $giatBelajar = Order::where('service_id', 1)->count();
        // $mulaiBelajar = Order::where('service_id', 2)->count();
        // $digital = Order::where('service_id', 3)->count();
        // $JavaScript = Order::where('service_id')->count();

        // $freelancer = User::where('buyer_id', Auth::user()->id)->where('order_status_id', 2)->distinct('freelancer_id')->count();

        return view('pages.dashboard.index', compact('orders','progresss', 'completedd', 'freelancerr', 'service', 'progress', 'completed', 'freelancer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return abort('404');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return abort('404');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return abort('404');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort('404');
    }
}
