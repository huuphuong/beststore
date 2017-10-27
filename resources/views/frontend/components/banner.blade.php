@inject('slideshow', 'App\Models\Slideshow')
@php
    $slideshows = $slideshow->getSlideBanner();
@endphp
<!-- banner -->
<div class="banner-grid">
  <div id="visual">
    <div class="slide-visual">
      <div class="row">

        <div class="col-sm-12">
          <div id="carousel-id" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              @foreach ($slideshows AS $k => $slideshow)
              <li data-target="#carousel-id" data-slide-to="{{ $k }}" class="{{ $k == 0 ? 'active' : null }}"></li>
              @endforeach
            </ol>

            <div class="carousel-inner">
              @foreach ($slideshows AS $index => $slide)
              <div class="item {{ $index == 0 ? 'active' : null }}">
                <img src="{{ $slide->image }}" class="img-responsive" style="min-width: 100%;" />
                <div class="container">
                  <div class="carousel-caption">
                    <p><a class="btn btn-callaction" href="{{ $slide->url }}" role="button">{{ $slide->text_link }}</a></p>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
            <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
          </div>
        </div><!-- /.col-sm-8 -->


      </div><!-- /.row -->
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- //banner -->