@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.dealers.title')</h3>
    @can('dealer_create')
    <p>
        <a href="{{ route('dealers.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
    </p>
    @endcan

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($dealers) > 0 ? 'datatable' : '' }} @can('dealer_delete') dt-select @endcan">
                <thead>
                    <tr>
                        @can('dealer_delete')
                            <th style="text-align:center;"><input type="checkbox" id="select-all" /></th>
                        @endcan

                        <th>@lang('quickadmin.dealers.fields.shop-name')</th>
                        <th>@lang('quickadmin.dealers.fields.first-name')</th>
                        <th>@lang('quickadmin.dealers.fields.last-name')</th>
                        <th>@lang('quickadmin.dealers.fields.mobile')</th>
                        <th>@lang('quickadmin.dealers.fields.phone')</th>
                        <th>@lang('quickadmin.dealers.fields.city')</th>
                        <th>@lang('quickadmin.dealers.fields.password')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($dealers) > 0)
                        @foreach ($dealers as $dealer)
                            <tr data-entry-id="{{ $dealer->id }}">
                                @can('dealer_delete')
                                    <td></td>
                                @endcan

                                <td>{{ $dealer->shop_name }}</td>
                                <td>{{ $dealer->first_name }}</td>
                                <td>{{ $dealer->last_name }}</td>
                                <td>{{ $dealer->mobile }}</td>
                                <td>{{ $dealer->phone }}</td>
                                <td>{{ $dealer->city }}</td>
                                <td>{{ $dealer->password }}</td>
                                <td>
                                    @can('dealer_view')
                                    <a href="{{ route('dealers.show',[$dealer->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('dealer_edit')
                                    <a href="{{ route('dealers.edit',[$dealer->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('dealer_delete')
                                    {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['dealers.destroy', $dealer->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('dealer_delete')
            window.route_mass_crud_entries_destroy = '{{ route('dealers.mass_destroy') }}';
        @endcan

    </script>
@endsection