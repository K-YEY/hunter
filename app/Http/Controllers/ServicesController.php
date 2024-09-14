<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index($id = null)
    {
        $data = Service::with('type')->where('status', 'publish')
            ->when($id, function ($query, $id) {
                return $query->where('type_id', $id);
            })
            ->get();
            $data->count() > 0 ?  $data : $data = Service::with('type')->where('status', 'publish')->get();

        return view('main.service', compact('data'));
    }
    public function single($id)
    {
        $data = Service::with('type')->where('status', 'publish')->find($id);
        if(!$data) abort(404);
        return view('main.single', compact('data'));
    }
}
