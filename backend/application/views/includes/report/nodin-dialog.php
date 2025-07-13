<!-- Modal Dialog -->
<div class="modal fade" id="dialog-nodin" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report Parameter</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i aria-hidden="true" class="ki ki-close"></i>
        </button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr>
            <td width="40%"><strong>Nomor SP</strong></td>
            <td>
              <input type="text" class="form-control" id="nomor_sp" name="nomor_sp" />
            </td>
          </tr>
          <tr>
            <td><strong>Nama Pejabat</strong></td>
            <td>
              <input type="text" class="form-control" id="nama_pejabat" name="nama_pejabat" />
            </td>
          </tr>
          <tr>
            <td><strong>NIP Pejabat</strong></td>
            <td>
              <input type="text" class="form-control" id="nip_pejabat" name="nip_pejabat" />
            </td>
          </tr>
          <tr>
            <td><strong>Jabatan Pejabat</strong></td>
            <td>
              <input type="text" class="form-control" id="jabatan_pejabat" name="jabatan_pejabat" />
            </td>
          </tr>
          <tr>
            <td><strong>Tanggal Dinas</strong></td>
            <td>
              <input id="tgl_dinas" name="tgl_dinas" type="text" readonly class="datepicker form-control" />
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <strong id="loading-nodin" style="display: none">Now Loading..</strong>
        <button type="button" id="btnodin" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> &nbsp; Print Data</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->