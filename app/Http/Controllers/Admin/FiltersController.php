<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\Filter;
use Illuminate\Http\Request;

class FiltersController extends Controller
{
    public function list()
    {
        $search = request('search');
        $filters = Filter::with('parent')->sortable()->paginate(15);
        $page = 'filters';

        if ($search != "") {
            $filters = Filter::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->with('parent')->sortable()->paginate(15);
            $filters->appends(['search' => $search]);
        }
        return view('admin.src.filters.list', compact('filters', 'search', 'page'));
    }

    public function add()
    {
        $main_filters = Filter::where('parent_id', 0)->where('status', 1)->get();
        $page = 'add-filter';
        return view('admin.src.filters.add', compact('main_filters', 'page'));
    }

    public function edit($id)
    {
        $main_filters = Filter::where('parent_id', 0)->where('status', 1)->get();
        $filter = Filter::findOrFail($id);
        $page = 'edit-filter';
        return view('admin.src.filters.add', compact('filter', 'main_filters', 'page'));
    }

    public function store()
    {
        if (\request('filter_id') == 0)
            $filter = new Filter();
        else
            $filter = Filter::findOrFail(\request('filter_id'));


        $filter->title = \request('title');
        $filter->status = 1;
        $filter->parent_id = \request('parent_id');

//        check if there is a filters with the same title and parent as current filter
        if (!LibHelper::check_filter_name((int)request('filter_id'), request('title'), (int)request('parent_id')))
            return redirect()->back()->with('error', __('website.this-filter-name-has-already-been-taken'));

        $filter->save();

        return redirect('/admin/filters')->with('success', __('website.action-performed-successfully'));
    }

    public function change_status($id, $status)
    {
        $filter = Filter::findOrFail($id);
        $redirect_page = 'filters';
        return LibHelper::change_status($filter, $status, $redirect_page);
    }
}
