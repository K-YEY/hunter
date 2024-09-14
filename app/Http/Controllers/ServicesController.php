<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index($id = null)
    {
        $query = Service::with('type')->where('status', 'publish');

        if ($id) {
            $query->where('type_id', $id);
        }

        $data = $query->get();

        if ($data->isEmpty() && $id) {
            $data = Service::with('type')->where('status', 'publish')->get();
        }

        return view('main.service', compact('data'));
    }

    public function single($id)
    {
        $data = Service::with('type')->where('status', 'publish')->find($id);

        if (!$data) {
            abort(404);
        }

        return view('main.single', compact('data'));
    }
}
