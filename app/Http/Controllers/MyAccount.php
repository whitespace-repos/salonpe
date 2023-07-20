<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MyAccount extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Web/MyAccount/Register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         return Inertia::render('Web/MyAccount/Login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function dashboard(){
        return Inertia::render('Web/MyAccount/Dashboard');
    }

    public function orders(){
        return Inertia::render('Web/MyAccount/Orders', [ "orders" => auth()->user()->orders->load("cart") ]);
    }

    public function addresses(){
        return Inertia::render('Web/MyAccount/Addresses', [ "addresses" => auth()->user()->addresses]);
    }

    public function detail(){
        return Inertia::render('Web/MyAccount/AccountDetail');
    }

    public function paymentMethod(){
        return Inertia::render('Web/MyAccount/PaymentMethods');
    }
}
