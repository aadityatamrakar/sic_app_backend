@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.calls.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.calls.fields.type')</th>
                            <td>{{ $call->type }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.brand')</th>
                            <td>{{ $call->brand }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.product')</th>
                            <td>{{ $call->product }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.model')</th>
                            <td>{{ $call->model }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.serial-no')</th>
                            <td>{{ $call->serial_no }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.customer-name')</th>
                            <td>{{ $call->customer_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.customer-mobile')</th>
                            <td>{{ $call->customer_mobile }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.customer-phone')</th>
                            <td>{{ $call->customer_phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.customer-address')</th>
                            <td>{{ $call->customer_address }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.complain')</th>
                            <td>{!! $call->complain !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.remarks')</th>
                            <td>{!! $call->remarks !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.bill')</th>
                            <td>@if($call->bill)<a href="{{ asset('uploads/' . $call->bill) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $call->bill) }}"/></a>@endif</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.calls.fields.dealer')</th>
                            <td>{{ $call->dealer->shop_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.mobile')</th>
                            <td>{{ isset($call->dealer) ? $call->dealer->mobile : '' }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('calls.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop