<?php
$CI = & get_instance();
$CI->load->model('Users');
$users = $CI->Users->profile_edit_data();
?>

<div class="section-head">
      <div class="top-bar">
         <div class="container-fluid">
            <div class="row">
               <nav class="navbar navbar-expand-sm ml-md-auto">
                  <ul class="navbar-nav">
                     <li class="nav-item">
                        <a class="nav-link" href="#">My Account</a>
                     </li>
                     <li>
                        <p class="seperator">|</p>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Wishlist</a>
                     </li>
                     <li>
                        <p class="seperator">|</p>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Track your order</a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
      <div class="main-nav bg-light">
         <div class="container-fluid">
            <div class="row align-items-center py-4">
               <!-- Brand Logo & Sidebar Button -->
               <div class="col-lg-3 col-sm-6 mb-sm-4 mb-lg-0 col-6 order-1">
                  <div class="logo-container d-flex flex-row align-item-center justify-content-end">
                     <div class="sidebar-button">
                        <button class="navbar-toggler h-100" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                           aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                           <img src="<?php echo base_url() ?>assets/img/toggler_icon.png?>" alt="Toggle navigation">
                        </button>
                     </div>
                     <div class="logo ml-2">
                        <div class="logo_content">
                           <img src="<?php echo base_url() ?>assets/img/logo.png?>" alt="Sauda Express" class="img-fluid d-block">
                           <small class="text-white tag-line">Where technology meets tradition</small> 
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Search Bar -->
               <div class="col-lg-6 col-sm-12 order-lg-2 order-3 text-lg-left text-right">
                  <div class="header_search">
                     <div class="header_search_content">
                        <div class="header_search_form_container">
                           <form action="#">
                              <div class="input-group mb-3">
                                 <div class="input-group-prepend">
                                    <button class="btn btn-outline-secondary dropdown-toggle font-weight-400 category-button" type="button"
                                       data-toggle="dropdown">
                                       All
                                       <img src="<?php echo base_url() ?>assets/img/chevron.png?>" alt="" class="img-fluid">
                                    </button>
                                    <div class="dropdown-menu">
                                       <?php foreach($CatList as $key => $value) {?>
                                          <?php for ($i=0; $i < count($value); $i++) {?>
                                             <a class="dropdown-item" href="javascript:void(0);" data-value="<?=$value[$i]['CategoryId']?>"><?=$value[$i]['Alias']?></a>
                                          <?php } ?>
                                       <?php } ?>
                                    </div>
                                 </div>
                                 <input type="text" class="form-control font-weight-400 border-none" placeholder="I'm shopping for...">
                                 <div class="input-group-append">
                                    <button class="btn btn-outline-secondary btn-black border-none" type="button">Search</button>
                                 </div>
                              </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- Phone Number & Add to Cart Button -->
                  <div class="col-lg-3 col-6 order-lg-3 order-2 text-lg-left text-left">
                     <div class="phone_cart mb-1 d-flex flex-row align-item-center justify-content-start">
                        <!-- Phone -->
                        <div class="phone mx-4 d-flex flex-row align-item-center justify-content-start">
                           <div class="phone_icon mr-2">
                              <img src="<?php echo base_url() ?>assets/img/hotline_phone_icon.png?>" alt="">
                           </div>
                           <div class="phone_content text-white">
                              <div class="phone_text">
                                 <h6 class="mb-0">Hotline</h6>
                              </div>
                              <div class="phone_number">
                                 <h6 class="font-weight-bold">+92 300 123 1234</h6>
                              </div>
                           </div>
                        </div>
                        <!-- Cart -->
                        <div class="cart">
                           <div class="cart_container d-flex flex-row align-item-center justify-content-start">
                              <!-- Cart Icon -->
                              <div class="cart_icon">
                                 <a href="#">
                                    <img src="<?php echo base_url() ?>assets/img/basket.png?>" alt="" id="basket-img">
                                    <div class="cart_icon_text">
                                       <span id="add_to_cart_items" class="badge badge-pill badge-light">2</span>
                                    </div>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>

   <!-- Cart Scripts Start -->

   <script type="text/javascript">
      
      function getCookie(name) {
         const value = `; ${document.cookie}`;
         const parts = value.split(`; ${name}=`);
         if (parts.length === 2) return parts.pop().split(';').shift();
      }

      $(document).ready(() => {
         loadCartData();
         $(document).on('keydown', '.quantity', function () {
            return false;
         });
         $(document).on('click', '.remove-cart', function () {
            var productJson = $(this).data('json');
            if(removeAndUpdateFromCart(productJson)){
               $(this).hide();
               $($(this).parent().find('.quantity')[0]).val('');
               $($(this).parent().find('.add-cart')[0]).html('Add to Cart');
               $.notify(`${productJson.pName} removed from cart`, "warn");
            }
         });
         $(document).on('click', '.add-cart', function () {
             var productJson = $(this).data('json');
             var quantity = parseInt($(this).parent().find('.quantity')[0].value);
             if(!isNaN(quantity) && quantity > 0){
               var cart = getCookie('baskit');
               if(cart)
                  cart = JSON.parse(cart);
               if(addOrUpdateCart(cart && cart.length > 0 ? cart : [], productJson, quantity)){
                  $($(this).parent().find('.remove-cart')[0]).show();
                  $(this).html('Update to Cart');
               }
             }else{
               $.notify("Select a valid quantity, quantity must be greater then 0", "error");
             }
         });
         function addOrUpdateCart(cart, productJson, quantity){
            var currentProduct = cart.filter((each)=>{return each.id == productJson.id});
            var oldQty = 0;
            if(currentProduct.length > 0){
               oldQty = currentProduct[0].quantity;
               currentProduct[0].quantity = quantity;
            }
            else{
               productJson.quantity = quantity;
               cart.push(productJson);
            }
            document.cookie = 'baskit=' + JSON.stringify(cart);
            if(currentProduct.length > 0)
               $.notify(`${productJson.pName} quantity updated from ${oldQty} to ${currentProduct[0].quantity}`, "success");
            else
               $.notify(`${productJson.pName} added into cart`, "success");
            $('#add_to_cart_items').html(cart.length);
            return true;
         }
         function removeAndUpdateFromCart(productJson){
            var cart = getCookie('baskit');
            if(!cart)
               return true;
            cart = JSON.parse(cart);
            var cartExceptCurrentProduct = cart.filter((each)=>{return each.id != productJson.id});
            document.cookie = 'baskit=' + JSON.stringify(cartExceptCurrentProduct);
            $('#add_to_cart_items').html(cartExceptCurrentProduct.length);
            return true;
         }
         function loadCartData(){
            var cart = getCookie('baskit');
            if(!cart)
               return true;
            cart = JSON.parse(cart);
            var allProducts = $('.each-prod');
            for (var i = 0; i < allProducts.length; i++) {
               var productJson = $($(allProducts[i]).find('.add-cart')[0]).data('json');
               var currentProduct = cart.filter((each)=>{return each.id == productJson.id});
               if(currentProduct.length > 0){
                  $($(allProducts[i]).find('.remove-cart')[0]).show();
                  $($(allProducts[i]).find('.quantity')[0]).val(currentProduct[0].quantity);
                  $($(allProducts[i]).find('.add-cart')[0]).html('Update to Cart');
               }
            }
            $('#add_to_cart_items').html(cart.length);
         }
      });
      
   </script>

   <!-- Cart Scripts End -->