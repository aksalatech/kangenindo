<!-- Modal Dialog -->
<div class="modal fade" id="dialog-trans" tabindex="-1" role="dialog">
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
            <td width="40%"><strong>Lembaga Produsen</strong></td>
            <td>

              <select id="cblvlk" name="cblvlk" class="form-control" id="kt_select2_1" style="opacity: 1">
                <?php if ($this->session->userdata("position") == POSITION_ADMIN) : ?>
                  <option value="%">Semua Lembaga</option>
                <?php endif; ?>
                <?php foreach ($users as $u) :
                  if ($this->session->userdata("position") == POSITION_ADMIN || $u->businessID == $this->session->userdata("businessID")) {
                ?>
                    <option value="<?php echo $u->businessID ?>"><?php echo $u->businessNm ?></option>
                <?php
                  }
                endforeach; ?>

                <?php foreach ($dukcapil as $u) :
                  if ($this->session->userdata("position") == POSITION_ADMIN || $u->typeID == $this->session->userdata("typeID")) {
                ?>
                    <option value="D<?php echo $u->typeID ?>"><?php echo $u->typeNm ?></option>
                <?php
                  }
                endforeach; ?>
              </select>
            </td>
          </tr>
          <tr>
            <td width="40%"><strong>Status</strong></td>
            <td>
              <select id="cbstatus" name="cbstatus" class="form-control" style="opacity: 1">
                <option value="%">Semua</option>
                <option value="A">Approved</option>
                <option value="C">Canceled</option>
                <option value="R">Rejected</option>
                <option value="P">On Progress</option>
                <option value="D">Done</option>
                <option value="V">Received</option>
              </select>
            </td>
          </tr>
          <tr>
            <td width="40%"><strong>From Date</strong></td>
            <td>
              <input id="txtsd" type="text" class="form-control" readonly="readonly"/>
            </td>
          </tr>
          <tr>
            <td><strong>To Date</strong></td>
            <td>
              <input id="txted" type="text" class="form-control" readonly="readonly"/>
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <strong id="loading-print" style="display: none">Now Loading..</strong>
        <button type="button" id="btprint" class="btn btn-success"><span class="glyphicon glyphicon-print"></span> &nbsp; Print Data</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->