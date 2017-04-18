@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.calls.title')</h3>
    
    {!! Form::model($call, ['method' => 'PUT', 'route' => ['calls.update', $call->id], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_edit')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('type', 'Type*', ['class' => 'control-label']) !!}
                    {!! Form::text('type', old('type'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('type'))
                        <p class="help-block">
                            {{ $errors->first('type') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('brand', 'Brand*', ['class' => 'control-label']) !!}
                    {!! Form::text('brand', old('brand'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('brand'))
                        <p class="help-block">
                            {{ $errors->first('brand') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('product', 'Product*', ['class' => 'control-label']) !!}
                    {!! Form::text('product', old('product'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('product'))
                        <p class="help-block">
                            {{ $errors->first('product') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('model', 'Model*', ['class' => 'control-label']) !!}
                    {!! Form::text('model', old('model'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('model'))
                        <p class="help-block">
                            {{ $errors->first('model') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('serial_no', 'Serial no', ['class' => 'control-label']) !!}
                    {!! Form::text('serial_no', old('serial_no'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('serial_no'))
                        <p class="help-block">
                            {{ $errors->first('serial_no') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_name', 'Customer name', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_name', old('customer_name'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_name'))
                        <p class="help-block">
                            {{ $errors->first('customer_name') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_mobile', 'Customer mobile', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_mobile', old('customer_mobile'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_mobile'))
                        <p class="help-block">
                            {{ $errors->first('customer_mobile') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_phone', 'Customer phone', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_phone', old('customer_phone'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_phone'))
                        <p class="help-block">
                            {{ $errors->first('customer_phone') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('customer_address', 'Customer address', ['class' => 'control-label']) !!}
                    {!! Form::text('customer_address', old('customer_address'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('customer_address'))
                        <p class="help-block">
                            {{ $errors->first('customer_address') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('complain', 'Complain', ['class' => 'control-label']) !!}
                    {!! Form::textarea('complain', old('complain'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('complain'))
                        <p class="help-block">
                            {{ $errors->first('complain') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('remarks', 'Remarks', ['class' => 'control-label']) !!}
                    {!! Form::textarea('remarks', old('remarks'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('remarks'))
                        <p class="help-block">
                            {{ $errors->first('remarks') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    @if ($call->bill)
                        <a href="{{ asset('uploads/'.$call->bill) }}" target="_blank"><img src="{{ asset('uploads/thumb/'.$call->bill) }}"></a>
                    @endif
                    {!! Form::label('bill', 'Bill', ['class' => 'control-label']) !!}
                    {!! Form::file('bill', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    {!! Form::hidden('bill_max_size', 8) !!}
                    {!! Form::hidden('bill_max_width', 4000) !!}
                    {!! Form::hidden('bill_max_height', 4000) !!}
                    <p class="help-block"></p>
                    @if($errors->has('bill'))
                        <p class="help-block">
                            {{ $errors->first('bill') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('dealer_id', 'Dealer', ['class' => 'control-label']) !!}
                    {!! Form::select('dealer_id', $dealers, old('dealer_id'), ['class' => 'form-control select2']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('dealer_id'))
                        <p class="help-block">
                            {{ $errors->first('dealer_id') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_update'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

