<!-- Modal Dialog -->
<div class="modal fade" id="dialog-upload" tabindex="-1" role="dialog">
  <form action="<?php echo base_url(); ?>cert_type/import" method="POST" enctype="multipart/form-data" onsubmit="setProgressMode()">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-file"></span> &nbsp; <strong>Import From Excel </strong></h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
            <!-- (<a href="<?php echo base_url()?>dist/template/Template_Product.xlsx" target="_blank">Template</a>) -->
                <td width="40%"><strong>File to import (<a href="<?php echo base_url()?>dist/template/Template_Data_Alumni.xlsx" target="_blank">Template</a>)</strong></td>
                <td>
                  <input type="file" class="excel_upload" id="fnImport" name="fnImport" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
                </td>
            </tr>
            <tr id="tr_progress" class="d_none">
              <td colspan="2">
                <div class="progress">
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                    <span class="sr-only">100% Complete</span>
                  </div>
                </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="submit" id="btimport" class="btn btn-success">Import Data</button>
          <strong class="span-loading pull-right d_none">Now Loading...</strong>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </form>
</div><!-- /.modal -->