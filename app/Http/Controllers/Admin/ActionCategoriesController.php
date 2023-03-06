<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\LibHelper;
use App\Models\ActionCategory;
use App\Models\Category;

class ActionCategoriesController extends Controller
{
    public function list()
    {
        $page = 'action-categories';
        $search = request('search');
        $actions = ActionCategory::sortable()->paginate(15);

        if ($search != "") {
            $actions = ActionCategory::where(function ($query) use ($search) {
                $query->where('category_id', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $actions->appends(['search' => $search]);
        }
        return view('admin.src.action-categories.list', compact('actions', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-action-category';
        $categories = Category::whereStatus(1)->get();
        return view('admin.src.action-categories.add', compact('categories', 'page'));
    }

    public function store()
    {
        request()->validate([
            'discount' => ['required'],
            'valid_till' => ['required'],
        ]);
        if (\request('action_id') == 0)
            $action = new ActionCategory();
        else
            $action = ActionCategory::findOrFail(\request('action_id'));

        $action->category_id = \request('category_id');
        $action->discount = \request('discount');
        $action->valid_till = \request('valid_till');
        $action->save();

        return redirect('/admin/action_categories')->with('success', 'Action performed successfully!');
    }

    public function edit($id)
    {
        $categories = Category::whereStatus(1)->get();
        $action = ActionCategory::findOrFail($id);
        $page = 'edit-action-category';
        return view('admin.src.action-categories.add', compact('action', 'categories', 'page'));
    }

    public function change_status($id, $status)
    {
        $action = ActionCategory::findOrFail($id);
        $redirect_page = 'action_categories';
        return LibHelper::change_status($action, $status, $redirect_page);
    }
}
