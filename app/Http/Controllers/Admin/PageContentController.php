<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ImageHelper;
use App\Library\LibHelper;
use App\Models\PageContent;

class PageContentController extends Controller
{
    public function list()
    {
        $search = request('search');
        $sections = PageContent::sortable()->paginate(15);
        $page = 'pages-content';

        if ($search != "") {
            $sections = PageContent::where(function ($query) use ($search) {
                $query->where('slug', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $sections->appends(['search' => $search]);
        }
        return view('admin.src.pages.list', compact('sections', 'search', 'page'));
    }

    public function add()
    {
        $page = 'add-paragraph';
        return view('admin.src.pages.add', compact('page'));
    }

    public function edit($id)
    {
        $section = PageContent::findOrFail($id);
        $page = 'edit-paragraph';
        return view('admin.src.pages.add', compact('section', 'page'));
    }

    public function store()
    {
        request()->validate([
            'slug' => ['required']
        ]);

        if (\request('page_id') == 0) {
            $section = new PageContent();
        } else {
            $section = PageContent::findOrFail(\request('page_id'));
        }
        $languages = LibHelper::languages;
        $json_title = [];
        $json_content = [];
        foreach ($languages as $lang) {
            $json_title[$lang] = \request('title_' . $lang);
            $json_content[$lang] = \request('content_' . $lang);
        }
        $section->title = $json_title;
        $section->slug = request('slug');
        $section->content = $json_content;

        if (request()->hasFile("icon") && request()->file("icon")->isValid()) {
            $url = ImageHelper::uploadFile(request('icon'), base_path('/public/assets/uploaded_gallery/pages'));
            $file = $url[0];
            $section->icon = '/assets/uploaded_gallery/pages/' . $file;
        }

        $section->save();
        return redirect('/admin/pages')->with('success', 'Action performed successfully!');
    }

    public function change_status($id, $status)
    {
        $section = PageContent::findOrFail($id);
        $redirect_page = 'pages';

        return LibHelper::change_status($section, $status, $redirect_page);
    }

}
