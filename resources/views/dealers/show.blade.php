@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.dealers.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.shop-name')</th>
                            <td>{{ $dealer->shop_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.first-name')</th>
                            <td>{{ $dealer->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.last-name')</th>
                            <td>{{ $dealer->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.mobile')</th>
                            <td>{{ $dealer->mobile }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.phone')</th>
                            <td>{{ $dealer->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.city')</th>
                            <td>{{ $dealer->city }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.dealers.fields.password')</th>
                            <td>{{ $dealer->password }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#calls" aria-controls="calls" role="tab" data-toggle="tab">Calls</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="calls">
<table class="table table-bordered table-striped {{ count($calls) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.calls.fields.type')</th>
                        <th>@lang('quickadmin.calls.fields.brand')</th>
                        <th>@lang('quickadmin.calls.fields.product')</th>
                        <th>@lang('quickadmin.calls.fields.model')</th>
                        <th>@lang('quickadmin.calls.fields.serial-no')</th>
                        <th>@lang('quickadmin.calls.fields.customer-name')</th>
                        <th>@lang('quickadmin.calls.fields.customer-mobile')</th>
                        <th>@lang('quickadmin.calls.fields.customer-phone')</th>
                        <th>@lang('quickadmin.calls.fields.customer-address')</th>
                        <th>@lang('quickadmin.calls.fields.complain')</th>
                        <th>@lang('quickadmin.calls.fields.remarks')</th>
                        <th>@lang('quickadmin.calls.fields.bill')</th>
                        <th>@lang('quickadmin.calls.fields.dealer')</th>
                        <th>@lang('quickadmin.dealers.fields.mobile')</th>
                        <th>&nbsp;</th>
        </tr>
    </thead>

    <tbody>
        @if (count($calls) > 0)
            @foreach ($calls as $call)
                <tr data-entry-id="{{ $call->id }}">
                    <td>{{ $call->type }}</td>
                                <td>{{ $call->brand }}</td>
                                <td>{{ $call->product }}</td>
                                <td>{{ $call->model }}</td>
                                <td>{{ $call->serial_no }}</td>
                                <td>{{ $call->customer_name }}</td>
                                <td>{{ $call->customer_mobile }}</td>
                                <td>{{ $call->customer_phone }}</td>
                                <td>{{ $call->customer_address }}</td>
                                <td>{!! $call->complain !!}</td>
                                <td>{!! $call->remarks !!}</td>
                                <td>@if($call->bill)<a href="{{ asset('uploads/' . $call->bill) }}" target="_blank"><img src="{{ asset('uploads/thumb/' . $call->bill) }}"/></a>@endif</td>
                                <td>{{ $call->dealer->shop_name or '' }}</td>
<td>{{ isset($call->dealer) ? $call->dealer->mobile : '' }}</td>
                                <td>
                                    @can('call_view')
                                    <a href="{{ route('calls.show',[$call->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('call_edit')
                                    <a href="{{ route('calls.edit',[$call->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('call_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['calls.destroy', $call->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="17">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('dealers.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop