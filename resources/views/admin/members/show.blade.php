@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.member.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.id') }}
                        </th>
                        <td>
                            {{ $member->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\Member::CATEGORY_SELECT[$member->category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.type') }}
                        </th>
                        <td>
                            {{ App\Models\Member::TYPE_SELECT[$member->type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.name') }}
                        </th>
                        <td>
                            {{ $member->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.email') }}
                        </th>
                        <td>
                            {{ $member->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.phone') }}
                        </th>
                        <td>
                            {{ $member->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.address') }}
                        </th>
                        <td>
                            {{ $member->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.district') }}
                        </th>
                        <td>
                            {{ $member->district->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.block') }}
                        </th>
                        <td>
                            {{ $member->block->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.panchayat') }}
                        </th>
                        <td>
                            {{ $member->panchayat->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.camp') }}
                        </th>
                        <td>
                            {{ $member->camp }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.reference_number') }}
                        </th>
                        <td>
                            {{ $member->reference_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.payment_method') }}
                        </th>
                        <td>
                            {{ App\Models\Member::PAYMENT_METHOD_SELECT[$member->payment_method] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.payment_date') }}
                        </th>
                        <td>
                            {{ $member->payment_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.amount') }}
                        </th>
                        <td>
                            {{ $member->amount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.member.fields.remarks') }}
                        </th>
                        <td>
                            {{ $member->remarks }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.members.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection