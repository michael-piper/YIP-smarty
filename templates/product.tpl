{include file="addons/header.tpl"}
<style>
.section-bg {
    background-color: #fff1e0;
}
section {
    padding: 60px 0;
}
.row-sm .col-md-6 {
    padding-left: 5px;
    padding-right: 5px;
}

/*===pic-Zoom===*/
._boxzoom .zoom-thumb {
    width: 90px;
    display: inline-block;
    vertical-align: top;
    margin-top: 0px;
}
._boxzoom .zoom-thumb ul.piclist {
    padding-left: 0px;
    top: 0px;
}
._boxzoom ._product-images {
    width: 80%;
    display: inline-block;
}
._boxzoom ._product-images .picZoomer {
    width: 100%;
}
._boxzoom ._product-images .picZoomer .picZoomer-pic-wp img {
    left: 0px;
}
._boxzoom ._product-images .picZoomer img.my_img {
    width: 100%;
}
.piclist li img {
    height:100px;
    object-fit:cover;
}

/*======products-details=====*/
._product-detail-content {
    background: #fff;
    padding: 15px;
    border: 1px solid lightgray;
}
._product-detail-content p._p-name {
    color: black;
    font-size: 20px;
    border-bottom: 1px solid lightgray;
    padding-bottom: 12px;
}
.p-list span {
    margin-right: 15px;
}
.p-list span.price {
    font-size: 25px;
    color: #318234;
}
._p-qty > span {
    color: black;
    margin-right: 15px;
    font-weight: 500;
}
._p-qty .value-button {
    display: inline-flex;
    border: 0px solid #ddd;
    margin: 0px;
    width: 30px;
    height: 35px;
    justify-content: center;
    align-items: center;
    background: #fd7f34;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    color: #fff;
}

._p-qty .value-button {
    border: 0px solid #fe0000;
    height: 35px;
    font-size: 20px;
    font-weight: bold;
}
._p-qty input#number {
    text-align: center;
    border: none;
    border-top: 1px solid #fe0000;
    border-bottom: 1px solid #fe0000;
    margin: 0px;
    width: 50px;
    height: 35px;
    font-size: 14px;
    box-sizing: border-box;
}
._p-add-cart {
    margin-left: 0px;
    margin-bottom: 15px;
}
.p-list {
    margin-bottom: 10px;
}
._p-features > span {
    display: block;
    font-size: 16px;
    color: #000;
    font-weight: 500;
}
._p-add-cart .buy-btn {
    background-color: #fd7f34;
    color: #fff;
}
._p-add-cart .btn {
    text-transform: capitalize;
    padding: 6px 20px;
    /* width: 200px; */
    border-radius: 52px;
}
._p-add-cart .btn {
    margin: 0px 8px;
}

/*=========Recent-post==========*/
.title_bx h3.title {
    font-size: 22px;
    text-transform: capitalize;
    position: relative;
    color: #fd7f34;
    font-weight: 700;
    line-height: 1.2em;
}
.title_bx h3.title:before {
    content: "";
    height: 2px;
    width: 20%;
    position: absolute;
    left: 0px;
    z-index: 1;
    top: 40px;
    background-color: #fd7f34;
}
.title_bx h3.title:after {
    content: "";
    height: 2px;
    width: 100%;
    position: absolute;
    left: 0px;
    top: 40px;
    background-color: #ffc107;
}
.common_wd .owl-nav .owl-prev, .common_wd .owl-nav .owl-next {
    background-color: #fd7f34 !important;
    display: block;
    height: 30px;
    width: 30px;
    text-align: center;
    border-radius: 0px !important;
}
.owl-nav .owl-next {
    right:-10px;
}
.owl-nav .owl-prev, .owl-nav .owl-next {
    top:50%;
    position: absolute;
}
.common_wd .owl-nav .owl-prev i, .common_wd .owl-nav .owl-next i {
    color: #fff;
    font-size: 14px !important;
    position: relative;
    top: -1px;
}
.common_wd .owl-nav {
    position: absolute;
    top: -21%;
    right: 4px;
    width: 65px;
}
.owl-nav .owl-prev i, .owl-nav .owl-next i {
    left: 0px;
}
._p-qty .decrease_ {
    position: relative;
    right: -5px;
    top: 3px;
}

