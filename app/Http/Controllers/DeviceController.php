<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Device;

class DeviceController extends Controller
{
         /**
     * Display a listing of device.
     * @return Response
     */
    public function index()
    {
        $device = Device::all();
        return response()->json($device);
    }
}
