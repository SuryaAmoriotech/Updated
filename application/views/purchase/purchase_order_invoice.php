<!-- Purchase Payment Ledger Start -->

<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1>Purchase Order Invoice</h1>
	        <small>Purchase Order Invoice</small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#">Purchase Order Invoice</a></li>
	            <li class="active">Purchase Order Invoice</li>
	        </ol>
	    </div>
	</section>


	<!-- Invoice information -->
	<section class="content">
    <?php
  $myArray = explode('(',$invoice[0]['tax_details']); 
 $tax_amt=$myArray[0];
 $tax_des=$myArray[1];

?>

           <?php // echo $match[0];  ?>     
    <div class="container" id="content">
    <?php 

                      
if($invoice_setting[0]['template']==2)
{
  ?>    <div class="brand-section" style="background-color:<?php echo $color; ?>">
  <div class="row" >
  

  


  <div class="col-sm-2"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 100%;'> </div>

        
<div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>

<div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>          
  <b> Company name : </b><?php echo $cname; ?><br>
  <b>   Address : </b><?php echo $address; ?><br>
  <b>   Email : </b><?php echo $email; ?><br>
  <b>   Contact : </b><?php echo $phone; ?><br>
  </div>



  </div>
  </div>
  <div class="body-section">
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['purchase_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Vendor Address</td><td style="width:10px;">:</td><td calss="value"><?php echo  $invoice[0]['address']; ?> </br>  <?php echo $invoice[0]['city']."\n".$invoice[0]['state'] ."\n". $invoice[0]['zip']  ."\n". $invoice[0]['country']  ."\n". $invoice[0]['primaryemail']   ."\n". $invoice[0]['mobile']  ;       ?>  </td></tr>


</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?><?php  echo "%"; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['shipment_terms'] ; ?></td></tr>

<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
  <div class="table-responsive">
     
   <div id="content">     
                     <?php 


for($m=1;$m<count($purchase_detail);$m++){ 
    ?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                              <thead style="background-color:<?php echo $color; ?>">
                                     <tr>
                                         <th rowspan="1" class="text-center" style="width:4px;" >Product Name </th>
                                            <th rowspan="1" class="text-center" style="width:1px;">Bundle No</th>
                                            <th rowspan="1"  class="text-center"style="width:2px;">Descri</br>ption</th>
                                            <th rowspan="1" class="text-center" style="width:2px;">Thick ness</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Supp</br>lier Block No</th>

                                            <th rowspan="1" class="text-center" style="width:2px;">Supp</br>lier Slab</br> No</th>
                                            <th colspan="2"  class="text-center text-white"style="width:5px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:3px;">Gross</br> Sq.Ft</th>
                                           
                                            <th rowspan="1" style="width:8px;" class="text-center"style="width:2px;">Slab </br>No</th>
                                            <th colspan="2" class="text-center text-white"style="width:5px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Net </br>Sq.</br>Ft</th>
                                            <th rowspan="1"  class="text-center"style="width:3px;">Cost per Sq.</br>Ft</th>
                                            <th rowspan="1"   class="text-center"style="width:3px;">Cost per Slab</th>
                                           
                                            
                                            <th rowspan="1"  class="text-center"style="width:3px;">Origin</th>
                                           
                                            <th rowspan="1"  class="text-center">Total</th>
                                          
                                        </tr>

                                        

                                </thead>
                 
                                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_detail as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                    <td style="font-size: 8px;"><?php  echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['description'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_block_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_slab_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_height'];  ?></td>
                                      
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="gross_sqft_<?php echo $m;  ?>" name="gross_sqft[]" value="<?php  echo $inv['gross_sqft'];  ?>" class="gross_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $n+1;  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_height'];  ?></td>
                                       
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="net_sqft_<?php echo $m;  ?>" name="net_sqft[]" value="<?php  echo $inv['net_sqft'];  ?>" class="net_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_sqft'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_slab'];  ?></td>
                                       
                                        <td style="font-size: 8px;"><?php  echo $inv['origin'];  ?></td>
                                      

                                           <!-- <td style="font-size: 8px;" class="total_price">
                                                  <?php  echo $inv['total_amount'];  ?></span>
                                            </td> -->
                                               
                                          <td style="font-size: 9px;" >
                       <table><tr><td style=" border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
</td>
                                              
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot >
                                    <tr>
                                    <td style="text-align:right;font-size: 8px;" colspan="8"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross " style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;font-size: 8px;" colspan="3"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net "  style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
<!-- <td style="text-align:right;font-size: 8px;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight " style="width: 20px;font-size: 8px;"    readonly="readonly"  /> 
            </td>  -->
            <td style="text-align:right;font-size: 8px;" colspan="3"><b>TOTAL:</b></td>
            
               <td style="text-align:left;border:none;font-size: 8px;">  <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;font-size: 9px;border:none;text-align:left;"    readonly="readonly"  />
                            
  
            <!-- <td style="text-align:right;" colspan="1"><b>TOTAL:</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
            </td> -->
                           
                                    </tr>
  
                                            </tfoot>
                            </table>
                            <?php   } ?>
                          
                         </div> </div>
                                           
<table border="0" class="overall table table-hover" style="border:none;">
  
  <tr style="border:none;">
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall TOTAL :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $purchase_detail[0]['total'];  ?> </td>
         <!-- <td colspan="4" style="text-align:right;border:none;"><b>TAX DETAILS :</b></td><td colspan="1" style="border:none;">  <?php  echo $currency ; ?>    <?php echo $purchase_detail[0]['tax_details'];  ?></td> -->
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_details;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Gross Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['grand_total_amount'];   ?></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b><br/><b>Preferred Currency</b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"><?php  echo $supplier_currency." ". $purchase_info[0]['gtotal_preferred_currency'];   ?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b>Overall Weight :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_amount'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b>Amount Paid :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $supplier_currency." ".$purchase_detail[0]['paid_amount'];  ?></td> 
     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b>Balance Amount :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>                     
                                            </td>     </tr>
   </table>
                                            </td>
                                            </tr> 
											</table>
                        </div>

<br>
<h4>Remarks :</h4><?= $invoice[0]['remarks']; ?><br>
<h4>Message on Invoice :</h4><?= $invoice[0]['message_invoice']; ?><br>

</div>

<?php 
  
  }

elseif($invoice_setting[0]['template']==1)
{
  ?>    <div class="brand-section" style="background-color:<?php echo $color; ?>">
  <div class="row" >
  





 



        <div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
   
        <b> Company name : </b><?php echo $cname; ?><br>
  <b>   Address : </b><?php echo $address; ?><br>
  <b>   Email : </b><?php echo $email; ?><br>
  <b>   Contact : </b><?php echo $phone; ?><br>
 </div>
 
 
 
 
 <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>
 
 <div class="col-sm-3"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 70%;'></div>
 
 






  </div>
  </div>
  <div class="body-section">
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['purchase_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Vendor Address</td><td style="width:10px;">:</td><td calss="value"><?php echo  $invoice[0]['address']; ?> </br>  <?php echo $invoice[0]['city']."\n".$invoice[0]['state'] ."\n". $invoice[0]['zip']  ."\n". $invoice[0]['country']  ."\n". $invoice[0]['primaryemail']   ."\n". $invoice[0]['mobile']  ;       ?>  </td></tr>


</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?><?php  echo "%"; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['shipment_terms'] ; ?></td></tr>

<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
  <div class="table-responsive">
     
   <div id="content">     
                     <?php 


for($m=1;$m<count($purchase_detail);$m++){ 
    ?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                              <thead style="background-color:<?php echo $color; ?>">
                                     <tr>
                                         <th rowspan="1" class="text-center" style="width:4px;" >Product Name </th>
                                            <th rowspan="1" class="text-center" style="width:1px;">Bundle No</th>
                                            <th rowspan="1"  class="text-center"style="width:2px;">Descri</br>ption</th>
                                            <th rowspan="1" class="text-center" style="width:2px;">Thick ness</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Supp</br>lier Block No</th>

                                            <th rowspan="1" class="text-center" style="width:2px;">Supp</br>lier Slab</br> No</th>
                                            <th colspan="2"  class="text-center text-white"style="width:5px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:3px;">Gross</br> Sq.Ft</th>
                                           
                                            <th rowspan="1" style="width:8px;" class="text-center"style="width:2px;">Slab </br>No</th>
                                            <th colspan="2" class="text-center text-white"style="width:5px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Net </br>Sq.</br>Ft</th>
                                            <th rowspan="1"  class="text-center"style="width:3px;">Cost per Sq.</br>Ft</th>
                                            <th rowspan="1"   class="text-center"style="width:3px;">Cost per Slab</th>
                                           
                                            
                                            <th rowspan="1"  class="text-center"style="width:3px;">Origin</th>
                                           
                                            <th rowspan="1"  class="text-center">Total</th>
                                          
                                        </tr>

                                        

                                </thead>
                 
                                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_detail as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                    <td style="font-size: 8px;"><?php  echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['description'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_block_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_slab_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_height'];  ?></td>
                                      
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="gross_sqft_<?php echo $m;  ?>" name="gross_sqft[]" value="<?php  echo $inv['gross_sqft'];  ?>" class="gross_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $n+1;  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_height'];  ?></td>
                                       
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="net_sqft_<?php echo $m;  ?>" name="net_sqft[]" value="<?php  echo $inv['net_sqft'];  ?>" class="net_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_sqft'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_slab'];  ?></td>
                                       
                                        <td style="font-size: 8px;"><?php  echo $inv['origin'];  ?></td>
                                      

                                           <!-- <td style="font-size: 8px;" class="total_price">
                                                  <?php  echo $inv['total_amount'];  ?></span>
                                            </td> -->
                                               
                                          <td style="font-size: 9px;" >
                       <table><tr><td style=" border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
</td>
                                              
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot >
                                    <tr>
                                    <td style="text-align:right;font-size: 8px;" colspan="8"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross " style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;font-size: 8px;" colspan="3"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net "  style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
<!-- <td style="text-align:right;font-size: 8px;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight " style="width: 20px;font-size: 8px;"    readonly="readonly"  /> 
            </td>  -->
            <td style="text-align:right;font-size: 8px;" colspan="3"><b>TOTAL:</b></td>
            
               <td style="text-align:left;border:none;font-size: 8px;">  <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;font-size: 9px;border:none;text-align:left;"    readonly="readonly"  />
                            
  
            <!-- <td style="text-align:right;" colspan="1"><b>TOTAL:</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
            </td> -->
                           
                                    </tr>
  
                                            </tfoot>
                            </table>
                            <?php   } ?>
                          
                         </div> </div>
                                           
<table border="0" class="overall table table-hover" style="border:none;">
  
  <tr style="border:none;">
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall TOTAL :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $purchase_detail[0]['total'];  ?> </td>
         <!-- <td colspan="4" style="text-align:right;border:none;"><b>TAX DETAILS :</b></td><td colspan="1" style="border:none;">  <?php  echo $currency ; ?>    <?php echo $purchase_detail[0]['tax_details'];  ?></td> -->
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_details;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Gross Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['grand_total_amount'];   ?></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b><br/><b>Preferred Currency</b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"><?php  echo $supplier_currency." ". $purchase_info[0]['gtotal_preferred_currency'];   ?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b>Overall Weight :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_amount'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b>Amount Paid :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $supplier_currency." ".$purchase_detail[0]['paid_amount'];  ?></td> 
     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b>Balance Amount :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>                     
                                            </td>     </tr>
   </table>
                                            </td>
                                            </tr> 
											</table>
                        </div>

<br>
<h4>Remarks :</h4><?= $invoice[0]['remarks']; ?><br>
<h4>Message on Invoice :</h4><?= $invoice[0]['message_invoice']; ?><br>

</div>

<?php 
  
  }
  
                      
if($invoice_setting[0]['template']==3)
{
?>    <div class="brand-section" style="background-color:<?php echo $color; ?>">
<div class="row" >

<div class="col-sm-2 text-center" style="color:white;"><h3><?php echo $invoice_setting[0]['header']; ?></h3></div>


<div class="col-sm-4"><img src="<?php echo  base_url().'assets/'.$invoice_setting[0]['logo']; ?>" style='width: 30%;float:right;'></div>


<div class="col-sm-6" style="color:white;font-weight:bold ;text-align: end;" id='company_info'>
<b> Company name : </b><?php echo $cname; ?><br>
  <b>   Address : </b><?php echo $address; ?><br>
  <b>   Email : </b><?php echo $email; ?><br>
  <b>   Contact : </b><?php echo $phone; ?><br>
</div>


    



</div>
</div>
<div class="body-section">
<div class="row">
<div class="col-6">
<table id="one" >
<tr><td  class="key">Vendor</td><td style="width:10px;">:</td><td calss="value"><?php echo  $supplier[0]['supplier_name'];  ?></td></tr>
<tr><td  class="key">Purchase Order Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['purchase_date']; ?></td></tr>
<tr><td  class="key">Created By</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['create'] ; ?></td></tr>
<tr><td  class="key">Vendor Address</td><td style="width:10px;">:</td><td calss="value"><?php echo  $invoice[0]['address']; ?> </br>  <?php echo $invoice[0]['city']."\n".$invoice[0]['state'] ."\n". $invoice[0]['zip']  ."\n". $invoice[0]['country']  ."\n". $invoice[0]['primaryemail']   ."\n". $invoice[0]['mobile']  ;       ?>  </td></tr>


</table>

</div>
<div class="col-6">
<table id="two">

<tr><td  class="key">Ship To</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['ship_to']; ?></td></tr>
<tr><td class="key">P.O Number</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['chalan_no'] ; ?></td></tr>
<tr><td  class="key">Payment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['payment_terms']; ?><?php  echo "%"; ?></td></tr>
<tr><td  class="key">Shipment Terms</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['shipment_terms'] ; ?></td></tr>

<tr><td  class="key">Est.Shipment Date</td><td style="width:10px;">:</td><td calss="value"><?= $invoice[0]['est_ship_date']; ?></td></tr>
</table>

</div>
</div>
</div>
<div class="body-section">
  <div class="table-responsive">
     
   <div id="content">     
                     <?php 


for($m=1;$m<count($purchase_detail);$m++){ 
    ?>
<table class="table table-bordered normalinvoice table-hover" id="normalinvoice_<?php  echo $m; ?>" >
                              <thead style="background-color:<?php echo $color; ?>">
                                     <tr>
                                         <th rowspan="1" class="text-center" style="width:4px;" >Product Name </th>
                                            <th rowspan="1" class="text-center" style="width:1px;">Bundle No</th>
                                            <th rowspan="1"  class="text-center"style="width:2px;">Descri</br>ption</th>
                                            <th rowspan="1" class="text-center" style="width:2px;">Thick ness</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Supp</br>lier Block No</th>

                                            <th rowspan="1" class="text-center" style="width:2px;">Supp</br>lier Slab</br> No</th>
                                            <th colspan="2"  class="text-center text-white"style="width:5px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:3px;">Gross</br> Sq.Ft</th>
                                           
                                            <th rowspan="1" style="width:8px;" class="text-center"style="width:2px;">Slab </br>No</th>
                                            <th colspan="2" class="text-center text-white"style="width:5px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                                            <th rowspan="1" class="text-center"style="width:2px;">Net </br>Sq.</br>Ft</th>
                                            <th rowspan="1"  class="text-center"style="width:3px;">Cost per Sq.</br>Ft</th>
                                            <th rowspan="1"   class="text-center"style="width:3px;">Cost per Slab</th>
                                           
                                            
                                            <th rowspan="1"  class="text-center"style="width:3px;">Origin</th>
                                           
                                            <th rowspan="1"  class="text-center">Total</th>
                                          
                                        </tr>

                                        

                                </thead>
                 
                                <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_detail as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                                    <tr>
                                    <td style="font-size: 8px;"><?php  echo $inv['product_name'].'-'.$inv['product_model'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['description'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_block_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['supplier_slab_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['g_height'];  ?></td>
                                      
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="gross_sqft_<?php echo $m;  ?>" name="gross_sqft[]" value="<?php  echo $inv['gross_sqft'];  ?>" class="gross_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['bundle_no'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $n+1;  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_width'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $inv['n_height'];  ?></td>
                                       
                                        <td style="font-size: 8px;" ><input type="text"   style="border:none;width:4px" readonly id="net_sqft_<?php echo $m;  ?>" name="net_sqft[]" value="<?php  echo $inv['net_sqft'];  ?>" class="net_sqft"/></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_sqft'];  ?></td>
                                        <td style="font-size: 8px;"><?php  echo $currency ; ?><?php  echo $inv['cost_per_slab'];  ?></td>
                                       
                                        <td style="font-size: 8px;"><?php  echo $inv['origin'];  ?></td>
                                      

                                           <!-- <td style="font-size: 8px;" class="total_price">
                                                  <?php  echo $inv['total_amount'];  ?></span>
                                            </td> -->
                                               
                                          <td style="font-size: 9px;" >
                       <table><tr><td style=" border: none !important;">
                       <?php  echo $currency;  ?></td><td style=" font-size: 9px;text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;"   value="<?php  echo $inv['total_amount'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table>
</td>
                                              
                                            
                                            </tr>
                                            
                                            <?php $n++;   } }  ?>
                                            </tbody>
                                <tfoot >
                                    <tr>
                                    <td style="text-align:right;font-size: 8px;" colspan="8"><b>Gross Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_gross_<?php echo $m; ?>" name="overall_gross[]"    class="overall_gross " style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
             <td style="text-align:right;font-size: 8px;" colspan="3"><b>Net Sq.Ft :</b></td>
                                        <td >
             <input type="text" id="overall_net_<?php echo $m; ?>" name="overall_net[]"  class="overall_net "  style="width: 20px;font-size: 8px;border:none;"   readonly="readonly"  /> 
            </td>
<!-- <td style="text-align:right;font-size: 8px;" colspan="4"><b>Weight :</b></td>
                                        <td >
             <input type="text" id="overall_weight_<?php echo $m; ?>" name="overall_weight[]"  class="overall_weight " style="width: 20px;font-size: 8px;"    readonly="readonly"  /> 
            </td>  -->
            <td style="text-align:right;font-size: 8px;" colspan="3"><b>TOTAL:</b></td>
            
               <td style="text-align:left;border:none;font-size: 8px;">  <input type="text" id="Total_<?php echo $m; ?>" name="total[]"   class="b_total"   style="padding-top: 6px;font-size: 9px;border:none;text-align:left;"    readonly="readonly"  />
                            
  
            <!-- <td style="text-align:right;" colspan="1"><b>TOTAL:</b></td>
                                        <td >
           <span class="input-symbol-euro">    <input type="text" id="Total_1" name="total[]"   class="b_total form-control"  style="width: 80px" value="0.00"  readonly="readonly"  /> </span>
            </td> -->
                           
                                    </tr>
  
                                            </tfoot>
                            </table>
                            <?php   } ?>
                          
                         </div> </div>
                                           
<table border="0" class="overall table table-hover" style="border:none;">
  
  <tr style="border:none;">
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall TOTAL :</b></td>
        <td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php echo $purchase_detail[0]['total'];  ?> </td>
         <!-- <td colspan="4" style="text-align:right;border:none;"><b>TAX DETAILS :</b></td><td colspan="1" style="border:none;">  <?php  echo $currency ; ?>    <?php echo $purchase_detail[0]['tax_details'];  ?></td> -->
        
   
    <td style="text-align:right;border:none;" colspan="5"><b><?php echo  "Tax (".$tax_des;  ?></b></td>
                                 
                                 <td style='border:none;'><?php  echo $currency; ?><?php echo $tax_details;  ?></td>
        

</tr>
   <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Gross Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_gross'];  ?></td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b></td><td colspan="1" style="border:none;"><?php  echo $currency ; ?><?php  echo $purchase_info[0]['grand_total_amount'];   ?></td>
</tr>
    <tr>
        <td  colspan="2" style="vertical-align:top;text-align:right;border:none;"><b>Overall Net Sq.Ft :</b></td>
        <td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_net'];  ?>   </td>
         <td colspan="5" style="text-align:right;border:none;"><b>GRAND TOTAL :</b><br/><b>Preferred Currency</b></td><td colspan="1" style="border:none;"> <table><tr> <td class="cus" name="cus" style="border:none;"></td> <td style="border:none;text-align:left;"><?php  echo $supplier_currency." ". $purchase_info[0]['gtotal_preferred_currency'];   ?></td></tr></table></td>
        
                      
                  
</tr>

    <tr>
        <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"><b>Overall Weight :</b></td><td colspan="1" style="border:none;"><?php echo  $purchase_detail[0]['total_amount'];  ?> </td>
         <td colspan="5" class="amt" style="text-align:right;border:none;"><b>Amount Paid :</b></td><td style="border:none;"> 
                                        <table border="0">
      <tr class="amt">

        <td class="cus" name="cus" style="text-align:left;"></td>
<td>  <?php echo $supplier_currency." ".$purchase_detail[0]['paid_amount'];  ?></td> 
     </tr>
   </table>
  </td>
                                            </tr> 
                                           <tr>
      <td colspan="2"  style="vertical-align:top;text-align:right;border:none;"></td><td colspan="1" style="border:none;"></td>
        <td class="amt" colspan="5"  style="vertical-align:top;text-align:right;border:none;"><b>Balance Amount :</b></td>
        <td class="amt" style="border:none;" colspan="1">
            <table border="0">
      <tr class="amt">
        <td class="cus" name="cus" style="border:none;"></td>  <td style="border:none;">
                                          <?php echo $supplier_currency." ".$purchase_detail[0]['due_amount'];  ?>                     
                                            </td>     </tr>
   </table>
                                            </td>
                                            </tr> 
											</table>
                        </div>

<br>
<h4>Remarks :</h4><?= $invoice[0]['remarks']; ?><br>
<h4>Message on Invoice :</h4><?= $invoice[0]['message_invoice']; ?><br>

</div>

<?php 

}
?>


</div>
</section>
</div>
<!-- Purchase ledger End  -->
<div class="modal fade" id="myModal1" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" id="myModal_epurchase" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="color:white;background-color:#38469f;">
      
          <h4 class="modal-title">Expenses - Purchase Order</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>Purchase Order Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
  </div>
  <style>
#content{
  padding:30px;
}
.key{
    border:none;
    text-align:left;
font-weight:bold;

}
.value{
    border:none;
    text-align:left;
}
#one,#two{
float:left;
width:100%;
}
body{
    background-color: #38469f; 
    margin: 0;
    
}
h1,h2,h3,h4,h5,h6{
    margin: 0;
    padding: 0;
}
p{
    margin: 0;
    padding: 0;
}
.heading_name{
    font-weight: bold;
}
.container{
    width: 100%;
    margin-right: auto;
    margin-left: auto;
    margin-top: 50px;
}
.brand-section{
   /* background-color: #5961b3; */
   padding: 10px 40px;
}
.logo{
    width: 50%;
}
th{
    font-size:8px;
    width:10%;
}
.row{
    display: flex;
    flex-wrap: wrap;
    
}
.col-6{
    width: 50%;
    flex: 0 0 auto;
    padding-left: 10px;
   
}
.text-white{
    color: #fff;
}
.company-details{
    float: right;
    text-align: right;
}

.body-section{
    padding: 0px;
    
}
.heading{
    font-size: 20px;
    margin-bottom: 08px;
}
.sub-heading{
    color: #262626;
    margin-bottom: 05px;
}
table{
   
    background-color: #fff;
    width: 100%;
    border-collapse: collapse;
   
}

table thead tr{
    border: 1px solid #111;
    /* background-color: #5961b3; */
    
}
.table-bordered td{
    text-align:center;
}
table td {
    vertical-align: middle !important;
  
    word-wrap: break-word;
}
th{
    text-align:center;
    color:white;
    font-size:8px;
}

table th, table td {
    /* padding-top: 08px;
    padding-bottom: 08px; */
}
.table-bordered{
    box-shadow: 0px 0px 5px 0.5px gray !important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #dee2e6 !important;
}
.text-right{
    text-align: right;
}
.w-20{
    width: 20%;
}
.float-right{
    float: right;
}
@media only screen and (max-width: 600px) {
    
}
.modal {
  position: fixed;
  top: 0;
  left: 0;
  display: flex;
  width: 100%;
  height: 100vh;
  justify-content: center;
  align-items: center;
  opacity: 0;
  visibility: hidden;
}

.modal .content {
  position: relative;
  padding: 10px;
 
  border-radius: 8px;
  background-color: #fff;
  box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
  transform: scale(0);
  transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
  position: absolute;
  top: 5px;
  right: 5px;
  width: 30px;
  height: 30px;
  cursor: pointer;
  border-radius: 8px;
  background-color: #7080af;
  clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
    background-color:#38469f;
  opacity: 1;
  visibility: visible;
}
.modal.open .content {
  transform: scale(1);
}
.content-wrapper.blur {
  filter: blur(5px);
}
.content {
    min-height: 0px;
}
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
 $(document).ready(function(){
                    
 $(".normalinvoice").each(function(i,v){
   if($(this).find("tbody").html().trim().length === 0){
       $(this).hide()
   }
})
      $('.normalinvoice').each(function(){
var tid=$(this).attr('id');
 const indexLast = tid.lastIndexOf('_');
var idt = tid.slice(indexLast + 1);


  if ($(".normalinvoice td:not(:empty)").length == 0){
    alert("hurru");
    $(".normalinvoice").hide();
  }


  var sum=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.total_price').each(function() {
var v=$(this).val();
  sum += parseFloat(v);

});
 $(this).closest('table').find('#Total_'+idt).val("<?php echo $currency;  ?>"+sum.toFixed(3));
  var sum_gross=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.gross_sqft').each(function() {
var v=$(this).val();
  sum_gross += parseFloat(v);

});
 $(this).closest('table').find('#overall_gross_'+idt).val(sum_gross.toFixed(3));

  var sum_net=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.net_sqft').each(function() {
var v=$(this).val();
  sum_net += parseFloat(v);

});

 $(this).closest('table').find('#overall_net_'+idt).val(sum_net.toFixed(3));
   var sum_weight=0;

 $('#normalinvoice_'+idt  +  '> tbody > tr').find('.weight').each(function() {
var v=$(this).val();
  sum_weight += parseFloat(v);

});

 $(this).closest('table').find('#overall_weight_'+idt).val(sum_weight.toFixed(3));
    

    });
});
$(document).ready(function () {
function first(callback1,callback2){
setTimeout( function(){
    var pdf = new jsPDF('p','pt','a4');
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
  lineHeight : 1.2,
  margin : 0,
  maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
  }
  }).save('chalan_no_<?php echo $invoice[0]['chalan_no'].'.pdf'  ?>');
    callback1();
    callback2();
 }, 4000 );
}
function second(){
setTimeout( function(){
    $( '#myModal1' ).addClass( 'open' );
if ( $( '#myModal1' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal1' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 4500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cpurchase/manage_purchase_order';
        window.close();
    }, 5000 );
}
first(second,third);
});

</script>
