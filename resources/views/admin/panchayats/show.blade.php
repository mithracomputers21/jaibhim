@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.panchayat.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.panchayats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.panchayat.fields.id') }}
                        </th>
                        <td>
                            {{ $panchayat->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panchayat.fields.name') }}
                        </th>
                        <td>
                            {{ $panchayat->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.panchayat.fields.block') }}
                        </th>
                        <td>
                            {{ $panchayat->block->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.panchayats.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection