<div class="modal fade" id="dialog" tabindex="-1" role="dialog" style="z-index:100000">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span> &nbsp;<strong>Leave Your Contact</strong></h4>
      </div>
      <div class="modal-body">
        <p>Please leave your contact below, so we can contact you the things related to your booking request</p>
        <br/>
        <table class="table">
          <tr>
            <td>Your Name</td>
            <td><input type="text" class="fluid" id="txtContactName" name="txtContactName" maxlength="50" placeholder="Fill your name here.." /></td>
          </tr>
          <tr>
            <td>Your Phone</td>
            <td><input type="text" class="fluid" id="txtContactPhone" name="txtContactPhone" maxlength="20" placeholder="Fill your phone here.." /></td>
          </tr>
          <tr>
            <td>Your Email</td>
            <td><input type="text" class="fluid" id="txtContactEmail" name="txtContactEmail" maxlength="80" placeholder="Fill your email here.." /></td>
          </tr>
          <tr>
            <td>Notes</td>
            <td><textarea id="txtnotes" style="height:150px" class="fluid" name="txtnotes" placeholder="Fill your notes here.."></textarea></td>
          </tr>
          <tr>
            <td colspan="2" align="center" class="font-error" id="error-request" style="color:red;border-top:none;">
                <!-- Error Here -->
            </td>
          </tr>
        </table>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" id="btnRequest"><span class="glyphicon glyphicon-sent"></span> &nbsp;Submit Request</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->