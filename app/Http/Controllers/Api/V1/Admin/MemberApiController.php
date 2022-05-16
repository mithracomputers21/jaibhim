<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Http\Resources\Admin\MemberResource;
use App\Models\Member;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MemberApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberResource(Member::with(['district', 'block', 'panchayat'])->get());
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        foreach ($request->input('receipt_photo', []) as $file) {
            $member->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('receipt_photo');
        }

        return (new MemberResource($member))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MemberResource($member->load(['district', 'block', 'panchayat']));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        if (count($member->receipt_photo) > 0) {
            foreach ($member->receipt_photo as $media) {
                if (!in_array($media->file_name, $request->input('receipt_photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $member->receipt_photo->pluck('file_name')->toArray();
        foreach ($request->input('receipt_photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $member->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('receipt_photo');
            }
        }

        return (new MemberResource($member))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
