@extends('voyager::master')

@section('page_title', 'Export data')

@section('page_header')
  <h1 class="page_title">
    <i class="voyager-data"></i> Export data
  </h1>
  @include('voyager::multilingual.language-selector')
@stop

@section('content')
  <div class="page-content container">
    @include('voyager::alerts')
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-bordered">
          <div class="panel-body">
            {!! Form::open(['route' => 'voyager.exports.download', 'method' => 'POST']) !!}
            <div class="row">
              @if (count($errors) > 0)
                @foreach ($errors-> all() as $error)
                  <div class="alert alert-danger">
                    {{ $error }}
                  </div>
                @endforeach
              @endif
              <div class="form-group col-md-2">
                {!!
                  Form::select('exportable', [
                    'User' => 'User',
                    'Product' => 'Product',
                    'Order' => 'Order',
                    'Invoice' => 'Invoice',
                  ], null, ['class' => 'form-control']);
                !!}
              </div>
              <div class="form-group col-md-2">
                {!! Form::submit('Export', ['class' => 'btn btn-primary']); !!}
              </div>
            </div>
            {!! Form::close(); !!}
          </div>
        </div>
      </div>
    </div>
  </div>
@stop

@section('css')

@stop

@section('javascript')

@stop
