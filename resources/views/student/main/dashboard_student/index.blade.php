@extends('student/layouts/app')
@section('path')
Dashboard
@endsection
@section('content')
{{-- CONTENT --}}
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="name">Course Name</th>
                                <th scope="col" class="sort" data-sort="budget">Status</th>
                                <th scope="col" class="sort" data-sort="status">Comment</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($kursus as $k)
                            <tr>
                                <th scope="row">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm">{{ $k->nama_kursus }}</span>
                                    </div>
                                </th>
                                <td class="budget">
                                    <i
                                    class="btn btn-sm {{$k->pivot->status_verifikasi==1?'bi bi-check btn-success':'bi bi-x btn-danger'}} disabled">
                                    {{$k->pivot->status_verifikasi==1?'Verfied':'Unverified'}}</i>
                                </td>
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <span class="status">
                                            {{$k->pivot->komentar}}
                                        </span>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Card footer -->
                    <div class="card-footer py-4">
                        <nav aria-label="">
                            <ul class="pagination justify-content-end mb-0">
                                {!! $kursus->links() !!}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @endsection