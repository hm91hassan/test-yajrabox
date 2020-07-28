<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$users = User::get();
        return view('home');
    }
    public function getusers()
    {

        return DataTables::of(User::query())
            ->setRowClass(function ($user) {
                return $user->id % 2 == 0 ? 'alert-success' : 'alert-warning';
            })
            ->setRowAttr([
                'align' => 'center'
            ])
            ->addColumn('role', function (User $user) {
                return 'Admin';
            })
            ->editColumn('created_at', function (User $user) {
                return  $user->created_at->diffForHumans();
            })
            ->editColumn('updated_at', function (User $user) {
                return  '<button class="btn btn-success btn-sm">Update</button>';
            })
            ->rawColumns(['updated_at'])

            ->toJson();
    }
    public function builder(UserDataTable $dataTable)
    {
        $title = "this is Hasan";
        return $dataTable->render('index', compact('title'));
    }
}
