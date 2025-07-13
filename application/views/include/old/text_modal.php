<div class="modal fade" id="textModal" tabindex="-1" role="dialog" style="z-index:2000">
  <div class="modal-dialog" role="document" style="width:1080px">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span class="glyphicon glyphicon-pencil"></span> &nbsp;<strong>Edit Blog Content</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <p>Write all your <strong>blog</strong> contents in the field below.</p>
        <table class="table">
          <tr>
            <td><textarea id="txtblogText" style="height:150px" class="fluid" name="txtblogText" placeholder="Fill your notes here.."></textarea></td>
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
        <button type="button" class="btn btn-primary" id="btnSaveText"><span class="glyphicon glyphicon-floppy-disc"></span> &nbsp;Save Content</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->