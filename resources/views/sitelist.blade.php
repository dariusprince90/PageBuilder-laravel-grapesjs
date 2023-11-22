@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Website List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>View</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Publish</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $val)
                                    @if (auth()->user()->id == $val->user_id)
                                        <tr>
                                            <td>{{ $val->id }}</td>
                                            <td>{{ $val->name }}</td>
                                            <td>
                                                <a href="{{ route('website.show', $val->id) }}" target="_blank">View</a>
                                            </td>
                                            @if ($val->is_published == 0)
                                                <td>unpublished</td>
                                            @else
                                                <td>published</td>
                                            @endif
                                            <td>
                                                <a href="{{ route('website.edit', $val->id) }}" target="_blank">Edit</a>
                                            </td>
                                            @if ($val->is_published == 0)
                                                <td>
                                                    <form action="{{ route('website.publish', $val->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button
                                                            style="border: none; background-color: white; color: #3490dc">
                                                            Publish
                                                        </button>
                                                    </form>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>
                                                <form action="{{ route('website.destroy', $val->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="border: none; background-color: white;">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                                            viewBox="0 0 448 512">
                                                            <path
                                                                d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
