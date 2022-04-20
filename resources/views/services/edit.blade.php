@extends('template.master')
@section('title', 'edit roomstatus')
@section('content')
    <div class="row justify-content-md-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border">
                <div class="card-header">
                    <h2>Edit  Room Service</h2>
                </div>
                <div class="card-body p-3">
                    <form class="row g-3" method="POST" action="{{ route('service.update', ['roomstatus'=>$service->id]) }}">
                        @method('post')
                        @csrf
                        <input type="hidden" name="id" value="{{ $service->id }}"/>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $service->name }}">
                            @error('name')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="code" class="form-label">Detail</label>
                            <input type="text" class="form-control @error('detail') is-invalid @enderror" id="detail"
                                name="detail" value="{{ $service->detail }}">
                            @error('detail')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-light shadow-sm border float-end">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
