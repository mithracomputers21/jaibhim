<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPanchayatRequest;
use App\Http\Requests\StorePanchayatRequest;
use App\Http\Requests\UpdatePanchayatRequest;
use App\Models\Block;
use App\Models\Panchayat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PanchayatController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('panchayat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Panchayat::with(['block'])->select(sprintf('%s.*', (new Panchayat())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'panchayat_show';
                $editGate = 'panchayat_edit';
                $deleteGate = 'panchayat_delete';
                $crudRoutePart = 'panchayats';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->addColumn('block_name', function ($row) {
                return $row->block ? $row->block->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'block']);

            return $table->make(true);
        }

        return view('admin.panchayats.index');
    }

    public function create()
    {
        abort_if(Gate::denies('panchayat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blocks = Block::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.panchayats.create', compact('blocks'));
    }

    public function store(StorePanchayatRequest $request)
    {
        $panchayat = Panchayat::create($request->all());

        return redirect()->route('admin.panchayats.index');
    }

    public function edit(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $blocks = Block::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panchayat->load('block');

        return view('admin.panchayats.edit', compact('blocks', 'panchayat'));
    }

    public function update(UpdatePanchayatRequest $request, Panchayat $panchayat)
    {
        $panchayat->update($request->all());

        return redirect()->route('admin.panchayats.index');
    }

    public function show(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panchayat->load('block');

        return view('admin.panchayats.show', compact('panchayat'));
    }

    public function destroy(Panchayat $panchayat)
    {
        abort_if(Gate::denies('panchayat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panchayat->delete();

        return back();
    }

    public function massDestroy(MassDestroyPanchayatRequest $request)
    {
        Panchayat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
