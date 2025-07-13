<!-- Modal Dialog -->
<div class="modal fade" id="dialog-izin" tabindex="-1" role="dialog">
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
            <td width="40%"><strong>Nomor Izin</strong></td>
            <td>
              <input type="text" class="form-control" id="nomor_izin" name="nomor_izin" />
            </td>
          </tr>
          <tr>
            <td><strong>Tanggal Izin</strong></td>
            <td>
              <input id="tgl_izin" name="tgl_izin" type="text" readonly class="datepicker form-control" />
            </td>
          </tr>
          <tr>
            <td><strong>Lembaga Pengguna</strong></td>
            <td>
              <input type="text" class="form-control" id="lembaga_pengguna" name="lembaga_pengguna" />
            </td>
          </tr>
          <tr>
            <td><strong>Produsen</strong></td>
            <td>
              <input type="text" class="form-control" id="produsen" name="produsen" />
            </td>
          </tr>
          <tr>
            <td><strong>Qty</strong></td>
            <td>
              <input type="text" class="num form-control" id="qty" name="qty" />
            </td>
          </tr>
          <tr>
            <td><strong>Mode</strong></td>
            <td>
              <input type="text" class="form-control" id="mode" name="mode" />
            </td>
          </tr>
          <tr>
            <td><strong>Tanggal Dinas</strong></td>
            <td>
              <input id="tgl_dinas2" name="tgl_dinas2" type="text" readonly class="datepicker form-control" />
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <strong id="loading-izin" style="display: none">Now Loading..</strong>
        <button type="button" id="btizin" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> &nbsp; Print Data</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->