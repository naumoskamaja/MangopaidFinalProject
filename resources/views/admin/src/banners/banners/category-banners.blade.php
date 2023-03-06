<h5>Categories Banners</h5>
<form class="row" action="/admin/banners/add_category_banners" method="post" enctype="multipart/form-data">
    @csrf
    <?php $four_banner_categories = \App\Library\BannersHelper::getBannersAdmin()['four_banner_categories'] ?>
    <?php $category_banners = \App\Library\BannersHelper::getBannersAdmin()['category_banners'] ?>
    @if(isset($category_banners) && $category_banners!=null && count($category_banners)>0)
        <div class="row">
            @foreach($category_banners as $key=>$category_banner)
                <div class="col-lg-3 col-md-6">
                    <div class="card mb-2">
                        @if(isset($category_banner->category->image) && $category_banner->category->image!=null)
                            <img src="{{asset($category_banner->category->image)}}"
                                 style="height: 250px; object-fit: contain">
                        @else
                            <img src="/assets/noimg.png" style="height: 250px; object-fit: cover">
                        @endif
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <select class="form-control" name="category[{{$key}}]">
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}"
                                            @if($category_banner->category->id==$cat->id) selected @endif>{{$cat->title['al']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <label>link</label>
                            <input type="text" class="form-control" name="link_{{$key}}"
                                   value="{!! $category_banner->link !!}">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        @if(count($four_banner_categories)==0)
            <div class="col-lg-12 align-center ptb-30">
                There are no categories yet.
            </div>
        @endif
        @foreach($four_banner_categories as $key=>$category_banner)
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    @if(isset($category_banner->image) && $category_banner->image!=null)
                        <img src="{{asset($category_banner->image)}}" style="height: 250px; object-fit: contain">
                    @else
                        <img src="/assets/noimg.png" style="height: 250px; object-fit: cover">
                    @endif
                </div>
                <select class="form-control" name="category[{{$key}}]">
                    <option value="-"></option>
                    @foreach($categories as $cat)
                        <option value="{{$cat->id}}"
                                @if($category_banner->id==$cat->id) selected @endif>{{$cat->title['al']}}</option>
                    @endforeach
                </select>
                link
                <input type="text" class="form-control" name="link_{{$key}}" value="{!! $category_banner->link !!}">
            </div>
            @endforeach
            @endif
            </div>
            @if(count($four_banner_categories)>0)
                <div class="row">
                    <div class="col-lg-12 align-right ptb-30">
                        <button class="btn btn-info" type="submit">Update</button>
                    </div>
                </div>
            @endif
</form>
<hr>
