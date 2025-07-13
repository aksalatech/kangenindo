<!--Modal Dialog -->
<div class="modal fade" id="perso-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="width: 1080px; max-width: 1080px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span> &nbsp; <strong>Browse Permohonan Lembaga Pengguna</strong></h4>
      </div>
      <!-- <div class="modal-body" id="divAjaxPopUpRetur"></div> -->
      <div class="modal-body">
      	<table class="table table-bordered table-stock" id="StockTable">
          <thead>
            <tr>
                <th width="30px"><center>No.</center></th>
                <th width="20%"><center>No. Aktivasi</center></th>
                <th><center>Judul Permohonan</center></th>
                <th width="15%"><center>Tgl Permohonan</center></th>
                <th width="120px"><center>Lembaga Pengguna</center></th>
                <th width="95px"><center>Jml Mesin</center></th>
                <th width="95px"><center>Jenis Mesin</center></th>
                <th width="110px"></th>
            </tr>
          </thead>
          <tbody id="tbody">
            <?php 
              $i = 1;
              foreach ($list as $l) : ?>
              <tr>
                <td align="center"><?php echo $i ?>.</td>
                <td><?php echo $l->request_no ?></td>
                <td><?php echo $l->request_title ?></td>
                <td><?php echo date('d M Y H:i', strtotime($l->request_date)) ?></td>
                <td><?php echo $l->employee_name ?></td>
                <td align="center"><?php echo $l->jml_mesin ?></td>
                <td align="center"><?php echo $l->machineNm ?></td>
                <td><button class="btn btn-primary choose" data-mID="<?php echo $l->machineID ?>" data-machine="<?php echo $l->machineNm ?>" data-no="<?php echo $l->request_no ?>" data-title="<?php echo $l->request_title ?>" data-id="<?php echo $l->requestID ?>" data-produsen="<?php echo $l->businessNm ?>" data-pengguna="<?php echo $l->employee_name ?>" data-date="<?php echo date('d M Y H:i', strtotime($l->request_date)) ?>" data-jml="<?php echo $l->jml_mesin ?>" type="button"><span class="fa fa-plus"></span> &nbsp;Pilih</button></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->