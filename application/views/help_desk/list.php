<!-- Manage service Start -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('Help Content') ?></h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('Help Desk') ?></a></li>

                <li class="active" style="color:orange;"><?php echo display('Manage Desk') ?></li>

            </ol>

        </div>

    </section>



    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>



        <div class="row">

            <div class="col-sm-12">

                

 <?php if($this->permission1->method('create_service','create')->access()){ ?>

                    <a href="<?php echo base_url('Cservice/add_content') ?>" class="btn btn-info m-b-5 m-r-2"><i class="ti-plus"> </i> Add Help Desk Content </a>

<?php }?>









            </div>

        </div>



        <!-- Manage service -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                        <div class="panel-title">

                        

                        </div>

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive">

                            <table id="" class="table table-bordered table-striped table-hover datatable">

                                <thead>

                                    <tr style="height:30px;">

                                        <th class="text-center"><?php echo display('sl') ?></th>

                                        <th class="text-center"><?php echo display('Title') ?></th>

                                       

                                         <th class="text-center"><?php echo display('Description') ?></th>

                                      

                                    </tr>

                                </thead>

                                <tbody>

                                    <?php

                                    if ($service_list) {

                                        $sl=1;

                                        foreach ($service_list as $services) {

                                         

                                        ?>

                                        

                                        <tr>

                            <td class="text-center"><?php echo $sl;?></td>

                            <td class="text-center"><?php echo html_escape($services['title']);?></td>

                          

                            <td class="text-center"><?php echo html_escape($services['description']);?></td>

                            
                                    <center>


                                            <?php echo form_close() ?>

                                    </center>

                                    </td>

                                    </tr>

                                   

                                    <?php $sl++;}

                                }

                                ?>

                                </tbody>

                            </table>

                        </div>

                    </div>

                </div>

            </div>

            <div id="service_csv" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title"><?php echo display('service_csv_upload'); ?></h4>

      </div>

      <div class="modal-body">



                <div class="panel">

                    <div class="panel-heading">

                        

                            <div><a href="<?php echo base_url('assets/data/csv/service_csv_sample.csv') ?>" class="btn btn-primary pull-right"><i class="fa fa-download"></i><?php echo display('download_sample_file')?> </a> </div>

                       

                    </div>

                    

                    <div class="panel-body">

                       

                      <?php echo form_open_multipart('Cservice/uploadCsv_service',array('class' => 'form-vertical', 'id' => 'validate','name' => 'insert_service'))?>

                            <div class="col-sm-12">

                                <div class="form-group row">

                                    <label for="upload_csv_file" class="col-sm-4 col-form-label"><?php echo display('upload_csv_file') ?> <i class="text-danger">*</i></label>

                                    <div class="col-sm-8">

                                        <input class="form-control" name="upload_csv_file" type="file" id="upload_csv_file" placeholder="<?php echo display('upload_csv_file') ?>" required>

                                    </div>

                                </div>

                            </div>

                        

                       <div class="col-sm-12">

                        <div class="form-group row">

                            <div class="col-sm-12 text-right">

                                <input type="submit" id="add-product" class="btn btn-primary btn-large" name="add-product" value="<?php echo display('submit') ?>" />

                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo display('Close' )?></button>

                               

                            </div>

                        </div>

                        </div>

                          <?php echo form_close()?>

                    </div>

                    </div>

                  

               

     

      </div>

     

    </div>



  </div>

</div>

        </div>

    </section>

</div>

<!-- Manage service End -->

