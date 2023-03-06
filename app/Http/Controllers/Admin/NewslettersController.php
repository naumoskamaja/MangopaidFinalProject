<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Library\ConfigurationHelper;
use App\Library\ImageHelper;
use App\Models\Newsletter;
use App\Models\NewsletterMedia;
use App\Models\PageConfig;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewslettersController extends Controller
{
    public function list()
    {
        $search = request('search');
        $newsletters = Newsletter::sortable()->paginate(15);
        $page = 'newsletters';

        if ($search != "") {
            $newsletters = Newsletter::where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('id', 'like', '%' . $search . '%');
            })
                ->sortable()->paginate(15);
            $newsletters->appends(['search' => $search]);
        }
        return view('admin.src.newsletters.list', compact('newsletters', 'search', 'page'));
    }

    public function show($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $page = 'preview-newsletter';
        return view('admin.src.newsletters.show', compact('newsletter', 'page'));
    }

    public function edit($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $products = Product::where('status', 1)->with('images')->get();
        $page = 'edit-newsletter';

        return view('admin.src.newsletters.add', compact('newsletter', 'products', 'page'));
    }

    public function send_page($id)
    {
        $search = request('search');
        $newsletter = Newsletter::findOrFail($id);
        $subscribers_list = Subscriber::all()->pluck('email');
        $page = 'send-newsletter';

        return view('admin.src.newsletters.send-newsletter', compact('newsletter', 'subscribers_list', 'search', 'page'));
    }


    public function send($id)
    {
        $selected_subscribers = \request('selectedSubscribers');
        $newsletter = Newsletter::findOrFail($id);
        $conf = ConfigurationHelper::getConfig();
        $pageUrl = url()->to("/");

        $myData = [
            'newsletter' => $newsletter,
            'content' => $newsletter->content,
            'conf' => $conf,
            'pageUrl' => $pageUrl

        ];

        if ($selected_subscribers != null && count($selected_subscribers) > 0) {
            foreach ($selected_subscribers as $subscriber)
                Mail::to($subscriber)->send(new \App\Mail\Newsletter($myData));
            return redirect('/admin/newsletter/send/' . $newsletter->id)->with('success', 'Message sent successfully!');
        } else
            return redirect('/admin/newsletter/send/' . $newsletter->id)->with('error', 'Please select subscribers and try again!');

    }

    public function add()
    {
        $page = 'add-newsletter';
        return view('admin.src.newsletters.add', compact('page'));
    }


    public function store()
    {
        request()->validate([
            'title' => ['required'],
            'content' => ['required']
        ]);

        if (request('newsletter_id') == 0)
            $newsletter = new Newsletter();
        else
            $newsletter = Newsletter::find(request('newsletter_id'));

        $newsletter->title = request('title');
        $newsletter->content = request('content');
        $newsletter->save();
        return redirect('/admin/newsletter/show/' . $newsletter->id)->with('success', 'Action performed successfully!');
    }

    public function upload_media($id)
    {

        $newsletter = Newsletter::findOrFail($id);

        if (request()->hasFile("file") && request()->file("file")->isValid()) {
            $media = new NewsletterMedia();
            $url = ImageHelper::uploadFile(request('file'), base_path('/public/assets/uploaded_gallery/newsletters/' . $id));
            if ($url[2] === true)
                $file = $url[0];
            else
                $file = $url[0];


            $media->image = url('assets/uploaded_gallery/newsletters/' . $id . '/' . $file);
            $media->newsletter_id = $id;
            $media->save();
            return $this->returnData(200, __('website.media-is-uploaded-successfully'), $media);
        }
        return $this->returnData(500, 'Media failed to upload!', []);
    }

    public function upl($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        try {


            if (request()->hasFile("file") && request()->file("file")->isValid()) {
                DB::beginTransaction();
                $media = new NewsletterMedia();
                $url = ImageHelper::uploadFile(request('file'), base_path('/public/assets/uploaded_gallery/newsletters/' . $id));
                $media->image = 'assets/uploaded_gallery/newsletters/' . $id . '/' . $url[0];
                $media->newsletter_id = $id;
                $media->meta_tag = $url[0];
                $media->save();
                DB::commit();
                return $this->returnData(200, __('website.media-is-uploaded-successfully'), $media);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->returnData(500, 'Media failed to upload!', []);
        }
    }


    public function delete_media($id, $img_id)
    {
        $media = NewsletterMedia::where('id', $img_id)->where('newsletter_id', $id)->first();
        if ($media == null)
            return $this->returnData(404, 'Image not found.', null);

        $fileThumb = $media->thumbnail;
        $filename = explode('/assets/newsletters/' . $media->newsletter_id . '/', $media->image);
        if (isset($filename[1])) {
            $filename = $filename[1];
            if (file_exists(base_path('public/assets/newsletters/' . $media->newsletter_id . '/' . $fileThumb))) {
                unlink(base_path('public/assets/newsletters/' . $media->newsletter_id . '/' . $fileThumb));
            }
            if (file_exists(base_path('public/assets/newsletters/' . $media->newsletter_id . '/' . $filename))) {
                unlink(base_path('public/assets/newsletters/' . $media->newsletter_id . '/' . $filename));
            }
        }
        $media->delete();
        $medias = NewsletterMedia::where('newsletter_id', $id)->get();
        return $this->returnData(200, 'Media deleted successfully!', $medias);
    }

    public function send_to_all($id)
    {
        $newsletter = Newsletter::findOrFail($id);
        $subscribers_list = Subscriber::all()->pluck('email');
        $conf = ConfigurationHelper::getConfig();
        $myData = [
            'newsletter' => $newsletter,
            'content' => $newsletter->content,
            'conf' => $conf
        ];
        foreach ($subscribers_list as $email) {
            Mail::to($email)->send(new \App\Mail\Newsletter($myData));
        }

        return redirect()->to('/admin/newsletter/send/' . $newsletter->id);
    }

}
