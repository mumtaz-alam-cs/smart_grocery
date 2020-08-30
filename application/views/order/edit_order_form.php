<!-- Bread Crumb -->
<div class="bread_crumb">
   <div class="container">
      <div class="row d-block">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
               <li class="breadcrumb-item"><a href="javascript:void(0);">Track Order</a></li>
            </ol>
         </nav>
         <!-- <h3 class="mb-0"><?php //echo $SelectOrder['SubOrder']; ?></h3> -->
         <h3 class="mb-0">Order Traking</h3>
      </div>
   </div>
</div>
<!-- Bread Crumb -->
<section class="main-content">
   <div class="container">
      <?php
         $message = $this->session->userdata('message');
         if (isset($message)) {
             ?>
      <div class="alert alert-info alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $message ?>                    
      </div>
      <?php
         $this->session->unset_userdata('message');
         }
         $error_message = $this->session->userdata('error_message');
         if (isset($error_message)) {
         ?>
      <div class="alert alert-danger alert-dismissable">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <?php echo $error_message ?>                    
      </div>
      <?php
         $this->session->unset_userdata('error_message');
         }
         ?>

      <div class="row" id="order_form">
         <!-- <div class="col-xl-3 col-lg-3 col-md-12 pr-0 hidden-sm-down">
            <div class="sidenav" style="position: relative;width: 100%;z-index: 0;height: auto;">
               <div>
                  <?php 
                     //if(empty($CatList))
                         //$CatList = Array();
                     //$data['CatList'] = $CatList;
                     //$this->load->view('include/user_left_menu', $data);
                     ?>
               </div>
            </div>
         </div> -->
         
         <div class="col-xl-12 col-lg-12 col-md-12 my-3 pr-0">
            <div class="container bg-transparent pr-0">

               <div class="card p-5 content-box" style="z-index: -20; border: 3px 3px 0 0;">
                  <div class="d-flex flex-column pb-5 mb-4 border-b-primary">
                     <div id="orderNumberTitle">
                        <span>Order No.</span>
                        <span id="orderNumber"><?='#'.$OrderData['OrderDetail'][0]['OrderId']?></span>   
                     </div>
                     <div id="orderNumberSubtitle">
                        <span>Order Placed on </span>
                        <strong><?=$OrderData["OrderDetail"][0]["DeliveryDate"]?></strong>
                        <span> at </span>
                        <strong><?=date('h:i a', strtotime($OrderData["OrderDetail"][0]["DeliveryFrom"])). ' - ' .date('h:i a', strtotime($OrderData["OrderDetail"][0]["DeliveryUpto"]))?></strong>
                     </div>
                  </div>
                  <!-- Order Details Form -->
                  <div class="ordertrackingprogress my-4">
                     <ul >
                        <li>
                           <div class="check-container">
                              <div class="icon-container notdone"></div>
                              <i class="fas fa-check done"></i>   
                           </div>
                           <p>Order Placed</p>
                        </li>
                        <li>
                           
                           <div class="check-container">
                              <div class="icon-container notdone"></div>
                              <i class="fas fa-check done"></i>
                           </div>
                           <p>Processing</p>
                        </li>
                        <li>
                           
                           <div class="check-container">
                              <div class="icon-container notdone"></div>
                              <i class="fas fa-check done"></i>                           
                           </div>
                           <p>Packed</p>
                        </li>
                        <li>
                           <div class="check-container">
                              <div class="icon-container"></div>
                              <i class="fas fa-check notdone"></i>
                           </div>
                           <p>Shipped</p>
                        </li>
                        <img src="<?php echo base_url() ?>assets/img/orderTrackingTruck.png" class="truck" />
                     </ul>
                  </div>
                  <!-- Order Details Form Ends -->

                  <!-- Order Details Table -->

                  

                  <table class="table table-bordered bg-white">
                     <thead>
                        <tr>
                           <td scope="col">S.No</td>
                           <td scope="col">Product</td>
                           <td scope="col">Product Name</td>
                           <td scope="col">Price</td>
                           <td scope="col">Quantity</td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if($OrderData['OrderDetail']){
                           $products = $OrderData['OrderDetail'];
                           for ($i=0; $i < count($products); $i++) {
                        ?>
                        <tr>
                           <td class="srno"><?=$i+1?></td>
                           <td>
                              <img src="<?= base_url($products[$i]['ProductImg'])?>" style="width: 70px;">
                           </td>
                           <td>
                              <h5><?=$products[$i]['ProductName']?></h5>
                              <h6><?=$products[$i]['ItemQuantity']?>&nbsp;<?=$products[$i]['UnitName']?></h6>
                           </td>
                           <td class="quantityData">1</td>
                           <td class="priceData">
                              <script>document.write(formatCurrency('<?=$products[$i]['SoldPrice']?>', 0))</script>
                           </td>
                        </tr>
                        <?php }} ?>
                     </tbody>
                  </table>

                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                           <div class="subtotal py-3 mb-3 d-flex justify-content-between align-items-center border-b-primary">
                              <span class="title">Subtotal</span>
                              <span class="price">Rs. 90.00</span>
                           </div>
                           <h6 class="shippingHeading">Shipping</h6>
                           <div class="shippingContent pb-3 d-flex justify-content-between align-items-center">
                              <span>Delivery Charges</span>
                              <span>Rs. 150.00</span>
                           </div>
                           <div class="shippingContentSub pb-3 border-b-primary">
                              <p>Shipping options will be updated during checkout.</p>
                           </div>
                           <div class="total pt-3 d-flex justify-content-between align-items-center">
                              <span class="title">Total</span>
                              <span class="price">Rs 240.00</span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- Order Details Table Ends -->   
               </div>

               <!-- Nav tabs -->
               <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" data-toggle="tab" href="#traking" role="tab">Order Traking</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-toggle="tab" href="#detail" role="tab">Order Detail</a>
                  </li>
               </ul>
               <?php ?>
               <!-- Tab panes -->
               <div class="tab-content">
                  <div class="tab-pane active" id="traking" role="tabpanel">
                     <div class="orderprogress">
                        <div class="row">
                           <ul class="timeline" style="margin-left: 60px;">
                              <?php $skip = false; $elem = null; $canceledStepId = 7; for ($i=0; $i < count($OrderData['TrakingSteps']); $i++) {?>
                                 <li>
                                    <?php
                                    if($skip)
                                       $cls = "notDone";
                                    else
                                    $cls = $OrderData['TrakingSteps'][$i]['StepId'] <= $OrderData["OrderDetail"][0]["OrderStep"] ? "" : "notDone";
                                    ?>
                                    <div class="item <?=$cls?>">
                                       <span>
                                       <i class="fas fa-circle"></i>
                                       </span>
                                       <h5><?php if(!is_null($elem)) {
                                          $date = date_create($elem['ModifiedOn']);
                                          echo date_format($date,"d /m /Y");
                                       }?></h5>
                                       <h4><?=$OrderData['TrakingSteps'][$i]['StepName']?></h4>
                                    </div>
                                 </li>
                                 <?php
                                    if($OrderData["OrderDetail"][0]["OrderStep"] == $canceledStepId){
                                       if($OrderData['TrakingSteps'][$i]['StepId'] == $OrderData["OrderDetail"][0]["PreviousOrderStep"]){
                                          $skip = true;?>
                                          <li>
                                             <div class="item">
                                                <span style="color: red; border: 2px solid red;">
                                                <i class="fas fa-circle"></i>
                                                </span>
                                                <h5></h5>
                                                <h4 style="color: red;">Canceled</h4>
                                             </div>
                                          </li>
                                       <?php }} ?>
                              <?php } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane" id="detail" role="tabpanel">
                     <!-- Order History -->
                     <section class="main-content mx-4">
                        <div class="container">
                           <div class="row">
                              <div class="col-xl-12 col-lg-12 col-md-12 px-0">
                                 <div class="featured-products order-history-header">
                                    <h5>My Orders Details</h5>
                                    <div class="accordion" id="orderHistoryaccordion">
                                       <div class="card order-history-card">
                                          <div class="card-header order-header d-flex justify-content-between">
                                             <div class="order-date">
                                                <img src="<?=base_url("assets/img/orderhistory/calendar_icon.png")?>" alt="Calendar">
                                                <button data-toggle="collapse" data-target="#orderHistoryCollapse1" aria-expanded="true" aria-controls="orderHistoryCollapse" class="order-history-button">
                                                <span class="order-header-text" id="orderDeliverDt"></span>    
                                                </button>                                                
                                             </div>
                                             <div class="order-time">
                                                <img src="<?=base_url("assets/img/orderhistory/clock_icon.png")?>" alt="Clock">
                                                <span class="order-header-text">
                                                   <?=date('h:i a', strtotime($OrderData["OrderDetail"][0]["DeliveryFrom"])). ' - ' .date('h:i a', strtotime($OrderData["OrderDetail"][0]["DeliveryUpto"]))?>
                                                </span>
                                             </div>
                                          </div>
                                          <div id="orderHistoryCollapse1" class="collapse show" aria-labelledby="headingOne" data-parent="#orderHistoryaccordion">
                                             <div class="card-body">
                                                <?php if($OrderData['OrderDetail']){
                                                   $products = $OrderData['OrderDetail'];
                                                   for ($i=0; $i < count($products); $i++) {?>
                                                   <div class="featured-products d-flex justify-content-between align-items-center order-content">
                                                      <img src="<?= base_url($products[$i]['ProductImg'])?>" 
                                                         alt="" class="card-img-bottom text-center" style="width:70px; height: 80px;">
                                                      <div class="order-product-name order-item">
                                                         <p class="order-name"><?=$products[$i]['ProductName']?></p>
                                                      </div>
                                                      <div class="order-product-price text-center order-item">
                                                         <p class="order-price"><script>document.write(formatCurrency('<?=$products[$i]['SoldPrice']?>', 0))</script></p>
                                                      </div>
                                                      <div class="quantity-area order-item">
                                                         <div class="d-flex justify-content-center">
                                                            <span class="d-inline-flex quantity-text mr-1">Qty</span>
                                                            <span class="d-inline-flex quantity-text mr-3"><?=$products[$i]['ItemQuantity']?>&nbsp;<?=$products[$i]['UnitName']?></span>
                                                            
                                                         </div>
                                                      </div>
                                                   </div>
                                                <?php }} ?>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- Order History Content Ends -->
                        </div>
                     </section>
                     <script type="text/javascript">
                        var deliveryDt = new Date('<?=$OrderData["OrderDetail"][0]["DeliveryDate"]?>');
                        $('#orderDeliverDt').html(deliveryDt.toDateString());
                     </script>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>