@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.panchayat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.panchayats.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.panchayat.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panchayat.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="block_id">{{ trans('cruds.panchayat.fields.block') }}</label>
                <select class="form-control select2 {{ $errors->has('block') ? 'is-invalid' : '' }}" name="block_id" id="block_id" required>
                    @foreach($blocks as $id => $entry)
                        <option value="{{ $id }}" {{ old('block_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('block'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.panchayat.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection