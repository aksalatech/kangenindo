<!-- Modal Dialog -->
<div class="modal fade" id="dialog-date" tabindex="-1" role="dialog">
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
            <td width="40%"><strong>From Date</strong></td>
            <td>
              <input id="txtsd_dt" type="text" class="form-control" readonly="readonly"/>
            </td>
          </tr>
          <tr>
            <td><strong>To Date</strong></td>
            <td>
              <input id="txted_dt" type="text" class="form-control" readonly="readonly"/>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <strong id="loading-print" style="display: none">Now Loading..</strong>
        <button type="button" id="btdate" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> &nbsp; Print Data</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->