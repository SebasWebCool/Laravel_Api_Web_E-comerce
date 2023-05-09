@extends('layouts.app')

@section('template_title')
    {{ $sock->name ?? "{{ __('Show') Sock" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('socks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $sock->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $sock->description }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $sock->price }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $sock->color }}
                        </div>
                        <div class="form-group">
                            <strong>Size:</strong>
                            {{ $sock->size }}
                        </div>
                        <div class="form-group">
                            <strong>Sku:</strong>
                            {{ $sock->sku }}
                        </div>
                        <div class="form-group">
                            <strong>Image:</strong>
                            {{ $sock->image }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $sock->stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
