<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Constructor;
use App\Http\Controllers\Controller;
use App\Repositories\ConstructorRepository;
use Illuminate\Http\Request;

class ConstructorController extends Controller
{
    public $constructorRepository;
    public function __construct(ConstructorRepository $constructorRepository)
    {
        $this->constructorRepository = $constructorRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $constructors = $this->constructorRepository->index();
        return view('Admin.Constructor.constructor_list', compact('constructors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Admin.Constructor.constructor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        return $this->constructorRepository->store($request);
        return $this->constructorRepository->send_notification($this->constructorRepository->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Constructor  $constructor
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function show(Constructor $constructor)
    {
        return $this->constructorRepository->show($constructor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function edit(Constructor $constructor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Constructor $constructor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Constructor  $constructor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Constructor $constructor)
    {
        $this->constructorRepository->destroy($constructor);
    }
}
