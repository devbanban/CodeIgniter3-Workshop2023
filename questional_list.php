<style>
    input[type=radio] {
        border: 0px;
        width: 100%;
        height: 1.5em;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            รายการคำถาม
            <a href="" class="btn btn-primary"> +ข้อมูล </a>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="<?=site_url('questional/saveQuestion');?>" method="post">
                        <div class="table-responsive">
                            <h4>ตอนที่ 1 กรุณาเลือกคะแนนที่ตรงกับควาวมต้องการมากที่สุด</h4>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="5" class="text-center">เกณฑ์การให้คะแนนะความพึงพอใจ</td>
                                    </tr>
                                    <tr class="danger">
                                        <th width="5%">ID</th>
                                        <th width="70%">คำถาม</th>
                                        <th width="5%" class="text-center">5</th>
                                        <th width="5%" class="text-center">4</th>
                                        <th width="5%" class="text-center">3</th>
                                        <th width="5%" class="text-center">2</th>
                                        <th width="5%" class="text-center">1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($rs1 as $row) { ?>
                                        <tr>
                                            <td><?= $row->id_question; ?></td>
                                            <td><?= $row->name_question; ?></td>
                                            <td align="center"><input type="radio" name="id_question[<?= $row->id_question; ?>]" value="5" required></td>
                                            <td align="center"><input type="radio" name="id_question[<?= $row->id_question; ?>]" value="4" required></td>
                                            <td align="center"><input type="radio" name="id_question[<?= $row->id_question; ?>]" value="3" required></td>
                                            <td align="center"><input type="radio" name="id_question[<?= $row->id_question; ?>]" value="2" required></td>
                                            <td align="center"><input type="radio" name="id_question[<?= $row->id_question; ?>]" value="1" required></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         </div>
                         <div class="row">
                            <div class="col-sm-5">
                            <h4>ตอนที่ 2 <?=$rs2->name_question;?></h4>
                            <textarea name="id_question[<?=$rs2->id_question; ?>]" placeholder="ข้อเสนอแนะ"  cols="30" rows="2" class="form-control"></textarea>
                            </div>
                         </div>
                         <div class="row">
                         <div class="col-sm-5">
                            <br> 
                            <input type="hidden" name="member_id" value="1">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                    </div>
                         </div>
                            
                           
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->