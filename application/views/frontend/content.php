<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VISA แรงงาน 3 สัญชาติ</title>
    <link rel="shortcut icon" href="<?=base_url('assets');?>/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?=base_url('assets');?>/favicon.ico" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?=base_url('assets');?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">


    <!-- Custom styles for this template-->
    <link href="<?=base_url('assets');?>/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?=base_url('assets');?>/vendor/bootstrap-datepicker-thai/css/datepicker.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/');?>css/custom.css">

</head>

<body class="bg-gradient-primary">

    <div class="container">
             <!-- Topbar -->
        <div class="d-sm-block d-md-none">
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-2 static-top" style="height:100px;">
                <div class="p-1" style="position: absolute;left: 12%;top:10px">
                    <span>
                        <img src="<?=base_url('assets/img/logo.png');?>" alt="logo" width="60px">
                    </span>
                    <span class="mt-3" style="color: #fff;display: inline-block;vertical-align: middle;">
                        ตรวจคนเข้าเมืองจังหวัดลำพูน
                        <p style="color: #fff;font-size:14px">LAMPHUN IMMIGRATION</p>
                    </span>
                </div>
            
                <!-- <form id="form-search" action="<?=base_url('main/search');?>" method="get"
                    class=" d-sm-inline-block form-inline mr-auto ml-md-2  my-md-0 mw-100 navbar-search" style="position: absolute;right:0px;top:100px">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="ค้นหาจากเบอร์โทร"
                            aria-label="Search" aria-describedby="basic-addon2" name="telno">
                        <div class="input-group-append">
                            <button class="btn btn-danger" type="submit" >
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
            </nav>
        </div>
        
        <div class="d-none d-md-block">
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-2 static-top">
                <div class="p-1" style="position: absolute;left:0px;">
                    <span>
                        <img src="<?=base_url('assets/img/logo.png');?>" alt="logo" width="60px">
                    </span>
                    <span class="mt-3" style="color: #fff;width: 300px;display: inline-block;vertical-align: middle;">
                        ตรวจคนเข้าเมืองจังหวัดลำพูน
                        <p style="color: #fff;font-size:14px">LAMPHUN IMMIGRATION</p>
                    </span>
                   
                </div>
        
            </nav>
        </div>

      
       
            <!-- End of Topbar -->

        <div class="card o-hidden border-0 shadow-lg my-1">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                 
                    <div class="col-lg-12">
                        <div class="p-3">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">ระบบนัดหมายการขออยู่ต่อในราชอาณาจักร (VISA) แรงงาน 3 สัญชาติ</h1>
                                <p>(ทั้งกลุ่ม <a class="text-secondary" href="<?=base_url('main');?>">MOU</a> และกลุ่มอื่น ๆ ตามมติ ครม.)</p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                               <h5> ระบุเดือนและวันที่ต้องการนัดหมาย ยกเว้นวันหยุดราชการและวันหยุดนักขัตฤกษ์</h5>
                              <p>  Time interval between in business day</p>
                                </div>
                            </div>
                            <form class="user" id="form-register"  method="post" action="<?=base_url('/main/save_regis');?>">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">เลือกวันนัดหมาย <small class="text-danger">*</small><br/>(Choose an appointment date)</label>
                                        <input type="text" class="form-control " name="qdate" id="datepicker" placeholder="" required>
                                        <input type="hidden" id="check_date" value="<?=$check_date;?>">
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">ช่วงเวลา <small class="text-danger">*</small><br/>(Choose an appointment date)</label>
                                        <select name="time_period" id="time_period" class="form-control " >
                                            <option value="">เลือก</option>
                                            <?php foreach ($times as $key => $value) :?>
                                                <option <?=$check[$value->period_id] ? 'disabled':'';?> value="<?=$value->period_id;?>"><?=$value->time_str .'-'.$value->time_end;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="" class="text-gray-900">หมายเลขโทรศัพท์นายจ้าง <small class="text-danger">*</small><br/>(Telephone number)</label>
                                        <input type="text" name="employer_tel" id="employer_tel" class="form-control "
                                            id="exampleRepeatPassword" placeholder="" required autocomplete="off">
                                    </div>
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">คำนำหน้านายจ้าง <small class="text-danger">*</small><br/>(Prename)</label>
                                        <input type="text" name="emp_title" id="emp_title" class="form-control "
                                            placeholder="" required>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">ชื่อ-สกุลนายจ้าง <small class="text-danger">*</small><br/>(Name of Employer)</label>
                                        <input type="text" name="employer_name" id="employer_name" class="form-control "
                                            id="exampleInputPassword" placeholder="" required>
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">คำนำหน้าแรงงานต่างด้าว <small class="text-danger">*</small><br/>(Name title of Labour)</label>
                                        <select name="labour_title" id="labour_title" class="form-control " >
                                            <option value="">เลือก</option>
                                            <?php foreach ($prename as $key => $value) :?>
                                                <option value="<?=$value->title_name;?>"><?=$value->title_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="text-gray-900">ชื่อ-สกุลแรงงานต่างด้าว <small class="text-danger">*</small><br/>(Name of Labor)</label>
                                        <input type="text" name="labour_name" id="labour_name" class="form-control "
                                            id="exampleRepeatPassword" placeholder="" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="" class="text-gray-900">เลขหนังสือเดินทาง <small class="text-danger">*</small><br/>(Passport No)</label>
                                        <input type="text" name="passport_no" id="passport_no" class="form-control "
                                            id="exampleRepeatPassword" placeholder="" required>
                                        <p class="text-danger text-center">***หนังสือเดินทางยังไม่หมดอายุ***</p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="" class="text-gray-900">เพศ <small class="text-danger">*</small><br/>(Genders)</label>
                                        <select name="labour_genders" id="labour_genders" class="form-control " >
                                            <option value="">เลือก</option>
                                            <?php foreach ($genders as $key => $value) :?>
                                                <option value="<?=$value->gend_name;?>"><?=$value->gend_name;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="" class="text-gray-900">สัญชาติ <small class="text-danger">*</small><br/>(Nationality)</label>
                                        <select name="labour_nation" id="labour_nation" class="form-control " >
                                            <option value="">เลือก</option>
                                            <?php foreach ($nation as $key => $value) :?>
                                                <option value="<?=$value->shot_name;?>"><?=$value->nation_name.' ('.$value->shot_name.')';?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>

                                <h5 class="text-gray-900">เอกสารหลักฐาน</h5>
                                <hr>
                                <ul style="list-style-type:none;padding: 0px;">
                                    <li>1. แบบคำขออนุญาตเพื่อขออยู่ในราชอาณาจักรเป็นการชั่วคราวต่อไป (ตม.7)</li>

                                    <li>2. หนังสือเดินทางและสำเนาหนังสือเดินทาง 1 ชุด</li>

                                    <li>3. สำเนาใบอนุญาตทำงาน 1 ชุด</li>

                                    <li>4. รูปถ่ายขนาด 4x6 ซม. 1 ใบ</li>

                                    <li>5. ค่าธรรมเนียม 1,900 บาท</li>

                                    <li>6. เอกสารนายจ้าง (รับรองสำเนา) 1 ชุด</li>

                                    <li>• 6.1 สำเนาบัตรประจำตัวประชาชน</li>

                                    <li>• 6.2 สำเนาทะเบียนบ้าน</li>

                                    <li>• 6.3 สำเนาหนังสือรับรองบริษัทและประทับตราบริษัท(กรณีนายจ้างเป็นนิติบุคคล)</li>

                                    <li>7. กรณีหากมีการเปลี่ยนนายจ้างให้แนบเอกสารการเปลี่ยนนายจ้างจากกรมการจัดหางาน 1 ชุด</li>
                                </ul>

                                <h5 class="text-gray-900">เอกสารกรณีย้ายเล่ม</h5>
                                <hr>
                                <ul style="list-style-type:none;padding: 0px;">
                                    <li>1.  สำเนาเล่มเก่า-ใหม่ และหนังสือเดินทาง สำเนาหนังสือเดินทางเล่มเก่า-ใหม่</li>
                                    <li>2. หนังสือรับรองจากสถานทูต</li>

                                </ul>

                                <h5 class="text-gray-900">เอกสารกรณีติดตาม</h5>
                                <hr>
                                <ul style="list-style-type:none;padding: 0px;">
                                    <li>1. สำเนาสูติบัตร</li>
                                    <li>2. สำเนาหนังสือเดินทางของ บิดา หรือ มารดา</li>
                                    <li>3. สำเนาใบอนุญาตทำงานของ บิดา หรือ มารดา</li>
                                </ul>

                                <div class="text-center">
                                    <button class="btn btn-info" type="submit" id="btn-submit">บันทึก/submit</button>
                                </div>

                            </form>
                           
                        </div>
                    </div>
                   
                    <div class="col-lg-6 mb-4 ml-2">
                    <hr>
                        <h5>ค้นหาข้อมูล</h5>
                        <form id="form-search" action="<?=base_url('main/search');?>" method="get"
                            class="navbar-search" style="">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="ค้นหาจากเบอร์โทร"
                                    aria-label="Search" aria-describedby="basic-addon2" name="telno">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit" >
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets');?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url('assets');?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets');?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets');?>/js/sb-admin-2.min.js"></script>

    <script src="<?=base_url('assets');?>/vendor/bootstrap-datepicker-thai/js/bootstrap-datepicker.js"></script>
    <script src="<?=base_url('assets');?>/vendor/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js"></script>
    <script src="<?=base_url('assets');?>/vendor/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>
    <script src="<?=base_url('assets');?>/vendor/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js"></script>
    <script src="<?=base_url('assets');?>/js/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

    <script>
    var domain = '<?=base_url();?>'
    </script>
    <script>
        $(function(){

            //get holiday
            var holidays = [];
            $.ajax({
                url: '<?=base_url();?>' + "frontend/holiday",
                type: "GET",
                dataType: "json",
                async: false, 
                success: function (res) {
                    holidays = res;
                },
            });
        


            // $('#employer_tel').typeahead({
            //         source: function(query, process) {
            //             $.ajax({
            //                 url: domain + 'frontend/get_telno',
            //                 data: 'query=' + query,
            //                 dataType: "json",
            //                 type: "POST",
            //                 success: function(data) {
                                
            //                     objects = [];
            //                     map = {};
            //                     $.each(data, function(i, object) {
            //                         map[object.employer_tel] = object;
            //                         objects.push(object.employer_tel);
            //                     });
            //                     process(objects);
            //                 }
            //             });
            //         },
            //         updater: function(item) {
            //             $('#employer_name').val(map[item].employer_name);
            //             $('#emp_title').val(map[item].emp_title);
                        
            //             // $('#passport_no').val(map[item].passport_no);

            //             // $('#labour_name').val(map[item].labour_name);
            //             // $('#labour_nation').val(map[item].labour_nation);
            //             // $('#labour_genders').val(map[item].labour_genders);
            //             // $('#labour_title').val(map[item].labour_title);
            //             // $('input[name="etp_name"]').val(map[item].etp_name);
            //             // $('input[name="etp_id"]').val(map[item].etp_id);
            //             // $('#permit_book_no').val(map[item].permit_book_no);
            //             // $('#permit_no').val(map[item].permit_no);
            //             // $('#permit_year').val(map[item].permit_year);
            //             // $('input[name="etp_group_name"]').val(map[item].etp_group_name);


            //             return item;
            //             //console.log(map[item]);
            //         },
            //         minLength: 3
            // });

            $("#employer_tel").blur(function(){
                var data = $(this).val();
                $.ajax({
                    url: domain + 'frontend/get_telno',
                    data: 'query=' + data,
                    dataType: "json",
                    type: "POST",
                    success: function(data) {
                        $('#employer_name').val('');
                        $('#emp_title').val('');
                        if (data){
                            $('#employer_name').val(data.employer_name);
                            $('#emp_title').val(data.emp_title);
                        }
                       
                        
                        // objects = [];
                        // map = {};
                        // $.each(data, function(i, object) {
                        //     map[object.employer_tel] = object;
                        //     objects.push(object.employer_tel);
                        // });
                        // process(objects);
                    }
                });
               
            })

                $('#emp_title').typeahead({
                    source: function(query, process) {
                        $.ajax({
                            url: domain + 'frontend/get_title',
                            data: 'query=' + query,
                            dataType: "json",
                            type: "POST",
                            success: function(data) {
                               
                                objects = [];
                                map = {};
                                $.each(data, function(i, object) {
                                    // map[object.employer_tel] = object;
                                    objects.push(object.title_name);
                                });
                                process(objects);
                            }
                        });
                    },
                    updater: function(item) {
                      
                        return item;
                        //console.log(map[item]);
                    },
                    minLength: 1
                });
         
        
            var check_date = $("#check_date").val();
     
            $("#datepicker").datepicker({
                language:'th-th',
                format:'dd/mm/yyyy',
                autoclose: true,
                startDate: new Date(),
                beforeShowDay: function(date){
                    show = true;
                    if(date.getDay() == 0 || date.getDay() == 6){show = false;}//No Weekends
                  
                    if((new Date().toString() == date.toString()) && !check_date){show = true}
                    for (var i = 0; i < holidays.length; i++) {
                        if (new Date(holidays[i].date_off).toString() == date.toString()) {show = false;}//No Holidays
                        if (holidays[i].day_type == 1){
                            if (new Date(holidays[i].date_off).toString() == date.toString()) {show = true;}//No Holidays
                        }

                       
                    }
                    return show;
                }
            });


            $("#time_period").change(function(){
                const date = $("#datepicker").val();
                const timer = $("#time_period").val();
                if (date && timer){
                    $.ajax({
                        url: '<?=base_url();?>' + "frontend/counter",
                        type: "POST",
                        dataType: "json",
                        data:{date:date,timer:timer},
                        success: function (res) {
                            if (res){
                                $("#btn-submit").attr('disabled','disabled');
                                document.querySelectorAll("#time_period option").forEach(opt => {
                                    if (opt.value == timer) {
                                        opt.disabled = true;
                                    }
                                });
                            }else{
                                $("#btn-submit").attr('disabled',false);
                                document.querySelectorAll("#time_period option").forEach(opt => {
                                    if (opt.value == timer) {
                                      
                                        opt.disabled = false;
                                    }
                                    console.log(timer);
                                });
                            }
                        },
                    });
                }
            })

            $("#datepicker").change(function(){
                const date = $("#datepicker").val();
                if (date){
                    $.ajax({
                        url: '<?=base_url();?>' + "frontend/counterDate",
                        type: "POST",
                        dataType: "json",
                        data:{date:date},
                        success: function (res) {
                            if (res){
                                // $("#btn-submit").attr('disabled','disabled');
                                document.querySelectorAll("#time_period option").forEach(opt => {
                                    if (res.check[opt.value]) {
                                        opt.disabled = true;
                                    }else{
                                        opt.disabled = false;
                                    }
                                });

                                if (res.check_date){
                                    $("#btn-submit").attr('disabled','disabled');
                                }else{
                                    $("#btn-submit").attr('disabled',false);
                                }
                            }
                        },
                    });
                }
            })
        });
    </script>


</body>

</html>