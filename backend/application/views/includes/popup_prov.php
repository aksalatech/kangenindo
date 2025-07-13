<!--Modal Dialog -->
<div class="modal fade" id="prov-dialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="width: 1080px; max-width: 1080px;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span> &nbsp; <strong>Browse Data Sebaran Provinsi</strong></h4>
      </div>
      <div class="modal-body">
      	<table class="table table-bordered table-stock" id="BranchTable">
          <thead>
            <tr>
                <th width="30px"><center>No.</center></th>
                <th><center>Nama Provinsi</center></th>
                <th width="140px"><center>Jumlah</center></th>
            </tr>
          </thead>
          <tbody>
            <?php 
              $i = 1;
              foreach ($list as $l) : ?>
              <tr>
                <td align="center"><?php echo $i ?>.</td>
                <td><?php echo $l->prov_name ?></td>
                <td><?php echo number_format($l->jml) ?></td>
              </tr>
            <?php 
              $i++;
            endforeach; ?>
          </tbody>
        </table>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->