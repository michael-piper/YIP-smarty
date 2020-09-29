<style>
*, *:before, *:after {
  box-sizing: border-box;
}

body {
  background-color: #f3f3f3;
}

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
{foreach from=$products item=$product}
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