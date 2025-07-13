<div class="modal fade" id="rejectDialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-top:0px; padding-bottom:0px;">
        
        <h3>
          <span class="fa fa-remove"></span> &nbsp;Alasan Penolakkan
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        </h3>
      </div>
      <div class="modal-body" style="overflow-y:hidden;">
        <p>
          Silahkan masukkan alasan anda.
        </p>
        <table width="95%" class="table no-border no-margin">
          <tr>
            <td width="130px" valign="top"><i class="glyphicon glyphicon-comment"></i> &nbsp;<strong>Alasan Tolak ?</strong></td>
            <td><textarea rows="10" class="form-control" id="reasonField" name="reasonField" placeholder="Masukkan alasan penolakkan.." max-length="500"></textarea></td>
          </tr>
          <tr >
            <td align="center" colspan="2" id="error_send" style="color:red;font-weight:bold;font-size:9pt;padding:5px"></td>
          </tr>
        </table>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btsave_reject"><span class="fa fa-send"></span> &nbsp;Kirim Pesan</button>
      </div>
    </div>
  </div>
</div>