._p-qty .increase_ {
    position: relative;
    top: 3px;
    left: -5px;
}
/*========box========*/
.sq_box {
    padding-bottom: 5px;
    border-bottom: solid 2px #fd7f34;
    background-color: #fff;
    text-align: center;
    padding: 15px 10px;
    margin-bottom: 20px;
    border-radius: 4px;
}
.item .sq_box span.wishlist {
    right: 5px !important;
}
.sq_box span.wishlist {
    position: absolute;
    top: 10px;
    right: 20px;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box span.wishlist i {
    color: #adb5bd;
    font-size: 20px;
}
.sq_box h4 {
    font-size: 18px;
    text-align: center;
    font-weight: 500;
    color: #343a40;
    margin-top: 10px;
    margin-bottom: 10px !important;
}
.sq_box .price-box {
    margin-bottom: 15px !important;
}
.sq_box .btn {
    border-radius: 50px;
    padding: 5px 13px;
    font-size: 15px;
    color: #fff;
    background-color: #fd7f34;
    font-weight: 600;
}
.sq_box .price-box span.price {
    text-decoration: line-through;
    color: #6c757d;
}
.sq_box span {
    font-size: 14px;
    font-weight: 600;
    margin: 0px 10px;
}
.sq_box .price-box span.offer-price {
    color:#28a745;
}
.sq_box img {
    object-fit: cover;
    height: 150px !important;
    margin-top: 20px;
}
.sq_box span.wishlist i:hover {
    color: #fd7f34;
}
</style>
<script>
  window.console = window.console || function(t) {};
</script>
  <section id="services" class="services section-bg">
  {if $product}
   <div class="container-fluid">
      <div class="row row-sm">
         <div class="col-md-6 _boxzoom">
            <div class="zoom-thumb">
               <ul class="piclist">
                  <li><img src="{$product.thumbnailUrl}" alt=""></li>
               </ul>
            </div>
            <div class="_product-images">
               <div class="picZoomer">
                  <img class="my_img" src="{$product.thumbnailUrl}" alt="">
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="_product-detail-content">
               <p class="_p-name"> {$product.name}</p>
               <div class="_p-price-box">
                  <div class="p-list">
                     <span> M.R.P. : <i class="fa fa-ngn"></i> <del> {$product.price-10}  </del>   </span>
                     <span class="price"> NGN. {$product.price} </span>
                  </div>
                   <form action="/cart/product/{$product.productId}" method="get" accept-charset="utf-8">
                  <div class="_p-add-cart">
                     <div class="_p-qty">
                        <span>Add Quantity</span>
                        <div class="value-button decrease_" id="" value="Decrease Value">-</div>
                        <input type="number" name="quantity" id="number" value="1" />
                        <div class="value-button increase_" id="" value="Increase Value">+</div>
                     </div>
                  </div>
                  <div class="_p-features">
                     <span> Description About this product:- </span>
                     Solid color polyester/linen full blackout thick sunscreen floor curtain
                     Type: General Pleat
                     Applicable Window Type: Flat Window
                     Format: Rope
                     Opening and Closing Method: Left and Right Biparting Open
                     Processing Accessories Cost: Included
                     Installation Type: Built-in
                     Function: High Shading(70%-90%)
                     Material: Polyester / Cotton
                     Style: Classic
                     Pattern: Embroidered
                     Location: Window
                     Technics: Woven
                     Use: Home, Hotel, Hospital, Cafe, Office
                     Feature: Blackout, Insulated, Flame Retardant
                     Place of Origin: India
                     Name: Curtain
                     Usage: Window Decoration
                     Keywords: Ready Made Blackout Curtain                        
                  </div>
                 
                     <ul class="spe_ul"></ul>
                     <div class="_p-qty-and-cart">
                        <div class="_p-add-cart">
                           <button class="btn-theme btn buy-btn" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Buy Now
                           </button>
                           <button class="btn-theme btn btn-success" tabindex="0">
                           <i class="fa fa-shopping-cart"></i> Add to Cart
                           </button>
                           <input type="hidden" name="pid" value="18" />
                           <input type="hidden" name="price" value="850" />
                           <input type="hidden" name="url" value="" />  
                           <input type="hidden" name="action" value="add" />    
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   {else}
Product not found
{/if}
</section>

<section class="sec bg-light">
<style>
.product-card {
  background-color: #fdfefe;
  max-width: 550px;
  min-height: 400px;
  margin: 0 auto;
  margin-top: 50px;
  margin-bottom: 150px;
  box-shadow: 8px 12px 30px #b3b3b3;
  color: #919495;
  font-weight: normal;
  text-align: left;
  font-size: 18px;
  position: relative;
}

.product-details {
  width: 53%;
  float: left;
  height: 100%;
  padding: 30px;
}
.product-details h1 {
  color: #333;
  font-family: "Pacifico", cursive;
  margin-bottom: 35px;
}
.product-details button {
  width: 150px;
  height: 50px;
  margin-top: 20px;
  background-color: #337AB7;
  border-radius: 0;
  color: #fff;
  box-shadow: 2px 2px 7px #173853;
}
.product-details button:hover, .product-details button:active, .product-details button:focus {
  color: #fff;
}

.product-image {
  position: absolute;
  right: -20px;
  top: -40px;
}
.product-image img {
  max-width: 400px;
}

@media (max-width: 700px) {
  .product-card {
    margin-left: 20px;
    margin-right: 20px;
  }
}
@media (max-width: 540px) {
  .product-card {
    overflow: hidden;
    margin-bottom: 50px;
  }

  .product-details {
    width: 60%;
    z-index: 1;
  }

  .product-image {
    width: 100%;
    left: 40%;
    top: -50px;
  }
}
@media (max-width: 440px) {
  .product-details {
    width: 65%;
  }
}
@media (max-width: 365px) {
  .product-details {
    width: 80%;
    position: relative;
    color: #333;
    background-color: rgba(255, 255, 255, 0.7);
  }
}


</style>
   <div class="container">
      <div class="row">
         <div class="col-sm-12 title_bx">
            <h3 class="title"> Related Product</h3>
         </div>
      </div>
      <div class="row">
       {foreach from=$suggested_products item=$product}
<div class="product-card">
    <div class="product-image">
    <img src="">
  </div>
  <div class="product-details">
    <h1>{$product.name}</h1>
    <p>{$product.name}</p>
    <a href="/product/{$product.sku}">
     <button type="button" class="btn">Buy Now</button>
   </a>
  </div>
</div>
{/foreach}
      </div>
   </div>
</section>
<script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-157cd5b220a5c80d4ff8e0e70ac069bffd87a61252088146915e8726e5d9f147.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://w3learnpoint.com/cdn/jquery.picZoomer.js"></script>
  
      <script id="rendered-js" >
$(document).ready(function () {
  $('.picZoomer').picZoomer();
  $('.piclist li').on('click', function (event) {
    var $pic = $(this).find('img');
    $('.picZoomer-pic').attr('src', $pic.attr('src'));
  });

  var owl = $('#recent_post');
  owl.owlCarousel({
    margin: 20,
    dots: false,
    nav: true,
    navText: [
    "<i class='fa fa-chevron-left'></i>",
    "<i class='fa fa-chevron-right'></i>"],

    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 2 },

      600: {
        items: 3 },

      1000: {
        items: 5 },

      1200: {
        items: 4 } } });




  $('.decrease_').click(function () {
    decreaseValue(this);
  });
  $('.increase_').click(function () {
    increaseValue(this);
  });
  function increaseValue(_this) {
    var value = parseInt($(_this).siblings('input#number').val(), 10);
    value = isNaN(value) ? 0 : value;
    value++;
    $(_this).siblings('input#number').val(value);
  }

  function decreaseValue(_this) {
    var value = parseInt($(_this).siblings('input#number').val(), 10);
    value = isNaN(value) ? 0 : value;
    value < 1 ? value = 1 : '';
    value--;
    $(_this).siblings('input#number').val(value);
  }
});
</script>
 
{include file="addons/footer.tpl"}

