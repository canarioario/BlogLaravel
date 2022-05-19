@extends('layouts.backend.app')

@section('title','Tag')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <!-- Vertical Layout | With Floating Label -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                           AÑADIR NUEVA ETIQUETA
                        </h2>
                    </div>
                    <div class="body">
                        <form action="{{ route('admin.tag.store') }}" method="POST">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Nombre de la etiqueta</label>
                                </div>
                            </div>

                            <a  class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.tag.index') }}">ATRÁS</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBIR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush