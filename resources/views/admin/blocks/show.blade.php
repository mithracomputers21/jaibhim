@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.block.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.id') }}
                        </th>
                        <td>
                            {{ $block->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.name') }}
                        </th>
                        <td>
                            {{ $block->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.block.fields.district') }}
                        </th>
                        <td>
                            {{ $block->district->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blocks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection