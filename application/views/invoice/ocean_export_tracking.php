<!-- Product Purchase js-->
<script src="<?php echo base_url()?>my-assets/js/admin_js/json/product_purchase.js.php" ></script>
<!-- Supplier Js -->
<script src="<?php echo base_url(); ?>my-assets/js/admin_js/json/supplier.js.php" ></script>

<script src="<?php echo base_url()?>my-assets/js/admin_js/purchase.js" type="text/javascript"></script>
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
<!-- Datepicker -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url() ?>my-assets/js/countrypicker.js" type="text/javascript"></script> 




 <style>
       .select2,.ui-front{
        display:none;
       }
       #consignee-button,  #supplier_id-button{
          display:none;
      }
   #block_container
{height:40px;
    text-align:center;
}
#bloc1, #bloc2
{text-align:center;
    font-weight:bold;
    display:inline;
}
      </style>
    
<!-- Add New Purchase Start -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1>Create Ocean Export Tracking</h1>
            <small></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#">Sale<?php echo display('home') ?></a></li>
                <li class="active" style="color:orange;">Create Ocean Export Tracking</li>
            </ol>
        </div>
    </section>


<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="    margin-top: 190px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales - Ocean Export</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
         
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
    <section class="content">
        <!-- Alert Message -->
        <?php
            $message = $this->session->userdata('message');
            if (isset($message)) {
        ?>
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
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

        <!-- Purchase report -->
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-bd lobidrag">
                    <div class="panel-heading">
                        <div class="panel-title">
<div id="block_container">
                                <div id="bloc1" style="float:left;">
                          <h4><?php //echo "Create Ocean Export Tracking" ?></h4>
                               </div> 
                             <div id="bloc2" style="float:right;">
                           

                    <a style="background-color:#38469f;color:white;" href="<?php echo base_url('Cinvoice/manage_ocean_export_tracking') ?>" class="btn  m-b-5 m-r-2"><i class="ti-align-justify"> </i> <?php echo "Manage Ocean Export Tracking" ?> </a>

                    
                     </div>    </div>

  </div>

                    </div>

                    <div class="panel-body">
                    <form id="insert_ocean"  method="post">                   

                        <div class="row">
                           
                             <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-4 col-form-label">Shipper
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                        <select name="supplier_id" id="supplier_id" class="form-control " required="" tabindex="3" > 
                                            <option value="" required=""><?php echo display('select_one') ?></option>
                                            <?php
                                           foreach($all_supplier as $supplier)
                                           {
                                           ?>
                                            <option value="<?php echo $supplier['supplier_id']; ?>"><?php echo $supplier['supplier_name']; ?></option>
                                         <?php } ?>


                                           
                                        </select>
                                    </div>
                                  <?php //if($this->permission1->method('add_supplier','create')->access()){ ?>
                                    <div class="col-sm-1">


                                     <!--    <a class="btn btn-success" title="Add New Supplier" href="<?php echo base_url('Csupplier'); ?>"><i class="fa fa-user"></i></a> -->



                                         <a href="#" class="client-add-btn btn btn-info" style="color:white;background-color:#38469f;" aria-hidden="true" data-toggle="modal" data-target="#add_vendor"><i class="fa fa-user"></i></a>
                                        

                                    </div>
                                <?php //}?>
                                </div> 
                            </div>


                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="booking_no" class="col-sm-4 col-form-label">Booking No.
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="booking_no" placeholder="Booking or B/L number" id="booking_no" required />
                                    </div>
                                </div>
                            </div>




                            
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Invoice Date
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control datepicker" name="invoice_date" value="<?php echo $date; ?>" id="date"  required/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Customer / Consignee <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-7">
                                   
                                    
                                    <select name="consignee" id="consignee" class="form-control " required="" tabindex="1" style="width:100%" >
                                            <option value="" required=""><?php echo display('select_one') ?></option>
                                           <?php
                                           foreach($customer_name as $cus_name)
                                           {
                                           ?>
                                            <option value="<?php echo $cus_name['customer_id']; ?>"><?php echo $cus_name['customer_name']; ?></option>
                                         <?php } ?>
                                        </select>
                                           </div>
                                        <div class="col-sm-1">
                                        <?php //if($this->permission1->method('add_customer','create')->access()){ ?>

                                            <a href="#" class="client-add-btn btn btn-info" aria-hidden="true" style="color:white;background-color:#38469f;"  data-toggle="modal" data-target="#cust_info"><i class="fa fa-user-circle"></i></a>


<?php //}?>
                                      
</div>

                                    </div>
                                </div> 
                           
                        </div>
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
   

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="etd" class="col-sm-4 col-form-label">Notify Party
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="notify_party" placeholder="Notify Party" id="notify_party" required=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="eta" class="col-sm-4 col-form-label">Vessel  <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="vessel" name="vessel" placeholder="Vessel"  rows="1" required=""></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
   


                         <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="shipping_line" class="col-sm-4 col-form-label">Voyage No.
                                        
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="voyage_no" placeholder="Voyage No." id="voyage_no" required="" />
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of loading
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_loading" placeholder="Port of loading" id="port_of_loading" required/>
                                    </div>
                                </div>
                            </div>


                          
                        </div>


                          <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Port of discharge
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="3" class="form-control" name="port_of_discharge" placeholder="Port of discharge" id="port_of_discharge" required/>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Place of Delivery <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="place_of_delivery" name="place_of_delivery" placeholder="Place of Delivery" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="customs_broker_name" class="col-sm-4 col-form-label">Customs Broker Name</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" customs_broker_name" name="customs_broker_name" placeholder=" Customs Broker Name" rows="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="mbl_no" class="col-sm-4 col-form-label">MBL NO</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" mbl_no" name="mbl_no" placeholder=" MBL NO" rows="1">
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="hbl_no" class="col-sm-4 col-form-label">HBL NO</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" hbl_no" name="hbl_no" placeholder=" HBL NO" rows="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="obl_no" class="col-sm-4 col-form-label">OBL NO</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" obl_no" name="obl_no" placeholder=" OBL NO" rows="1">
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="ams_no" class="col-sm-4 col-form-label">AMS NO</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" ams_no" name="ams_no" placeholder=" AMS NO" rows="1">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="isf_no" class="col-sm-4 col-form-label">ISF NO</label>
                                    <div class="col-sm-8">
                                    <input field class="form-control" tabindex="4" id=" isf_no" name="isf_no" placeholder=" ISF NO" rows="1">
                                    </div>
                                </div> 
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Container No
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <textarea class="form-control" tabindex="4" id="container_no" name="container_no" placeholder="Container No" rows="1" required></textarea>
                                    </div>
                                </div>
                            </div>
                           

                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="seal_no" class="col-sm-4 col-form-label">Seal No <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="seal_no" name="seal_no" placeholder="Seal No" rows="1" required></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>


                        
                        <input type="hidden" id="invoice_hdn"/> <input type="hidden" id="invoice_hdn1"/>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="Freight forwarder" class="col-sm-4 col-form-label">Freight forwarder
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                       <input field class="form-control" tabindex="4" id="Freight forwarder" name="freight_forwarder" placeholder="Freight forwarder" rows="1" required>
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                               <label for="adress" class="col-sm-4 col-form-label">Attachments
                                    </label>
                                    
                                    <div class="col-sm-6">
                                       <input type="file" name="attachments" class="form-control">
                                    </div>
                                    
                                    <div class="col-sm-2">
                                    <button type="button" class="btn btn-info m-b-5 m-r-2" style="color:white;background-color:#38469f;" data-toggle="modal" data-target="#myModal">
                                    Track Online</button>
                                   
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="bl_number" class="col-sm-4 col-form-label">Estimated time of departure
                                        <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="etd" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div>
                            </div>


                                <div class="col-sm-6">
                               <div class="form-group row">
                                    <label for="container_no" class="col-sm-4 col-form-label">Estimated Time of Arrival <i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                    <?php $date = date('Y-m-d'); ?>
                                        <input type="date" required tabindex="2" class="form-control " name="eta" value="<?php echo $date; ?>" id="date"  />
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <label for="particulars" class="col-sm-2 col-form-label">Remarks / Particulars
                                        <i class="text-danger"></i>
                                    </label>
                                    <div class="col-sm-4">
                                       <textarea class="form-control" tabindex="4" id="particular" name="particulars"  rows="2">
                                       <?php   if(!empty($ocean_remarks[0]->remarks)){
                                            echo $ocean_remarks[0]->remarks;
                                            } ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
               
                                        
                      
                       
                        
                        
                        
                        
                        
                        <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("hide");
            $( "#datepicker-12" ).datepicker();
            $( "#datepicker-12" ).datepicker("hide");
         });
      </script>
   </head>
   
  
     
   
<br>
                       

<div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" style="color:white;background-color:#38469f;" id="add_purchase" class="btn btn-large" name="add-ocean-Export" value="Save" />
                                                       
                               <a  style="color:white;background-color:#38469f;"  id="final_submit" class='final_submit btn'>Submit</a>

<a id="download" style="color:white;background-color:#38469f;" class='btn'>Download</a>  
<a id="print" style="color:white;background-color:#38469f;" class='btn'>Print</a>  


                            </div>
                        </div>



                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<!--
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

 
      <div class="modal-header">
        <h4 class="modal-title">Online Tracking</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>


      <div class="modal-body">
      Vessel
      <br/>
      container no
      <br/>
      tracking
  </div>

     
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>-->

<!-- Purchase Report End -->
<div class="modal fade model success "id="add_vendor" role="dialog">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
      <div class="modal-header"  style="color:white;background-color:#38469f;">
          <a href="#" class="close" data-dismiss="modal" >&times;</a>
          <h3 class="modal-title"  >Add New Vendor</h3>
      </div>
      <div class="modal-body">
      <form id="insert_supplier"  method="post">
          <div id="customeMessage" class="alert hide"></div>
  <div class="panel-body">
      <div class="col-sm-6">
      <div class="form-group row">
      <label for="" class="col-sm-4  col-form-label">Vendor Type<i class="text-danger">*</i></label>
      <div class="col-sm-8">
                <select   name="vendor_type" id="vendor_type" class=" form-control" placeholder=''  required="" id="vendor_type" >
                 <option value=""> Selected Vendor Type</option>
                 <option value="productsupplier">Product Supplier</option>
                 <option value="servicevendor"> Service Vendor</option>
                 <option value="others"> Others</option>
                </select>
                </div>
                </div>
                <div class="form-group row">
                            <label for="supplier_name" class="col-sm-4 col-form-label"> Company Name<i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <input class="form-control" name ="supplier_name" id="supplier_name" type="text" placeholder="Company Name"  required="" tabindex="1">
                            </div>
                        </div>
      <div class="form-group row">
          <label for="mobile" class="col-sm-4 col-form-label"> Mobile<i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="mobile" id="mobile" type="number" placeholder=" Mobile"  min="0" tabindex="2">
          </div>
      </div>
          <div class="form-group row">
          <label for="phone" class="col-sm-4 col-form-label">Business Phone<i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="phone" id="phone" type="number" placeholder="Business Phone"   required="" min="0" tabindex="2">
          </div>
      </div>
       <div class="form-group row">
          <label for="email" class="col-sm-4 col-form-label">primary Email <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="email" id="email" type="email" placeholder="primary Email"    required="" tabindex="2">
          </div>
      </div>
       <div class="form-group row">
          <label for="emailaddress" class="col-sm-4 col-form-label">Secondary Email <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
          </div>
      </div>
        <div class="form-group row">
          <label for="contact" class="col-sm-4 col-form-label">Contact Person<i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person"  >
          </div>
      </div>
      <div class="form-group row">
          <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="fax" id="fax" type="text" placeholder="<?php echo display('fax') ?>"  >
          </div>
      </div>
    










                                        <div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label>

            <div class="col-sm-8">
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">
            <option value="USD">USD - US Dollar - $</option>
    <option value="AFN">AFN - Afghan Afghani - ؋</option>
    <option value="ALL">ALL - Albanian Lek - Lek</option>
    <option value="DZD">DZD - Algerian Dinar - دج</option>
    <option value="AOA">AOA - Angolan Kwanza - Kz</option>
    <option value="ARS">ARS - Argentine Peso - $</option>
    <option value="AMD">AMD - Armenian Dram - ֏</option>
    <option value="AWG">AWG - Aruban Florin - ƒ</option>
    <option value="AUD">AUD - Australian Dollar - $</option>
    <option value="AZN">AZN - Azerbaijani Manat - m</option>
    <option value="BSD">BSD - Bahamian Dollar - B$</option>
    <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
    <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
    <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
    <option value="BYR">BYR - Belarusian Ruble - Br</option>
    <option value="BEF">BEF - Belgian Franc - fr</option>
    <option value="BZD">BZD - Belize Dollar - $</option>
    <option value="BMD">BMD - Bermudan Dollar - $</option>
    <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
    <option value="BTC">BTC - Bitcoin - ฿</option>
    <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
    <option value="BWP">BWP - Botswanan Pula - P</option>
    <option value="BRL">BRL - Brazilian Real - R$</option>
    <option value="GBP">GBP - British Pound Sterling - £</option>
    <option value="BND">BND - Brunei Dollar - B$</option>
    <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
    <option value="BIF">BIF - Burundian Franc - FBu</option>
    <option value="KHR">KHR - Cambodian Riel - KHR</option>
    <option value="CAD">CAD - Canadian Dollar - $</option>
    <option value="CVE">CVE - Cape Verdean Escudo - $</option>
    <option value="KYD">KYD - Cayman Islands Dollar - $</option>
    <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
    <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
    <option value="XPF">XPF - CFP Franc - ₣</option>
    <option value="CLP">CLP - Chilean Peso - $</option>
    <option value="CNY">CNY - Chinese Yuan - ¥</option>
    <option value="COP">COP - Colombian Peso - $</option>
    <option value="KMF">KMF - Comorian Franc - CF</option>
    <option value="CDF">CDF - Congolese Franc - FC</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
    <option value="HRK">HRK - Croatian Kuna - kn</option>
    <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
    <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
    <option value="DKK">DKK - Danish Krone - Kr.</option>
    <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
    <option value="DOP">DOP - Dominican Peso - $</option>
    <option value="XCD">XCD - East Caribbean Dollar - $</option>
    <option value="EGP">EGP - Egyptian Pound - ج.م</option>
    <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
    <option value="EEK">EEK - Estonian Kroon - kr</option>
    <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
    <option value="EUR">EUR - Euro - €</option>
    <option value="FKP">FKP - Falkland Islands Pound - £</option>
    <option value="FJD">FJD - Fijian Dollar - FJ$</option>
    <option value="GMD">GMD - Gambian Dalasi - D</option>
    <option value="GEL">GEL - Georgian Lari - ლ</option>
    <option value="DEM">DEM - German Mark - DM</option>
    <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
    <option value="GIP">GIP - Gibraltar Pound - £</option>
    <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
    <option value="GNF">GNF - Guinean Franc - FG</option>
    <option value="GYD">GYD - Guyanaese Dollar - $</option>
    <option value="HTG">HTG - Haitian Gourde - G</option>
    <option value="HNL">HNL - Honduran Lempira - L</option>
    <option value="HKD">HKD - Hong Kong Dollar - $</option>
    <option value="HUF">HUF - Hungarian Forint - Ft</option>
    <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
    <option value="INR">INR - Indian Rupee - ₹</option>
    <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
    <option value="IRR">IRR - Iranian Rial - ﷼</option>
    <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
    <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
    <option value="ITL">ITL - Italian Lira - L,£</option>
    <option value="JMD">JMD - Jamaican Dollar - J$</option>
    <option value="JPY">JPY - Japanese Yen - ¥</option>
    <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
    <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
    <option value="KES">KES - Kenyan Shilling - KSh</option>
    <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
    <option value="KGS">KGS - Kyrgystani Som - лв</option>
    <option value="LAK">LAK - Laotian Kip - ₭</option>
    <option value="LVL">LVL - Latvian Lats - Ls</option>
    <option value="LBP">LBP - Lebanese Pound - £</option>
    <option value="LSL">LSL - Lesotho Loti - L</option>
    <option value="LRD">LRD - Liberian Dollar - $</option>
    <option value="LYD">LYD - Libyan Dinar - د.ل</option>
    <option value="LTL">LTL - Lithuanian Litas - Lt</option>
    <option value="MOP">MOP - Macanese Pataca - $</option>
    <option value="MKD">MKD - Macedonian Denar - ден</option>
    <option value="MGA">MGA - Malagasy Ariary - Ar</option>
    <option value="MWK">MWK - Malawian Kwacha - MK</option>
    <option value="MYR">MYR - Malaysian Ringgit - RM</option>
    <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
    <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
    <option value="MUR">MUR - Mauritian Rupee - ₨</option>
    <option value="MXN">MXN - Mexican Peso - $</option>
    <option value="MDL">MDL - Moldovan Leu - L</option>
    <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
    <option value="MAD">MAD - Moroccan Dirham - MAD</option>
    <option value="MZM">MZM - Mozambican Metical - MT</option>
    <option value="MMK">MMK - Myanmar Kyat - K</option>
    <option value="NAD">NAD - Namibian Dollar - $</option>
    <option value="NPR">NPR - Nepalese Rupee - ₨</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
    <option value="TWD">TWD - New Taiwan Dollar - $</option>
    <option value="NZD">NZD - New Zealand Dollar - $</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
    <option value="NGN">NGN - Nigerian Naira - ₦</option>
    <option value="KPW">KPW - North Korean Won - ₩</option>
    <option value="NOK">NOK - Norwegian Krone - kr</option>
    <option value="OMR">OMR - Omani Rial - .ع.ر</option>
    <option value="PKR">PKR - Pakistani Rupee - ₨</option>
    <option value="PAB">PAB - Panamanian Balboa - B/.</option>
    <option value="PGK">PGK - Papua New Guinean Kina - K</option>
    <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
    <option value="PHP">PHP - Philippine Peso - ₱</option>
    <option value="PLN">PLN - Polish Zloty - zł</option>
    <option value="QAR">QAR - Qatari Rial - ق.ر</option>
    <option value="RON">RON - Romanian Leu - lei</option>
    <option value="RUB">RUB - Russian Ruble - ₽</option>
    <option value="RWF">RWF - Rwandan Franc - FRw</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
    <option value="WST">WST - Samoan Tala - SAT</option>
    <option value="SAR">SAR - Saudi Riyal - ﷼</option>
    <option value="RSD">RSD - Serbian Dinar - din</option>
    <option value="SCR">SCR - Seychellois Rupee - SRe</option>
    <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
    <option value="SGD">SGD - Singapore Dollar - $</option>
    <option value="SKK">SKK - Slovak Koruna - Sk</option>
    <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
    <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
    <option value="ZAR">ZAR - South African Rand - R</option>
    <option value="KRW">KRW - South Korean Won - ₩</option>
    <option value="XDR">XDR - Special Drawing Rights - SDR</option>
    <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
    <option value="SHP">SHP - St. Helena Pound - £</option>
    <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
    <option value="SRD">SRD - Surinamese Dollar - $</option>
    <option value="SZL">SZL - Swazi Lilangeni - E</option>
    <option value="SEK">SEK - Swedish Krona - kr</option>
    <option value="CHF">CHF - Swiss Franc - CHf</option>
    <option value="SYP">SYP - Syrian Pound - LS</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
    <option value="TJS">TJS - Tajikistani Somoni - SM</option>
    <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
    <option value="THB">THB - Thai Baht - ฿</option>
    <option value="TOP">TOP - Tongan pa'anga - $</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
    <option value="TND">TND - Tunisian Dinar - ت.د</option>
    <option value="TRY">TRY - Turkish Lira - ₺</option>
    <option value="TMT">TMT - Turkmenistani Manat - T</option>
    <option value="UGX">UGX - Ugandan Shilling - USh</option>
    <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
    <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
    <option value="UYU">UYU - Uruguayan Peso - $</option>
    <option value="USD">USD - US Dollar - $</option>
    <option value="UZS">UZS - Uzbekistan Som - лв</option>
    <option value="VUV">VUV - Vanuatu Vatu - VT</option>
    <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
    <option value="VND">VND - Vietnamese Dong - ₫</option>
    <option value="YER">YER - Yemeni Rial - ﷼</option>
    <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
</select>
</div>
  </div>















  </div>
  <div class="col-sm-6">
<div class="form-group row">
      <label for="" class="col-sm-4 col-form-label">Tax Collected<i class="text-danger">*</i></label>
          <div class="col-sm-8">
             <select  style="width: 100%;"  class="form-control"  required="required" name="service_provider">
             <option value="">Select Tax Collected</option>
             <option value="1">Yes</option>
              <option value="0" >No</option>
             </select>
          </div>
        </div>
  <div class="form-group row">
          <label for="state" class="col-sm-4 col-form-label">State <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="state" id="state" type="text" required=""  placeholder="State"  >
          </div>
      </div>
       <div class="form-group row">
          <label for="zip" class="col-sm-4 col-form-label"><?php echo display('zip'); ?> <i class="text-danger">*</i></label>
          <div class="col-sm-8">
              <input class="form-control" name="zip" id="zip" type="text"  required="" placeholder="<?php echo display('zip') ?>"  >
          </div>
      </div>
      <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label">Country<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country"    style="width: 100%;" ></select>
                                    </div>
                        </div>
      <div class="form-group row">
          <label for="address " class="col-sm-4 col-form-label">Address</label>
          <div class="col-sm-8">
              <textarea class="form-control" name="address" id="address " rows="2" placeholder="Address" ></textarea>
          </div>
      </div>
      <div class="form-group row">
          <label for="details" class="col-sm-4 col-form-label"><?php echo display('supplier_details') ?></label>
          <div class="col-sm-8">
              <textarea class="form-control" name="details" id="details" rows="2" placeholder="<?php echo display('supplier_details') ?>" tabindex="4"></textarea>
          </div>
      </div>
      <div class="form-group row">
          <label for="previous_balance" class="col-sm-4 col-form-label">Credit Limit</label>
          <div class="col-sm-8">
              <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5">
          </div>
      </div>
	    <div class="form-group row">
          <label for="city" class="col-sm-4 col-form-label"><?php echo display('city'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
              <input class="form-control" name="city" id="city" type="text" placeholder="<?php echo display('city') ?>"  >
          </div>
      </div>
  <div class="form-group row">
                    <label for="billing_address" class="col-sm-4  col-form-label">PaymentTerms <i class="text-danger">*</i></label>
                    <div class="col-sm-8">
                    <select name="payment_terms"  id="terms"  class="form-control "  placeholder="" style="width:100%;"  required="required" tabindex="1" >
                                        <option   value="" >Select The Payment Terms</option>
    <option value="cod">COD</option>
    <option value="30"> 30-Days</option>
    <option value="60"> 60-Days</option>
    <option value="90"> 90-Days</option>
    <option value="45"> 45-Days</option>
                                         <?php
                                            foreach($paymentterms_add as $cn){?>
                                                <option value="<?php echo $cn['paymentterms_add'];?>">  <?php echo $cn['paymentterms_add'];  ?></option>
                                           <?php } ?>
                                        </select>
                                        </div>
                                        </div>
  </div>

<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<!-- <div class="form-group row">
            <label for="previous_balance" class="col-sm-4 col-form-label"><?php echo "Currency" ?></label> -->
            
  <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Attachments
                                    </label>
                                    <div class="col-sm-8">
                                       <input type="file" name="attachments" style="width:96%;" class="form-control">
                                    </div>
                                </div>
                                </div>
<div class="modal-footer">
                          <a href="#" class="btn" style="color:white;background-color:#38469f;"  data-dismiss="modal">Close</a>
                          <input type="submit" id="add-supplier-from-expense" name="add-supplier-from-expense"  style="color:white;background-color:#38469f;"  class="btn" value="Submit">
                      </div>
                         </form>
                      </div>
                  </div>
              </div>
          </div>



      
          
          <div class="modal fade" id="cust_info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="color:white;background-color:#38469f;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                	<h4 class="modal-title">ADD NEW CUSTOMER</h4>

            </div>
            <div class="container"></div>
            <div class="modal-body">  <div id="customeMessage" class="alert hide"></div>
          
    
                        <form id="instant_customer"  method="post">

<div id="customeMessage" class="alert hide"></div>
<div class="panel-body">


<div class="col-sm-6">

      <div class="form-group row">






                            <label for="customer_name" class="col-sm-4 col-form-label">Company Name<i class="text-danger">*</i></label>
      <div class="col-sm-8">
                                          <input class="form-control" name ="customer_name" id="customer_name" type="text" placeholder=" Company Name"   required="" tabindex="1" >

                </div>
                </div>
				
                <input type ="hidden" name="csrf_test_name" id="" value="<?php echo $this->security->get_csrf_hash();?>">


                        <div class="form-group row">
<label for="customer_type" class="col-sm-4 col-form-label">Customer Type</label>
                            <div class="col-sm-8">
							<select   name="customer_type" id="customer_type" class=" form-control" placeholder="Customer Type" >
     <option value="">Select Customer Type</option>   
    <option value="Distributor">Distributor</option> 
    <option value="Fabricator">Fabricator</option> 
    <option value="Kitchen">Kitchen</option> 
    <option value="Dealer">Dealer</option> 
    <option value="Contractor">Contractor</option> 
    <option value="Builder">Builder</option> 
    <option value="Others">Others</option> 
    </select>
                            </div>
                        </div>
						
						
						
						
						
      <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label">Primary Email<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name ="email" id="email" type="email" required="" placeholder="Primary Email" > 
          </div>
      </div>
	  
	  
	  
	  
          <div class="form-group row">
                            <label for="emailaddress" class="col-sm-4 col-form-label">Secondary Email</label>
          <div class="col-sm-8">
                                <input class="form-control" name="emailaddress" id="emailaddress" type="email" placeholder="Secondary Email"  >
          </div>
      </div>
	  
	  
       <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label">Business Phone<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name ="phone" id="mobile" type="number" placeholder="Business Phone" min="0" tabindex="3" required="">
          </div>
      </div>
	  
	  
       <div class="form-group row">
                            <label for="mobile" class="col-sm-4 col-form-label"> Mobile</label>
          <div class="col-sm-8">
                                <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Mobile"  min="0" tabindex="2" >
          </div>
      </div>
	  
	  
        <div class="form-group row">
                            <label for="contact" class="col-sm-4 col-form-label">Contact Person<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="contact" id="contact" type="text" placeholder="Contact Person" required="" >
          </div>
      </div>
	  
	  
      <div class="form-group row">
      <label for="ETA" class="col-sm-4 col-form-label">Attachments</label>
          <div class="col-sm-8">
                 <input type="file" name="file" class="form-control">

          </div>
      </div>
    
                                        <div class="form-group row">
                            <label for="Preferred currency" class="col-sm-4 col-form-label"> Preferred currency<i class="text-danger">*</i></label>

            <div class="col-sm-8">
            <!-- <select id="currency" name="currency1" style="width: 100%;"     > -->
            <select  class="form-control" id="currency" name="currency1"  style="width: 100%;" required=""  style="max-width: -webkit-fill-available;">

    <option value="USD">USD - US Dollar - $</option>
    <option value="AFN">AFN - Afghan Afghani - ؋</option>
    <option value="ALL">ALL - Albanian Lek - Lek</option>
    <option value="DZD">DZD - Algerian Dinar - دج</option>
    <option value="AOA">AOA - Angolan Kwanza - Kz</option>
    <option value="ARS">ARS - Argentine Peso - $</option>
    <option value="AMD">AMD - Armenian Dram - ֏</option>
    <option value="AWG">AWG - Aruban Florin - ƒ</option>
    <option value="AUD">AUD - Australian Dollar - $</option>
    <option value="AZN">AZN - Azerbaijani Manat - m</option>
    <option value="BSD">BSD - Bahamian Dollar - B$</option>
    <option value="BHD">BHD - Bahraini Dinar - .د.ب</option>
    <option value="BDT">BDT - Bangladeshi Taka - ৳</option>
    <option value="BBD">BBD - Barbadian Dollar - Bds$</option>
    <option value="BYR">BYR - Belarusian Ruble - Br</option>
    <option value="BEF">BEF - Belgian Franc - fr</option>
    <option value="BZD">BZD - Belize Dollar - $</option>
    <option value="BMD">BMD - Bermudan Dollar - $</option>
    <option value="BTN">BTN - Bhutanese Ngultrum - Nu.</option>
    <option value="BTC">BTC - Bitcoin - ฿</option>
    <option value="BOB">BOB - Bolivian Boliviano - Bs.</option>
    <option value="BAM">BAM - Bosnia-Herzegovina Convertible Mark - KM</option>
    <option value="BWP">BWP - Botswanan Pula - P</option>
    <option value="BRL">BRL - Brazilian Real - R$</option>
    <option value="GBP">GBP - British Pound Sterling - £</option>
    <option value="BND">BND - Brunei Dollar - B$</option>
    <option value="BGN">BGN - Bulgarian Lev - Лв.</option>
    <option value="BIF">BIF - Burundian Franc - FBu</option>
    <option value="KHR">KHR - Cambodian Riel - KHR</option>
    <option value="CAD">CAD - Canadian Dollar - $</option>
    <option value="CVE">CVE - Cape Verdean Escudo - $</option>
    <option value="KYD">KYD - Cayman Islands Dollar - $</option>
    <option value="XOF">XOF - CFA Franc BCEAO - CFA</option>
    <option value="XAF">XAF - CFA Franc BEAC - FCFA</option>
    <option value="XPF">XPF - CFP Franc - ₣</option>
    <option value="CLP">CLP - Chilean Peso - $</option>
    <option value="CNY">CNY - Chinese Yuan - ¥</option>
    <option value="COP">COP - Colombian Peso - $</option>
    <option value="KMF">KMF - Comorian Franc - CF</option>
    <option value="CDF">CDF - Congolese Franc - FC</option>
    <option value="CRC">CRC - Costa Rican ColÃ³n - ₡</option>
    <option value="HRK">HRK - Croatian Kuna - kn</option>
    <option value="CUC">CUC - Cuban Convertible Peso - $, CUC</option>
    <option value="CZK">CZK - Czech Republic Koruna - Kč</option>
    <option value="DKK">DKK - Danish Krone - Kr.</option>
    <option value="DJF">DJF - Djiboutian Franc - Fdj</option>
    <option value="DOP">DOP - Dominican Peso - $</option>
    <option value="XCD">XCD - East Caribbean Dollar - $</option>
    <option value="EGP">EGP - Egyptian Pound - ج.م</option>
    <option value="ERN">ERN - Eritrean Nakfa - Nfk</option>
    <option value="EEK">EEK - Estonian Kroon - kr</option>
    <option value="ETB">ETB - Ethiopian Birr - Nkf</option>
    <option value="EUR">EUR - Euro - €</option>
    <option value="FKP">FKP - Falkland Islands Pound - £</option>
    <option value="FJD">FJD - Fijian Dollar - FJ$</option>
    <option value="GMD">GMD - Gambian Dalasi - D</option>
    <option value="GEL">GEL - Georgian Lari - ლ</option>
    <option value="DEM">DEM - German Mark - DM</option>
    <option value="GHS">GHS - Ghanaian Cedi - GH₵</option>
    <option value="GIP">GIP - Gibraltar Pound - £</option>
    <option value="GRD">GRD - Greek Drachma - ₯, Δρχ, Δρ</option>
    <option value="GTQ">GTQ - Guatemalan Quetzal - Q</option>
    <option value="GNF">GNF - Guinean Franc - FG</option>
    <option value="GYD">GYD - Guyanaese Dollar - $</option>
    <option value="HTG">HTG - Haitian Gourde - G</option>
    <option value="HNL">HNL - Honduran Lempira - L</option>
    <option value="HKD">HKD - Hong Kong Dollar - $</option>
    <option value="HUF">HUF - Hungarian Forint - Ft</option>
    <option value="ISK">ISK - Icelandic KrÃ³na - kr</option>
    <option value="INR">INR - Indian Rupee - ₹</option>
    <option value="IDR">IDR - Indonesian Rupiah - Rp</option>
    <option value="IRR">IRR - Iranian Rial - ﷼</option>
    <option value="IQD">IQD - Iraqi Dinar - د.ع</option>
    <option value="ILS">ILS - Israeli New Sheqel - ₪</option>
    <option value="ITL">ITL - Italian Lira - L,£</option>
    <option value="JMD">JMD - Jamaican Dollar - J$</option>
    <option value="JPY">JPY - Japanese Yen - ¥</option>
    <option value="JOD">JOD - Jordanian Dinar - ا.د</option>
    <option value="KZT">KZT - Kazakhstani Tenge - лв</option>
    <option value="KES">KES - Kenyan Shilling - KSh</option>
    <option value="KWD">KWD - Kuwaiti Dinar - ك.د</option>
    <option value="KGS">KGS - Kyrgystani Som - лв</option>
    <option value="LAK">LAK - Laotian Kip - ₭</option>
    <option value="LVL">LVL - Latvian Lats - Ls</option>
    <option value="LBP">LBP - Lebanese Pound - £</option>
    <option value="LSL">LSL - Lesotho Loti - L</option>
    <option value="LRD">LRD - Liberian Dollar - $</option>
    <option value="LYD">LYD - Libyan Dinar - د.ل</option>
    <option value="LTL">LTL - Lithuanian Litas - Lt</option>
    <option value="MOP">MOP - Macanese Pataca - $</option>
    <option value="MKD">MKD - Macedonian Denar - ден</option>
    <option value="MGA">MGA - Malagasy Ariary - Ar</option>
    <option value="MWK">MWK - Malawian Kwacha - MK</option>
    <option value="MYR">MYR - Malaysian Ringgit - RM</option>
    <option value="MVR">MVR - Maldivian Rufiyaa - Rf</option>
    <option value="MRO">MRO - Mauritanian Ouguiya - MRU</option>
    <option value="MUR">MUR - Mauritian Rupee - ₨</option>
    <option value="MXN">MXN - Mexican Peso - $</option>
    <option value="MDL">MDL - Moldovan Leu - L</option>
    <option value="MNT">MNT - Mongolian Tugrik - ₮</option>
    <option value="MAD">MAD - Moroccan Dirham - MAD</option>
    <option value="MZM">MZM - Mozambican Metical - MT</option>
    <option value="MMK">MMK - Myanmar Kyat - K</option>
    <option value="NAD">NAD - Namibian Dollar - $</option>
    <option value="NPR">NPR - Nepalese Rupee - ₨</option>
    <option value="ANG">ANG - Netherlands Antillean Guilder - ƒ</option>
    <option value="TWD">TWD - New Taiwan Dollar - $</option>
    <option value="NZD">NZD - New Zealand Dollar - $</option>
    <option value="NIO">NIO - Nicaraguan CÃ³rdoba - C$</option>
    <option value="NGN">NGN - Nigerian Naira - ₦</option>
    <option value="KPW">KPW - North Korean Won - ₩</option>
    <option value="NOK">NOK - Norwegian Krone - kr</option>
    <option value="OMR">OMR - Omani Rial - .ع.ر</option>
    <option value="PKR">PKR - Pakistani Rupee - ₨</option>
    <option value="PAB">PAB - Panamanian Balboa - B/.</option>
    <option value="PGK">PGK - Papua New Guinean Kina - K</option>
    <option value="PYG">PYG - Paraguayan Guarani - ₲</option>
    <option value="PEN">PEN - Peruvian Nuevo Sol - S/.</option>
    <option value="PHP">PHP - Philippine Peso - ₱</option>
    <option value="PLN">PLN - Polish Zloty - zł</option>
    <option value="QAR">QAR - Qatari Rial - ق.ر</option>
    <option value="RON">RON - Romanian Leu - lei</option>
    <option value="RUB">RUB - Russian Ruble - ₽</option>
    <option value="RWF">RWF - Rwandan Franc - FRw</option>
    <option value="SVC">SVC - Salvadoran ColÃ³n - ₡</option>
    <option value="WST">WST - Samoan Tala - SAT</option>
    <option value="SAR">SAR - Saudi Riyal - ﷼</option>
    <option value="RSD">RSD - Serbian Dinar - din</option>
    <option value="SCR">SCR - Seychellois Rupee - SRe</option>
    <option value="SLL">SLL - Sierra Leonean Leone - Le</option>
    <option value="SGD">SGD - Singapore Dollar - $</option>
    <option value="SKK">SKK - Slovak Koruna - Sk</option>
    <option value="SBD">SBD - Solomon Islands Dollar - Si$</option>
    <option value="SOS">SOS - Somali Shilling - Sh.so.</option>
    <option value="ZAR">ZAR - South African Rand - R</option>
    <option value="KRW">KRW - South Korean Won - ₩</option>
    <option value="XDR">XDR - Special Drawing Rights - SDR</option>
    <option value="LKR">LKR - Sri Lankan Rupee - Rs</option>
    <option value="SHP">SHP - St. Helena Pound - £</option>
    <option value="SDG">SDG - Sudanese Pound - .س.ج</option>
    <option value="SRD">SRD - Surinamese Dollar - $</option>
    <option value="SZL">SZL - Swazi Lilangeni - E</option>
    <option value="SEK">SEK - Swedish Krona - kr</option>
    <option value="CHF">CHF - Swiss Franc - CHf</option>
    <option value="SYP">SYP - Syrian Pound - LS</option>
    <option value="STD">STD - São Tomé and Príncipe Dobra - Db</option>
    <option value="TJS">TJS - Tajikistani Somoni - SM</option>
    <option value="TZS">TZS - Tanzanian Shilling - TSh</option>
    <option value="THB">THB - Thai Baht - ฿</option>
    <option value="TOP">TOP - Tongan pa'anga - $</option>
    <option value="TTD">TTD - Trinidad & Tobago Dollar - $</option>
    <option value="TND">TND - Tunisian Dinar - ت.د</option>
    <option value="TRY">TRY - Turkish Lira - ₺</option>
    <option value="TMT">TMT - Turkmenistani Manat - T</option>
    <option value="UGX">UGX - Ugandan Shilling - USh</option>
    <option value="UAH">UAH - Ukrainian Hryvnia - ₴</option>
    <option value="AED">AED - United Arab Emirates Dirham - إ.د</option>
    <option value="UYU">UYU - Uruguayan Peso - $</option>
    <option value="UZS">UZS - Uzbekistan Som - лв</option>
    <option value="VUV">VUV - Vanuatu Vatu - VT</option>
    <option value="VEF">VEF - Venezuelan BolÃvar - Bs</option>
    <option value="VND">VND - Vietnamese Dong - ₫</option>
    <option value="YER">YER - Yemeni Rial - ﷼</option>
    <option value="ZMK">ZMK - Zambian Kwacha - ZK</option>
</select>
</div>
  </div>


  </div>

  
  <div class="col-sm-6">
<div class="form-group row">
          <label for="fax" class="col-sm-4 col-form-label"><?php echo display('fax'); ?> <i class="text-danger"></i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="fax" id="fax" type="text" placeholder="Fax" >
          </div>
        </div>




  <div class="form-group row">
  <label for="address2 " class="col-sm-4 col-form-label">Billing Address<i class="text-danger">*</i></label>
          <div class="col-sm-8">
          <textarea class="form-control" required="" name="address2" id="address2" rows="2"   placeholder="Billing Address" ></textarea>
          </div>
      </div>
	  

      <div class="form-group row">
                            <label for="address " class="col-sm-4 col-form-label">Shipping Address</label>
          <div class="col-sm-8">
                                <textarea class="form-control" name="address" id="address"  rows="2" placeholder="Shipping Address"></textarea>
          </div>
      </div>


	  
	  
       <div class="form-group row">
                            <label for="city" class="col-sm-4 col-form-label">City<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="city" id="city" type="text" placeholder="City" required="" >
          </div>
      </div>
    
	
	
      <div class="form-group row">
                            <label for="state" class="col-sm-4 col-form-label">State<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                <input class="form-control" name="state" id="state" type="text" placeholder="State" required="" >
                                    </div>
                        </div>
						
						
						
						
						
						
      <div class="form-group row">
                            <label for="zip" class="col-sm-4 col-form-label">Zip<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                <input class="form-control" name="zip" id="zip" type="text" placeholder="Zip"  required="">
          </div>
      </div>
	  
	  
	  
	  
	  
	  
      <div class="form-group row">
                                    <label for="country" class="col-sm-4 col-form-label">Country<i class="text-danger">*</i></label>
          <div class="col-sm-8">
                                    <select class="selectpicker countrypicker form-control"  data-live-search="true" data-default="United States"  name="country" id="country" ></select>
          </div>
      </div>
	  
	  
	  
	  
	  
      <div class="form-group row">
<label for="billing_address" class="col-sm-4 col-form-label">Payment Terms<i class="text-danger">*</i></label>
          <div class="col-sm-8">
<select   name="payment" id="payment_terms" class=" form-control" placeholder='Payment Terms'  required="" >
     <option value="">Select Payment Terms </option>   
    <option value="COD">COD</option> 
    <option value="30 Days">30 Days</option> 
    <option value="45 Days">45 Days</option> 
    <option value="60 Days">60 Days</option> 
    <option value="90 Days">90 Days</option> 
      <?php foreach($payment_terms as $inv){ ?>
          <option value="<?php echo $inv['payment_terms'] ; ?>"><?php echo $inv['payment_terms'] ; ?></option>
                               <?php    }?>
    </select>          </div>
      </div>
	  
	  
	  
	  
	  
	    <div class="form-group row">
                            <label for="previous_balance" class="col-sm-4 col-form-label">Credit Limit<i class="text-danger">*</i></label>
          <div class="col-sm-8">
          <input class="form-control" name="previous_balance" id="previous_balance" type="text" min="0" placeholder="Credit Limit" tabindex="5" required="">
          </div>
      </div>
	  
	  

                    <div class="form-group row">

<label for="invoice_no" class="col-sm-4 col-form-label"> Sales Tax

    <i class="text-danger">*</i>

</label>

<div class="col-sm-8">

<select name="sales_taxes" class="form-control" required=""  id="tax_dropdown" tabindex="3">
                                      <option value=""selected>Select Sales Tax</option>
                                    <option value="1"><?php echo display('NO') ?></option>
                                    <option value="2"><?php echo display('YES') ?></option>
                     </select>
</div>
&nbsp;&nbsp;
<div class="form-group row" id="tax">
    <div class="row">
           <div class="col-sm-12">
    <label for="sales" class="col-sm-4 col-form-label">Sales Tax</label>
    <div class="col-sm-8">
    <select  class="form-control" name="tax" value="" tabindex="3" style="width:95%"  >
    <!-- <select name="tax" value="" tabindex="5" style="width:100%"> -->
    <option value="">Select the State</option>
<option value="Alabama">Alabama</option>
<option value="Alaska">Alaska</option>
<option value="Arizona">Arizona</option>
<option value="Arkansas">Arkansas</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Delaware">Delaware</option>
<option value="District Of Columbia">District Of Columbia</option>
<option value="Florida">Florida</option>
<option value="Georgia">Georgia</option>
<option value="Hawaii">Hawaii</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Iowa">Iowa</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Maine">Maine</option>
<option value="Maryland">Maryland</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Mississippi">Mississippi</option>
<option value="Missouri">Missouri</option>
<option value="Montana">Montana</option>
<option value="Nebraska">Nebraska</option>
<option value="Nevada">Nevada</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="New York">New York</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Vermont">Vermont</option>
<option value="Virginia">Virginia</option>
<option value="Washington">Washington</option>
<option value="West Virginia">West Virginia</option>
<option value="Wisconsin">Wisconsin</option>
<option value="Wyoming">Wyoming</option>
</select>
</div>
</div>
    </div>
    &nbsp;&nbsp;
                <div class="form-group row" id="tax">
                 <div class="col-sm-12">
                <label for="sales" class="col-sm-4 col-form-label">Tax Rates </label>
                <div class="col-sm-8">
                 <input name="taxes"  class="form-control taxes" value="" placeholder="%"   style="width:95%" tabindex="4">
                 </div>
    </div>
    </div>
</div>
</div>
</div>
                </div>
                </div>
                    <div class="modal-footer">
                        <a href="#" class="btn" style="color:white;background-color:#38469f;" data-dismiss="modal">Close</a>
                        <input type="submit" class="btn"  style="color:white;background-color:#38469f;" value="Submit">
                    </div>
                    </form>
</div>
</div>
</div>





















  <div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="margin-top: 190px;">
       <div class="modal-header" style="color:white;background-color:#38469f;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Sales - Ocean</h4>
        </div>
        <div class="modal-body" id="bodyModal1" style="font-weight:bold;text-align:center;">
          
      
     
        </div>
        <div class="modal-footer">
          
        </div>
      </div>
      
    </div>
  </div>
          <div id="myModal3" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			 <div class="modal-header" style="color:white;background-color:#38469f;">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Confirmation</h4>
			</div>
			<div class="modal-body">
				<p>Your Invoice is not submitted. Would you like to submit or discard
				</p>
				<p class="text-warning">
					<small>If you don't submit, your changes will not be saved.</small>
				</p>
			</div>
			<div class="modal-footer">
				<input type="submit" id="ok" class="btn btn-primary pull-left final_submit" onclick="submit_redirect()"  value="Submit"/>
                <button id="btdelete" type="button" class="btn btn-danger pull-left" onclick="discard()">Discard</button>
			
			</div>
		</div>
	</div>
</div>   

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script type="text/javascript">
            var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
        $(document).ready(function(){
                        $('#final_submit').hide();
$('#download').hide();
$('#print').hide(); 
            $('#insert_supplier').submit(function (event) {
    var dataString = {
        dataString : $("#insert_supplier").serialize()
   };
   dataString[csrfName] = csrfHash;
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Csupplier/insert_supplier",
        data:$("#insert_supplier").serialize(),
        success:function (data1) {
   var $select = $('select#supplier_id');
            $select.empty();
    
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].supplier_id).text(data1[i].supplier_name);
        $select.append(option); // append new options
    }
     

       $('#add_vendor').modal('hide');
     
      $("#bodyModal1").html("New Vendor Added Successfully");
      
       $('#myModal1').modal('show');
  
      
     
       window.setTimeout(function(){
        $('#myModal1').modal('hide');
        $('.modal-backdrop').remove();

 },2500);
    
        }
    });
    event.preventDefault();
});








$('#instant_customer').submit(function (event) {

var dataString = {
    dataString : $("#instant_customer").serialize()
};
dataString[csrfName] = csrfHash;
$.ajax({
    type:"POST",
    dataType:"json",
    url:"<?php echo base_url(); ?>Cinvoice/instant_customer",
    data:$("#instant_customer").serialize(),
    success:function (data1) {
 var $select = $('select#consignee');
            $select.empty();
    
              for(var i = 0; i < data1.length; i++) {
        var option = $('<option/>').attr('value', data1[i].customer_id).text(data1[i].customer_name);
        $select.append(option); // append new options
    }
      $("#instant_customer").find('input:text').val('');
   $("#bodyModal1").html("New Customer Added Successfully");
  $('#consignee').show();
  $('#myModal1').modal('show');
  $('#cust_info').modal('hide');
 

  window.setTimeout(function(){
   $('#myModal1').modal('hide');
   $('.modal-backdrop').remove();

},2500);
  //  console.log(data);
    }
});
event.preventDefault();
});














  
        });


        
        $('#insert_ocean').submit(function (event) {
    var dataString = {
        dataString : $("#insert_ocean").serialize()
    
   };
   dataString[csrfName] = csrfHash;
  
    $.ajax({
        type:"POST",
        dataType:"json",
        url:"<?php echo base_url(); ?>Cinvoice/insert_ocean_export",
        data:$("#insert_ocean").serialize(),

        success:function (data) {
        console.log(data);
        var split = data.split("/");
        var input_hdn="Ocean Export Created Successfully";
   $('#final_submit').show();
 $('#download').show();
 $('#print').show(); 
  console.log(input_hdn);
  $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
         window.setTimeout(function(){
        $('.modal').modal('hide');
       
$('.modal-backdrop').remove();
 },2500);
           $('#invoice_hdn').val(split[0]);
           $('#invoice_hdn1').val(split[1]);
       }

    });
    event.preventDefault();
});

$('#customer_modal').on('click',function (e){
 $('#cust_info').modal('show');
   e.preventDefault();
});
$('#download').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/ocean_export_tracking_details_data/"+link);
 
  

});  

$('#print').on('click', function (e) {
var link= $('#invoice_hdn').val();
console.log(link);
 var popout = window.open("<?php  echo base_url(); ?>Cinvoice/ocean_export_tracking_details_data_print/"+link);
 
  

});



$('#tax_dropdown').on('change', function() {
  if ( this.value == '2')
    $("#tax").show();     
  else
    $("#tax").hide();
}).trigger("change");


$('#add_purchase').on('click', function (e) {
    
//     $('#myModal1').modal('show');
//     window.setTimeout(function(){
//         $('.modal').modal('hide');
       
// $('.modal-backdrop').remove();
//  },2500);

// $('#final_submit').show();
// $('#download').show();
// $('#print').show();   
});
function discard(){
   $.get(
    "<?php echo base_url(); ?>Cinvoice/delete_ocean_export/", 
   { val: $("#invoice_hdn1").val(), csrfName:csrfHash }, // put your parameters here
   function(responseText){
    console.log(responseText);
    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking No :"+$('#invoice_hdn1').val()+" has been Discarded";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
   }
); 
}
     function submit_redirect(){
        window.btn_clicked = true;      //set btn_clicked to true
        var input_hdn="Your Booking List No :"+$('#invoice_hdn1').val()+" has been Created Successfully";
  
    console.log(input_hdn);
    $('#myModal3').modal('hide');
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
     }

$('#final_submit').on('click', function (e) {

    window.btn_clicked = true;      //set btn_clicked to true
    var input_hdn="Your Booking  No :"+$('#invoice_hdn1').val()+" has been Created Successfully";
  
    console.log(input_hdn);
    $("#bodyModal1").html(input_hdn);
        $('#myModal1').modal('show');
    window.setTimeout(function(){
       

        window.location = "<?php  echo base_url(); ?>Cinvoice/manage_ocean_export_tracking";
      }, 2000);
       
});

window.onbeforeunload = function(){
    if(!window.btn_clicked){
       // window.btn_clicked = true; 
        $('#myModal3').modal('show');
       return false;
    }
}

    </script>
 






