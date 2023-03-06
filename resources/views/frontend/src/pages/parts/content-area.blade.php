<section class="divider-area divider-about-area-style2">
    <div class="container">
      <div class="row">
          @foreach($paragraphs as $paragraph)
                <div class="col-12">
                  <div class="divider-about-content">
                    <div class="divider-content">
                        <h2 class="title">
                            {!!   \App\Library\LibHelper::echoJson($paragraph->title,__('website.lang')) !!}
                        </h2>
                        <p>
                            {!! html_entity_decode(  \App\Library\LibHelper::echoJson($paragraph->content,__('website.lang'))) !!}
                        </p>
                    </div>
                  </div>
                </div>
          @endforeach
      </div>
    </div>
  </section>
