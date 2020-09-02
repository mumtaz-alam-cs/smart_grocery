<div id="main-page">
        <!-- Bread Crumb -->
        <div class="bread_crumb">
            <div class="container">
                <div class="row d-block">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Order</a></li>
                            <li class="breadcrumb-item">Checkout</li>
                        </ol>
                    </nav>
                    <h3 class="mb-0">Checkout</h3>
                </div>
            </div>
        </div>

        <!-- Bread Crumb -->


        <section class="main-content mx-4">
            <div class="container">
                <!-- Alert Message -->
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
                <div class="row">
                    <div class="col-md-8">
                        <div id="checkout-panel">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link d-flex justify-content-between"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                <i class="fas fa-check mr-4"></i>
                                                <div class="text-left">
                                                    <span class="verification-steps-heading d-block">Verified Mobile
                                                        Number</span>
                                                    <span class="completed-content"><?=$_SESSION['phone']?></span>
                                                </div>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            Verification Completed
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link d-flex w-100" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                <i class="fas fa-check mr-4" id="address-success" style="display: none;"></i>
                                                <span class="mr-4 process-number" id="address-process">2</span>
                                                <div class="text-left">
                                                    <span
                                                        class="verification-steps-heading d-block align-self-start" id="deliveryAddressTitle">Enter your Delivery Address</span>
                                                    <span class="completed-content" id="deliveryAddressText"></span>
                                                </div>
                                                <div class="change-button ml-auto">Change</div>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordion">
                                        <div class="card-body p-5">
                                            <div class="container-fluid">
                                                <form id="newAddressForm" style="display: <?=!$userAddress ? 'block' : 'none';?>" action="<?=base_url('user/submit_address_info')?>">
                                                    <input type="email" name="user_email" class="form-control newFormItem" placeholder="Enter your Email Address" required>
                                                    <div class="checkbox ml-4">
                                                      <label><input type="checkbox" value="" class="mr-2 p-2">Keep me up to date on news and exclusive offers</label>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="col">
                                                          <input type="text" name="first_name" class="form-control newFormItem" placeholder="First Name" required>
                                                        </div>
                                                        <div class="col">
                                                          <input type="text" name="last_name" class="form-control newFormItem" placeholder="Last Name" required>
                                                          <input type="hidden" name="user_name">
                                                        </div>
                                                    </div>
                                                    
                                                    <input type="text" name="newAddress" class="form-control newFormItem" placeholder="Flat, House No. Building, Company, Apartment" required>
                                                    <input type="text" name="newAddress2" class="form-control newFormItem" placeholder="Area, Sector, Colony, Street" required>
                                                    <div class="form-group loctionDropdown">
                                                      <label for="newAddressLocation" class="ml-4">Delivery Location</label>
                                                      <select class="form-control newFormItem" id="newAddressLocation" required>
                                                        <option>Home</option>
                                                        <option>Office</option>
                                                      </select> -->

                                                    </div>
                                                    <input type="submit" name="newAddressSubmit" class="btn btn-link px-5 py-2 button-primary text-white" value="Save">
                                                </form>
                                                <form id="addressForm" style="display: <?=$userAddress ? 'block' : 'none';?>"  action="<?=base_url('user/submit_address')?>">
                                                    <input type="hidden" name="selectedFinalAddress" id="selectedFinalAddress">
                                                    <div class="row address-panel my-2">
                                                        <?php if($userAddress){?>
                                                            {userAddress}
                                                            <div class="col-md-6 my-2">
                                                                <div class="card p-5 text-center">
                                                                    <a href="#" class="removeAddress">x</a>
                                                                    <input type="radio" name="optradio" class="selectRadio">
                                                                    <!-- <i class="fas fa-check" style="display:none;"></i> -->
                                                                    <a href="javascript:void(0)" data-addressId="{AddressId}" class="singleAddress" id="address">
                                                                        <span class="internalAddressContent">{Address}</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            {/userAddress}
                                                        <?php } ?>
                                                        <div class="col-md-6 my-2">
                                                            <div class="card">
                                                                <a href="javascript:void(0)" class="text-center p-5"
                                                                    id="addNewAddress">
                                                                    <textarea name="newAddressEdit" id="newAddressEdit"
                                                                        cols="20" rows="5"
                                                                        style="display: none;"></textarea>
                                                                    <!-- <div id="addAddressBtn"> -->
                                                                    <div id="newAddressContent">
                                                                        <span class="mb-2 d-block">
                                                                            <i class="fas fa-plus fa-2x p-3 bg-gray"></i>
                                                                        </span>
                                                                        <span id="addAddressBtn">
                                                                            Add new Delivery Address
                                                                        </span>
                                                                    </div>
                                                                    <!-- <div class="d-flex justify-content-center"> -->
                                                                    <a href="javascript:void(0)" id="newAddressAddBtn"
                                                                        style="display: none;">Add</a>
                                                                    <a href="javascript:void(0)" id="newAddressCancelBtn"
                                                                        style="display: none;">Cancel</a>
                                                                    <!-- </div> -->

                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn btn-link button-primary text-white px-5 py-2" value="Next" id="submitAddress">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link d-flex w-100 collapsed" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                <i class="fas fa-check mr-4" id="time-success" style="display: none;"></i>
                                                <span class="mr-4 process-number" id="time-process">3</span>
                                                <div class="text-left">
                                                    <span class="verification-steps-heading d-block" id="deliveryDateTitle">Enter Delivery Date and Time</span>
                                                    <span class="completed-content" id="deliveryDateText"></span>
                                                </div>
                                                <div class="change-button ml-auto">Change</div>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordion">
                                        <div class="card-body">
                                            <table class="table table-bordered" id="timeSlotArea">
                                                
                                            </table>
                                            <a href="javascript:void(0)"
                                                class="btn btn-link button-primary text-white px-5 py-2">Next</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link d-flex w-100 collapsed" data-toggle="collapse"
                                                data-target="#collapseFour" aria-expanded="false"
                                                aria-controls="headingFour">
                                                <span class="mr-4 process-number">4</span>
                                                <div class="text-left">
                                                    <span class="verification-steps-heading d-block" id="paymentMethodTitle">Select Payment
                                                        System</span>
                                                    <span class="completed-content" id="paymentMethodText"></span>
                                                </div>
                                                <div class="change-button ml-auto">Change</div>
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse p-4" aria-labelledby="headingFour"
                                        data-parent="#accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <span>Payment Methods</span>
                                            </div>
                                            <div class="card-body">
                                                <span class="mb-4">Information for selected billing method</span>
                                                <div class="bill-payment-methods mt-4 p-3 mb-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="bill-method1"
                                                            id="bill-method1" value="option1" checked>
                                                        <label class="form-check-label" for="bill-method1">
                                                            Cash on Delivery
                                                        </label>
                                                    </div>
                                                </div>
                                                <a href="javascript:void(0)" id="proceed" class="btn btn-link px-5 py-2 button-secondary text-white">Place Order Here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="content-box order-box">
                                    <h4>Your Order</h4>
                                    <div class="content-box-gray">
                                        <div class="orderbox-header d-flex justify-content-between">
                                            <h6 class="font-weight-600">Subtotal</h6>
                                            <h6 class="subtotal-price font-size-15 sub-total"></h6>
                                        </div>
                                        <div class="orderbox-content">
                                            <div class="orderbox-content-title mb-3">
                                                <h6>Shipping</h6>
                                            </div>
                                            <div class="orderbox-content-charges d-flex justify-content-between mb-3">
                                                <h6>Delivery Charges</h6>
                                                <h6></h6>
                                            </div>
                                            <div class="orderbox-content-footer d-inline-flexbox align-self-start">
                                                <h6>Shipping options will be updated during checkout.</h6>
                                            </div>
        
                                        </div>
                                    </div>
                                    <div class="orderbox-footer d-flex justify-content-between mx-3">
                                        <h6>TOTAL</h6>
                                        <h6 class="total-price font-size-15 sub-total"></h6>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="content-box my-box">
                                    <div class="my-box-header d-flex justify-content-between align-items-baseline">
                                        <h4>My Order</h4>
                                        <h6 class="font-weight-700 item-counts"></h6>
                                    </div>
                                    <div class="my-box-content p-3" id="cartProductsArea"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- HOUSEHOLD ESSENTIALS -->

            </div>
        </section>
    </div>
