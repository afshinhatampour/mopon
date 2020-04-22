<?php

namespace App\Http\Controllers;

use Auth;
use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function __construct()
    {
        //$this->middleware('IsLoginApi');
        //$this->middleware('IsAdmin')->only('store', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // check orderBy param is set
        if ($request->orderBy) {
            // order coupons list by orderBy param value
            if (strtolower($request->orderBy) == 'desc' || strtolower($request->orderBy) == 'asc') {
                $copouns = Coupon::orderBy('created_at', $request->orderBy)->pluck('name');
            } else {
                return response()->json(['message' => 'you should set orderBy DESC or ASC'], 200);
            }
        } else {
            // fetch all coupons
            $copouns = Coupon::all()->pluck('name');
        }
        // return all coupons
        return response()->json(['data' => $copouns], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate request
        $coupon = $this->validate($request, [
            'name' => 'required',
            'link' => 'required',
            'amount' => 'required',
            'brand_id' => 'required',
            'code' => 'required',
            'type' => 'required'
        ]);
        // create new coupon by request fields
        Coupon::create($coupon);
        // return response message after created coupon
        return response()->json(['message' => 'coupon  created successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            // return coupon data as a json
            return response()->json(['data' => $coupon]);
        } else {
            // return response message if coupon not found
            return response()->json(['message' => 'coupon not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            // validation request
            $couponNewData = $this->validate($request, [
                'name' => 'required',
                'link' => 'required',
                'amount' => 'required',
                'brand_id' => 'required',
                'code' => 'required',
                'type' => 'required'
            ]);
            // update coupon by new fields
            $coupon->update($couponNewData);
            $coupon->save();
            // return response message after update successfully
            return response()->json(['message' => 'coupon updated successfully'], 200);
        } else {
            // return response message if coupon not found
            return response()->json(['message' => 'coupon not found'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Coupon $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            // delete coupon find by id
            $coupon->delete();
            // return response after deleted coupon
            return response()->json(['message' => 'coupon deleted']);
        } else {
            // return response if coupon not found
            return response()->json(['message' => 'coupon not found']);
        }
    }
}
