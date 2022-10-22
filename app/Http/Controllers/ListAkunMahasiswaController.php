<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ListAkunMahasiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.super-admin')->only(['index', 'create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->dataView['nama'] = 'Super Admin';
        $this->dataView['listMahasiswa'] = Mahasiswa::all();

        return view('superAdmin.main.list_mahasiswa.index', $this->dataView);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->dataView['nama'] = 'Super Admin';
        $this->dataView['mahasiswa'] = Mahasiswa::where('id_mahasiswa', $id)->first();
        return view('superAdmin.main.list_mahasiswa.edit', $this->dataView);
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
        $query =  User::where('id_user', $id)->update([
            'password' => Hash::make('123456'),
        ]);


        if ($query) {
            $response = [
                'status' => 200,
                'message' => 'Password reseted successfully',
            ];
        } else {
            $response = [
                'status' => 400,
                'message' => 'Failed to reset password',
            ];
        }

        return response()->json($response);
    }


    public function updateNPM(Request $request, $id)
    {
        $query =  Mahasiswa::where('id_mahasiswa', $id)->update([
            'npm' => $request->npm,
        ]);

        return redirect()->back()
            ->with('success', 'NPM updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function datatable(Request $request)
    {
        $column = [
            'nama',
            'npm',
            'created_at',
            'status',
        ];

        $start  = $request->start;
        $length = $request->length;
        $order  = $column[$request->input('order.0.column')];
        $dir    = $request->input('order.0.dir');
        $search = $request->input('search.value');


        $total_data = Mahasiswa::count();

        $query_data = Mahasiswa::where(function ($query) use ($search, $request) {
            if ($search) {
                $query->where(function ($query) use ($search, $request) {
                    $query->where('nama', 'like', "%$search%")
                        ->orWhereHas('user', function ($query) use ($search, $request) {
                            $query->where('email', 'like', "%$search%");
                        });
                });
            }
        })
            ->offset($start)
            ->limit($length)
            ->orderBy($order, $dir)
            ->get();

        $total_filtered = Mahasiswa::where(function ($query) use ($search, $request) {
            if ($search) {
                $query->where(function ($query) use ($search, $request) {
                    $query->where('nama', 'like', "%$search%")
                        ->orWhereHas('user', function ($query) use ($search, $request) {
                            $query->where('email', 'like', "%$search%");
                        });
                });
            }
        })->count();

        $response['data'] = [];
        if ($query_data <> FALSE) {

            foreach ($query_data as $val) {

                $getStatus =  $val->user->status === 1 ? 'btn-success' : 'btn-danger';
                $statusConvert = $val->user->status === 1 ? 'Active' : 'Inactive';
                $status =
                    '<li class="btn btn-sm js-status ' . $getStatus . '  disabled">
                         ' . $statusConvert . '
                        </li>';

                $action =
                    '  <a href="' . route('listAkunMahasiswa.edit', $val->id_mahasiswa) . '" class="btn btn-outline-success btn-sm"><i class="bi bi-pencil text-success" "></i></a>
                    <button type="button" class="btn btn-outline-danger btn-sm"><i class="bi bi-key-fill text-danger" onclick="resetPassword(' . $val->user->id_user . ')"></i></button>';

                $response['data'][] = [
                    $val->nama,
                    $val->npm,
                    $val->user->email,
                    $status,
                    $action,
                ];
            }
        }

        $response['recordsTotal'] = 0;
        if ($total_data <> FALSE) {
            $response['recordsTotal'] = $total_data;
        }

        $response['recordsFiltered'] = 0;
        if ($total_filtered <> FALSE) {
            $response['recordsFiltered'] = $total_filtered;
        }

        return response()->json($response);
    }
}
