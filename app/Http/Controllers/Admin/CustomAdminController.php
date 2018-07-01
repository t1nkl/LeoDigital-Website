<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Backpack\Base\app\Http\Controllers\Controller as Controller;
use App\Models\{VisitorId, VisitorIp};

class CustomAdminController extends Controller
{
    protected $data = []; // the information we send to the view

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $this->data['title'] = trans('backpack::base.dashboard');

        $this->data['visitorid_browser'] = VisitorId::selectRaw('count(id) as value, browser')->groupBy('browser')->get()->toArray();
        $this->data['visitorid_os'] = VisitorId::selectRaw('count(id) as value, os')->groupBy('os')->get()->toArray();

        $this->data['visitorid'] = VisitorId::all()->count();
        $this->data['visitorid_this_month'] = VisitorId::where( DB::raw('MONTH(created_at)'), '=', date('n') )->count();
        $this->data['visitorid_last_month'] = VisitorId::where( DB::raw('MONTH(created_at)'), '<', date('n') )->count();
        $this->data['visitorip'] = VisitorIp::all()->count();

        $this->data['dailycountvisitorid10'] = VisitorId::dailyCountVisitorId(10)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorip10'] = VisitorIp::dailyCountVisitorIp(10)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorid30'] = VisitorId::dailyCountVisitorId(30)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorip30'] = VisitorIp::dailyCountVisitorIp(30)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorid90'] = VisitorId::dailyCountVisitorId(90)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorip90'] = VisitorIp::dailyCountVisitorIp(90)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorid180'] = VisitorId::dailyCountVisitorId(180)->pluck('views', 'date')->toArray();
        $this->data['dailycountvisitorip180'] = VisitorIp::dailyCountVisitorIp(180)->pluck('views', 'date')->toArray();

        return view('backpack::dashboard', $this->data);
    }

    /**
     * Redirect to the dashboard.
     *
     * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     */
    public function redirect()
    {
        // The '/admin' route is not to be used as a page, because it breaks the menu's active state.
        return redirect(config('backpack.base.route_prefix', 'admin').'/dashboard');
    }
}