<script type="text/javascript">
    var baskit = getCookie('baskit');
    var selectedAddress = false;
    var deliveryTime = false;
    var step1Verified = true;
    var step2Verified = false;
    var step3Verified = false;
    var step4Verified = true;
    if(!baskit || JSON.parse(baskit).length == 0)
        window.location.href = '<?=base_url();?>';
    $(document).ready(() => {
        $('#newAddressForm').validate();
        loadCheckoutCartArea();
        $("#addressForm").submit(function(e) {
            e.preventDefault();
            if(!selectedAddress){
                $.notify("Kindly select at least one address", "error");
                return false;
            }
            if(($('input[name="selectedAddress[]"]')).length == 0){
                $('#deliveryAddressTitle').html("Your Delivery Address Is");
                $('#deliveryAddressText').html($('#selectedFinalAddress').val());
                $('#address-success').show();
                $('#address-process').hide();
                $('#collapseTwo').collapse('hide');
                step2Verified = true;
                return true;
                //close tab
            }
            submitForm($(this));
        });
        setTimeSlots();
        $("#proceed").on("click", function(){
            proceedToCheckout();
        });
    });
    function proceedToCheckout(){
        if(!step1Verified || !step2Verified || !step3Verified || !step4Verified){
            $.notify("Please verify all the steps", "error");
                return false;
        }else{
            var form = document.createElement("form");
            //form.target = "_blank";
            form.method = "POST";
            form.action = "<?=base_url('Corder/checkout')?>";
            form.style.display = "none";

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = 'ad';
            input.value = selectedAddress.data("addressid");
            form.appendChild(input);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = 'dt';
            input.value = deliveryTime;
            form.appendChild(input);

            var input = document.createElement("input");
            input.type = "hidden";
            input.name = 'dtt';
            input.value = selectedAddress.text().trim();
            form.appendChild(input);

            document.body.appendChild(form);
            form.submit();
            document.body.removeChild(form);
        }
    }
    function setTimeSlots(){
        var timeSlotAreaElem = $('#timeSlotArea');
        timeSlotAreaElem.empty();
        var currentDt = new Date();
        var cart = getCookie('baskit');
        if(!cart)
            cart = "[]";
        cart = JSON.parse(cart);
        if(cart.length <= 15){
        var todayTemplate = `<thead>
                                <tr>
                                    <th scope="col">Date - Day</th>
                                    <th scope="col">Same Day Delivey - Additional Rs 150 will be
                                        charged</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>${currentDt.toDateString()}</td>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label" for="today1" onclick="setTimeSlotInternal(this);">
                                                <input class="form-check-input" type="radio"
                                                name="deliveryDate" value="${currentDt.toLocaleDateString() + ' 10:00 AM__' + currentDt.toLocaleDateString() + ' 7:00 PM'}">
                                                today
                                            </label>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>`;
                            timeSlotAreaElem.append(todayTemplate);
                        }
        var otherDTemplateHead =    `<thead>
                                        <tr>
                                            <th scope="col">Date - Day</th>
                                            <th scope="col">Time Slot</th>
                                        </tr>
                                    </thead>`;
        currentDt.setDate(currentDt.getDate() + 1);
        var otherDTemplateBody =    `<tbody>
                                        <tr>
                                            <td>${currentDt.toDateString()}</td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="today2" onclick="setTimeSlotInternal(this);">
                                                        <input class="form-check-input" type="radio"
                                                        name="deliveryDate" value="${currentDt.toLocaleDateString() + ' 10:00 AM__' + currentDt.toLocaleDateString() + ' 7:00 PM'}">
                                                        <span>10:00 am - 7:00 pm</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>`;
        currentDt.setDate(currentDt.getDate() + 1);
        otherDTemplateBody +=           `<tr>
                                            <td>${currentDt.toDateString()}</td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="today2"  onclick="setTimeSlotInternal(this);">
                                                        <input class="form-check-input" type="radio"
                                                        name="deliveryDate" value="${currentDt.toLocaleDateString() + ' 10:00 AM__' + currentDt.toLocaleDateString() + ' 7:00 PM'}">
                                                        <span>10:00 am - 7:00 pm</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>`;
        currentDt.setDate(currentDt.getDate() + 1);
        otherDTemplateBody +=           `<tr>
                                            <td>${currentDt.toDateString()}</td>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="today2" onclick="setTimeSlotInternal(this);">
                                                        <input class="form-check-input" type="radio"
                                                        name="deliveryDate" value="${currentDt.toLocaleDateString() + ' 10:00 AM__' + currentDt.toLocaleDateString() + ' 7:00 PM'}">
                                                        <span>10:00 am - 7:00 pm</span>
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>`;
        timeSlotAreaElem.append(otherDTemplateHead);
        timeSlotAreaElem.append(otherDTemplateBody);
    }
    function setTimeSlotInternal(currentElem){
        deliveryTime = $(currentElem).find('input').first().val();
        var deliveryTimeArr = deliveryTime.split('__');
        var dt = new Date(deliveryTimeArr[0]);
        var dt1 = new Date(deliveryTimeArr[1]);
        var deliverText = dt.toDateString() + "<br>" + dt.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'}) + " to " + dt1.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'});
        $('#deliveryDateTitle').html("Deliver On");
        $('#deliveryDateText').html(deliverText);
        $('#time-success').show();
        $('#time-process').hide();
        $('#collapseThree').collapse('hide');
        step3Verified = true;
    }
    function submitForm(form){
        $.ajax({
           type: "POST",
           url: form.attr('action'),
           data: form.serialize(),
           dataType: "JSON",
           success: function(data)
           {
            if(data.status == 0){
                $.notify("Something went wrong", "error");
                console.log(data);
                return false;
            }
            console.log("address submit successfully");
            var newlyAddresses = $('input[name="selectedAddress[]"]');
            for(counter = 0; counter < newlyAddresses.length; counter++){
                newlyAddresses.parent().attr('data-addressId', data.insertedIds[counter]);
                newlyAddresses.remove();
            }

            $('#deliveryAddressTitle').html("Your Delivery Address Is");
            $('#deliveryAddressText').html($('#selectedFinalAddress').val());
            $('#address-success').show();
            $('#address-process').hide();
            $('#collapseTwo').collapse('hide');
            step2Verified = true;
           },
           error: function(a,b){
                $.notify("Something went wrong!!!", "error");
           }
        });
    }
    function loadCheckoutCartArea(){
         var cartBody = $('#cartProductsArea');
         cartBody.empty();
         var eachProdTemplate = `<div data-id="{pId}" data-name="{prodName}" class="my-box-order d-flex">
                                    <img src="{imgValue}" alt="" class="img-fluid">
                                    <div class="my-box-order-content ml-3 d-flex flex-column justify-content-center">
                                        <h6>{prodName}  X {qty}</h6>
                                        <h6 class="mt-2 my-order-price">{totalPrice}</h6>
                                    </div>
                                </div>`;
         var cart = getCookie('baskit');
         if(cart){
            cart = JSON.parse(cart);
            var sum = 0;
            for (var i = 0; i < cart.length; i++) {
               var eachProdTemplateCopy = eachProdTemplate;
               sum += parseInt(cart[i].quantity) * parseInt(cart[i].price);
               eachProdTemplateCopy = eachProdTemplateCopy.replace('{pId}', cart[i].id);
               eachProdTemplateCopy = eachProdTemplateCopy.replace('{imgValue}', cart[i].img);
               eachProdTemplateCopy = eachProdTemplateCopy.replace(/{prodName}/g, cart[i].pName);
               eachProdTemplateCopy = eachProdTemplateCopy.replace('{qty}', cart[i].quantity);
               eachProdTemplateCopy = eachProdTemplateCopy.replace('{totalPrice}', parseInt(cart[i].quantity) * parseInt(cart[i].price));
               //append newly created row in card body
               cartBody.append(eachProdTemplateCopy);
            }
            $('.item-counts').html(`${cart.length} ${cart.length > 1 ? 'Items' : 'Item'}`);
            $('.sub-total').html(formatCurrency(sum));
            if(cart.length >= 15){
                $('#delivery-date').html('Next working day');
            }else{
                $('#delivery-date').html('Today');
            }
         }
         else{
            //show empty message
            return false;
         }
    }

    var addressCounter = 1;

    $(document).on("click", "a.singleAddress", function () {
        $(this).prev('.address-panel .selectRadio').prop('checked', true);
        $('.address-panel i.fa-check').hide();
        $(this).prev('i.fa-check').toggle();
        $('.selectedAddress').removeClass("selectedAddress");
        $(this).addClass("selectedAddress");
        $('#selectedFinalAddress').val($(this).find('.internalAddressContent')[0].innerText);
        selectedAddress = $(this);
    });

    $('#addNewAddress').click(function (e) {
        e.preventDefault();
        $('#newAddressContent').hide();
        $('#newAddressEdit').show();
        $('#newAddressEdit').focus();
        $('#newAddressAddBtn').show();
        $('#newAddressCancelBtn').show();
    });

    $('#newAddressAddBtn').click(function () {
        addressCounter++;
        var content = $('#newAddressEdit').val();
        // Add Address in DB

        // Add Address in Delivery Address Panel

        //                                 <input type="text" name="userAddress[]" />
        //                                 <input type="hidden" name="selectedAddress[]" />
        if(content)
        $('.address-panel').prepend(`<div class="col-md-6 my-2">
            <div class="card p-5 text-center">
                <a href="#" class="removeAddress">x</a>
                <input type="radio" name="optradio" class="selectRadio">
                <a href="javascript:void(0)" class="singleAddress" id="address${addressCounter}">
                    <span class="internalAddressContent">${content}</span>
                    <input type="hidden" value="${content}" name="selectedAddress[]" />
                </a></div></div>`);

        // reset add address panel
        $('#newAddressEdit').val('');
        $('#newAddressEdit').hide();
        $('#newAddressAddBtn').hide();
        $('#newAddressCancelBtn').hide();
        $('#newAddressContent').show();
    });

    $('#newAddressCancelBtn').click(function () {
        $('#newAddressEdit').val('');
        $('#newAddressEdit').hide();
        $('#newAddressAddBtn').hide();
        $('#newAddressCancelBtn').hide();
        $('#newAddressContent').show();
    });
    $('#newAddressForm').submit(function(e) {
        e.preventDefault();
        if($('#newAddressForm').validate()){
            submitFirstAddress($(this));
        }
    });

    function submitFirstAddress(form){
        $.ajax({
           type: "POST",
           url: form.attr('action'),
           data: form.serialize(),
           dataType: "JSON",
           success: function(data)
           {
            if(data.status == 0){
                $.notify("Something went wrong", "error");
                console.log(data);
                return false;
            }
            console.log("address submit successfully");
            $('.address-panel').prepend(`<div class="col-md-6 my-2">
                                            <div class="card p-5 text-center">
                                                <a href="#" class="removeAddress">x</a>
                                                <input type="radio" name="optradio" class="selectRadio">
                                                <a href="javascript:void(0)" data-addressid="${data.id}" class="singleAddress" id="address">
                                                    <span class="internalAddressContent">${data.address}</span>
                                                </a>
                                            </div>
                                        </div>`);
            $('#newAddressForm').hide();
            $('#addressForm').show();
           },
           error: function(a,b){
                $.notify("Something went wrong!!!", "error");
           }
        });
    }
</script>