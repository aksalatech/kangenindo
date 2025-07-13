<div class="modal fade" id="rejectDialog" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="padding-top:20px; padding-bottom:15px; display: flex; align-items: center;">
        <!-- <h3 style="margin: 0;">
          <span class="fa fa-remove"></span> &nbsp;Reason
        </h3> -->
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="margin-left: auto;">&times;</button>
      </div>
      <div class="modal-body" style="overflow-y:hidden;">
        <table width="95%" class="table no-border no-margin">
          <tr>
            <td width="130px" valign="top"><i class="glyphicon glyphicon-comment"></i> &nbsp;<strong>Reason ?</strong></td>
            <td><textarea rows="10" class="form-control" id="reasonField" name="reasonField" placeholder="Reason for Rejection.." max-length="500"></textarea></td>
            <input type="hidden" id="idTugasver2" name="idTugasver2" />
            <input type="hidden" id="idTugasver3" name="idTugasver3" />
          </tr>
          <tr>
            <td align="center" colspan="2" id="error_send" style="color:red;font-weight:bold;font-size:9pt;padding:5px"></td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="btsave_reject"><span class="fa fa-send"></span> &nbsp;Reject</button>
      </div>
    </div>
  </div>
</div>