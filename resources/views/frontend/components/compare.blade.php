@inject('AppHelper', 'App\Helpers\AppHelper')

<div class="col-md-8 products-right">
  <h5>So sánh sản phẩm(0)</h5>
  <div class="sort-grid">
    <div class="sorting">
      <h6>Sắp xếp theo</h6>
      <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
        <option value="null">Mặc định</option>
        <option value="null">Tên sản phẩm(A - Z)</option>
        <option value="null">Tên sản phẩm(Z - A)</option>
        <option value="null">Giá(Cao - Thấp)</option>
        <option value="null">Giá(Thấp - Cao)</option>
        <option value="null">Mẫu(A - Z)</option>
        <option value="null">Mẫu(Z - A)</option>
      </select>
      <div class="clearfix"></div>
    </div>

    <div class="sorting">
      <h6>Hiển thị</h6>
      <select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="35">35</option>
      </select>
      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="men-wear-top">
    <div  id="top" class="callbacks_container">
      <div id="carousel-id" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-id" data-slide-to="0" class=""></li>
          <li data-target="#carousel-id" data-slide-to="1" class=""></li>
          <li data-target="#carousel-id" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
          <div class="item">
            <img src="http://via.placeholder.com/750x365">
          </div>

          <div class="item">
            <img src="http://via.placeholder.com/750x365">
          </div>

          <div class="item active">
            <img src="http://via.placeholder.com/750x365">
          </div>

        </div>
        <a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
        <a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
  <div class="men-wear-bottom">
    <div class="col-sm-4 men-wear-left">
      <img class="img-responsive" src="images/men3.jpg" alt=" " />
    </div>
    <div class="col-sm-8 men-wear-right">
      <h4>Exclusive Men's Collections</h4>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem 
        accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae 
        ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt
        explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut
        odit aut fugit. 
      </p>
    </div>
    <div class="clearfix"></div>
  </div>

  @for ($i=0, $count=count($productThree); $i<$count; $i++)
    @if ($i < 3)
    <div class="col-md-4 product-men no-pad-men">
      <div class="men-pro-item simpleCart_shelfItem">
        <div class="men-thumb-item">
          <img src="{{ !empty($productThree[$i]->product_image) ? $productThree[$i]->product_image : 'http://via.placeholder.com/255x291' }}" alt="{{ $productThree[$i]->product_name }}" class="pro-image-front" width="255px" height="291px">
            <img src="{{ !empty($productThree[$i]->product_image) ? $productThree[$i]->product_image : 'http://via.placeholder.com/255x291' }}" class="pro-image-back" width="255px" height="291px">
          <div class="men-cart-pro">
            <div class="inner-men-cart-pro">
              <a href="single.html" class="link-product-add-cart">Chi tiết</a>
            </div>
          </div>
          <span class="product-new-top">New</span>
        </div>
        <div class="item-info-product ">
          <h4><a href="single.html">{{ $productThree[$i]->product_name }}</a></h4>
            <div class="info-product-price">
              @if (!empty($AppHelper::number($productThree[$i]->product_pricesale)))
              <span class="item_price">{{ $productThree[$i]->product_pricesale }}</span>
              <del>{{ $productThree[$i]->product_price }}</del>
              @else
              <span class="item_price">{{ $productThree[$i]->product_price }}</span>
              @endif
            </div>
            <a href="javascript:void(0);" class="btn btn-warning btn-radius" @click="addToCart({{ json_encode($productThree[$i]) }})">Thêm vào giỏ</a>  									
        </div>
      </div>
    </div>
    @else
      @break
    @endif
  @endfor

  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>