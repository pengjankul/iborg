<div class="row">
    <div class="col-md-6">
        <form action="<?=site_url('main/save_que');?>" method="post">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800">ตั้งค่าจำนวนตามช่วงเวลา</div>
                        </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ช่วงเวลา</th>
                                        <th>ช่วงเวลา</th>
                                        <th>จำนวนที่รับ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php foreach ($times as $key => $value) :?>
                                        <tr>
                                            <td><?=$value->period_id;?></td>
                                            <td><?=$value->time_str .'- '.$value->time_end;?></td>
                                            <td>
                                                <input type="text" name="que_limit[<?=$value->period_id;?>]" class="form-control text-right" value="<?=$value->que_limit;?>">
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                        
                                    
                                </tbody>
                            </table>
                        
                    
                    
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info float-right">บันทึก</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">ตั้งค่าวันหยุดประจำปี</div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>วันที่</th>
                                <th>หัวข้อ</th>
                                <th>ประเภท</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $type = ['','เปิดพิเศษ','นักขัตฤกษ์','วันหยุดพิเศษ'];?>
                            <?php foreach ($holidays as $key => $value) :?>
                                <tr>
                                    <td><?=$key+1;?></td>
                                    <td><?=$value->date_off;?></td>
                                    <td><?=$value->date_name;?></td>
                                    <td><?=$type[$value->day_type];?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" onclick="editHistory(<?=$value->p_key;?>)">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
               
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-info float-right" type="button"  data-toggle="modal" data-target="#exampleModal">เพิ่มวันหยุด</button>
            </div>
           
        </div>
      
       
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มวันหยุด</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form action="<?=site_url('main/save_holiday');?>" method="post" id="form-holiday">
                <input type="hidden" name="p_key" id="p_key">
                <div class="form-group row">
                    <div class="mt-3 col-md-12">
                        <label for="">ชื่อวันหยุด</label>
                        <input type="text" class="form-control" name="date_name" id="date_name">
                    </div>
                    <div class="mt-3 col-md-12">
                        <label for="">วันที่</label>
                        <input type="text" class="form-control" id="datepicker_his" name="date_off">
                    </div>
                    <div class="mt-3 col-md-12">
                        <label for="">ประเภท</label>
                        <select name="day_type" id="day_type" class="form-control">
                            <option value="3">วันหยุดพิเศษ</option>
                            <option value="2">นักขัตฤกษ์</option>
                            <option value="1">วันเปิดพิเศษ</option>
                        </select>
                    </div>
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="button" class="btn btn-primary" onclick="$('#form-holiday').submit();">บันทึก</button>
      </div>
    </div>
  </div>
</div>