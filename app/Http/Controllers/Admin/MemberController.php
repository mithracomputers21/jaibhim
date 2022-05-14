<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMemberRequest;
use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Models\Block;
use App\Models\District;
use App\Models\Member;
use App\Models\Panchayat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('member_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Member::with(['district', 'block', 'panchayat'])->select(sprintf('%s.*', (new Member())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'member_show';
                $editGate = 'member_edit';
                $deleteGate = 'member_delete';
                $crudRoutePart = 'members';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('category', function ($row) {
                return $row->category ? Member::CATEGORY_SELECT[$row->category] : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? Member::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('email', function ($row) {
                return $row->email ? $row->email : '';
            });
            $table->editColumn('phone', function ($row) {
                return $row->phone ? $row->phone : '';
            });
            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->addColumn('district_name', function ($row) {
                return $row->district ? $row->district->name : '';
            });

            $table->addColumn('block_name', function ($row) {
                return $row->block ? $row->block->name : '';
            });

            $table->addColumn('panchayat_name', function ($row) {
                return $row->panchayat ? $row->panchayat->name : '';
            });

            $table->editColumn('camp', function ($row) {
                return $row->camp ? $row->camp : '';
            });
            $table->editColumn('reference_number', function ($row) {
                return $row->reference_number ? $row->reference_number : '';
            });
            $table->editColumn('payment_method', function ($row) {
                return $row->payment_method ? Member::PAYMENT_METHOD_SELECT[$row->payment_method] : '';
            });

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : '';
            });
            $table->editColumn('remarks', function ($row) {
                return $row->remarks ? $row->remarks : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'district', 'block', 'panchayat']);

            return $table->make(true);
        }

        $districts  = District::get();
        $blocks     = Block::get();
        $panchayats = Panchayat::get();

        return view('admin.members.index', compact('districts', 'blocks', 'panchayats'));
    }

    public function create()
    {
        abort_if(Gate::denies('member_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blocks = Block::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayats = Panchayat::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.members.create', compact('blocks', 'districts', 'panchayats'));
    }

    public function store(StoreMemberRequest $request)
    {
        $member = Member::create($request->all());

        return redirect()->route('admin.members.index');
    }

    public function edit(Member $member)
    {
        abort_if(Gate::denies('member_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $districts = District::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $blocks = Block::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayats = Panchayat::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $member->load('district', 'block', 'panchayat');

        return view('admin.members.edit', compact('blocks', 'districts', 'member', 'panchayats'));
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        $member->update($request->all());

        return redirect()->route('admin.members.index');
    }

    public function show(Member $member)
    {
        abort_if(Gate::denies('member_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->load('district', 'block', 'panchayat');

        return view('admin.members.show', compact('member'));
    }

    public function destroy(Member $member)
    {
        abort_if(Gate::denies('member_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $member->delete();

        return back();
    }

    public function massDestroy(MassDestroyMemberRequest $request)
    {
        Member::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
