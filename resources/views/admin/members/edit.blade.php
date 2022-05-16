@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.member.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.members.update", [$member->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required">{{ trans('cruds.member.fields.category') }}</label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category" required>
                    <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Member::CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $member->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.member.fields.type') }}</label>
                <select class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type" id="type" required>
                    <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Member::TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('type', $member->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.member.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $member->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.member.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $member->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="phone">{{ trans('cruds.member.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" required>
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.member.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $member->address) }}</textarea>
                @if($errors->has('address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="district_id">{{ trans('cruds.member.fields.district') }}</label>
                <select class="form-control select2 {{ $errors->has('district') ? 'is-invalid' : '' }}" name="district_id" id="district_id">
                    @foreach($districts as $id => $entry)
                        <option value="{{ $id }}" {{ (old('district_id') ? old('district_id') : $member->district->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('district'))
                    <div class="invalid-feedback">
                        {{ $errors->first('district') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.district_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="block_id">{{ trans('cruds.member.fields.block') }}</label>
                <select class="form-control select2 {{ $errors->has('block') ? 'is-invalid' : '' }}" name="block_id" id="block_id">
                    @foreach($blocks as $id => $entry)
                        <option value="{{ $id }}" {{ (old('block_id') ? old('block_id') : $member->block->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('block'))
                    <div class="invalid-feedback">
                        {{ $errors->first('block') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.block_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="panchayat_id">{{ trans('cruds.member.fields.panchayat') }}</label>
                <select class="form-control select2 {{ $errors->has('panchayat') ? 'is-invalid' : '' }}" name="panchayat_id" id="panchayat_id">
                    @foreach($panchayats as $id => $entry)
                        <option value="{{ $id }}" {{ (old('panchayat_id') ? old('panchayat_id') : $member->panchayat->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('panchayat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('panchayat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.panchayat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="camp">{{ trans('cruds.member.fields.camp') }}</label>
                <input class="form-control {{ $errors->has('camp') ? 'is-invalid' : '' }}" type="text" name="camp" id="camp" value="{{ old('camp', $member->camp) }}">
                @if($errors->has('camp'))
                    <div class="invalid-feedback">
                        {{ $errors->first('camp') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.camp_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reference_number">{{ trans('cruds.member.fields.reference_number') }}</label>
                <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', $member->reference_number) }}">
                @if($errors->has('reference_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.reference_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.member.fields.payment_method') }}</label>
                <select class="form-control {{ $errors->has('payment_method') ? 'is-invalid' : '' }}" name="payment_method" id="payment_method">
                    <option value disabled {{ old('payment_method', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Member::PAYMENT_METHOD_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_method', $member->payment_method) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_method'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_method') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.payment_method_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="payment_date">{{ trans('cruds.member.fields.payment_date') }}</label>
                <input class="form-control date {{ $errors->has('payment_date') ? 'is-invalid' : '' }}" type="text" name="payment_date" id="payment_date" value="{{ old('payment_date', $member->payment_date) }}">
                @if($errors->has('payment_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('payment_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.payment_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.member.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="text" name="amount" id="amount" value="{{ old('amount', $member->amount) }}" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.amount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="receipt_photo">{{ trans('cruds.member.fields.receipt_photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('receipt_photo') ? 'is-invalid' : '' }}" id="receipt_photo-dropzone">
                </div>
                @if($errors->has('receipt_photo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_photo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.receipt_photo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="remarks">{{ trans('cruds.member.fields.remarks') }}</label>
                <input class="form-control {{ $errors->has('remarks') ? 'is-invalid' : '' }}" type="text" name="remarks" id="remarks" value="{{ old('remarks', $member->remarks) }}">
                @if($errors->has('remarks'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarks') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.member.fields.remarks_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedReceiptPhotoMap = {}
Dropzone.options.receiptPhotoDropzone = {
    url: '{{ route('admin.members.storeMedia') }}',
    maxFilesize: 5, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 5
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="receipt_photo[]" value="' + response.name + '">')
      uploadedReceiptPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedReceiptPhotoMap[file.name]
      }
      $('form').find('input[name="receipt_photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($member) && $member->receipt_photo)
          var files =
            {!! json_encode($member->receipt_photo) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="receipt_photo[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection