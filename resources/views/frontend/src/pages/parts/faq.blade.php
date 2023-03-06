<section class="faq-area">
    <div class="container">
        <div class="row row-gutter-90">
            <div class="col-md-12">
                <div class="section-title">
                    <h2 class="title">FAQs</h2>
                </div>
                <div class="accordian-content">
                    <div class="accordion" id="accordionExample">
                        @foreach($paragraphs as $p)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{$p->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{$p->id}}" aria-expanded="true"
                                            aria-controls="collapse{{$p->id}}e">
                                        {{ \App\Library\ConfigurationHelper::echoJson($p->title, __('website.lang'))}}
                                    </button>
                                </h2>
                                <div id="collapse{{$p->id}}" class="accordion-collapse collapse show"
                                     aria-labelledby="heading{{$p->id}}"
                                     data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            {!! html_entity_decode( \App\Library\ConfigurationHelper::echoJson($p->content, __('website.lang'))) !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
