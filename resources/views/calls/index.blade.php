@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.calls.title')</h3>
    @can('call_create')
    <p>
        <a href="{{ route('calls.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($calls) > 0 ? 'datatable' : '' }} @can('call_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('call_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

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
                                @can('call_delete')
                                    <td></td>
                                @endcan

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
@stop

@section('javascript') 
    <script>
        @can('call_delete')
            window.route_mass_crud_entries_destroy = '{{ route('calls.mass_destroy') }}';
        @endcan

    </script>
@endsection