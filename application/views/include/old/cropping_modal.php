<div class="modal fade" id="cropping" tabindex="-1" role="dialog" style="z-index:99991" >
	<div class="modal-dialog" role="document" style="width:1200px" >
		<div class="modal-content" style="width:1200px">
			<div class="modal-header">
				<h4 class="modal-title"><span class="icon-picture"></span> &nbsp;<strong>Crop Image</strong></h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row">
						<div class="col-md-9">
							<!-- <h3 class="page-header">Demo:</h3> -->
							<div class="img-container">
								<img id="imgCrop" />
							</div>
						</div>
						<div class="col-md-3">
							<!-- <h3 class="page-header">Preview:</h3> -->
							<div class="docs-preview clearfix">
								<div class="img-preview preview-lg"></div>
								<div class="img-preview preview-md"></div>
								<div class="img-preview preview-sm"></div>
								<div class="img-preview preview-xs"></div>
							</div>

							<!-- <h3 class="page-header">Data:</h3> -->
							<div class="docs-data">
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataX">X</label>
									<input type="text" readonly class="form-control" id="dataX" placeholder="x">
									<span class="input-group-addon">px</span>
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataY">Y</label>
									<input type="text" readonly class="form-control" id="dataY" placeholder="y">
									<span class="input-group-addon">px</span>
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataWidth">Width</label>
									<input type="text" readonly class="form-control" id="dataWidth" placeholder="width">
									<span class="input-group-addon">px</span>
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataHeight">Height</label>
									<input type="text" readonly class="form-control" id="dataHeight" placeholder="height">
									<span class="input-group-addon">px</span>
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataRotate">Rotate</label>
									<input type="text" readonly class="form-control" id="dataRotate" placeholder="rotate">
									<span class="input-group-addon">deg</span>
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataScaleX">ScaleX</label>
									<input type="text" readonly class="form-control" id="dataScaleX" placeholder="scaleX">
								</div>
								<div class="input-group input-group-sm">
									<label class="input-group-addon" for="dataScaleY">ScaleY</label>
									<input type="text" readonly class="form-control" id="dataScaleY" placeholder="scaleY">
								</div>
							</div>
						</div>
					</div>
					<div class="row" id="actions">
						<div class="col-md-9 docs-buttons">
							<!-- <h3 class="page-header">Toolbar:</h3> -->
							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;move&quot;)">
										<span class="fa fa-arrows"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.setDragMode(&quot;crop&quot;)">
										<span class="fa fa-crop"></span>
									</span>
								</button>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(0.1)">
										<span class="fa fa-search-plus"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoom(-0.1)">
										<span class="fa fa-search-minus"></span>
									</span>
								</button>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(-10, 0)">
										<span class="fa fa-arrow-left"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(10, 0)">
										<span class="fa fa-arrow-right"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, -10)">
										<span class="fa fa-arrow-up"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.move(0, 10)">
										<span class="fa fa-arrow-down"></span>
									</span>
								</button>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(-45)">
										<span class="fa fa-rotate-left"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotate(45)">
										<span class="fa fa-rotate-right"></span>
									</span>
								</button>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-flip="horizontal" data-method="scaleX" data-option="-1" title="Flip Horizontal">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleX(-1)">
										<span class="fa fa-arrows-h"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-flip="vertical" data-method="scaleY" data-option="-1" title="Flip Vertical">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.scaleY(-1)">
										<span class="fa fa-arrows-v"></span>
									</span>
								</button>
							</div>

							<div class="btn-group">
								<button type="button" class="btn btn-primary" data-method="crop" title="Crop">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.crop()">
										<span class="fa fa-check"></span>
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="clear" title="Clear">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.clear()">
										<span class="fa fa-remove"></span>
									</span>
								</button>
							</div>

							<button type="button" class="btn btn-primary" data-method="reset" title="Reset">
								<span class="docs-tooltip" data-toggle="tooltip" title="cropper.reset()">
									<span class="fa fa-refresh"></span>
								</span>
							</button>
							<label class="btn btn-primary" style="margin-top:0" for="inputImage" title="Upload image file">
								<input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
								<span class="docs-tooltip" data-toggle="tooltip" title="Import image with Blob URLs">
									<span class="fa fa-upload"></span>
								</span>
							</label>

							<!-- <div class="btn-group btn-group-crop">
								<button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas()">
										Get Cropped Canvas
									</span>
								</button>
								<button type="button" class="btn btn-primary" data-method="getCroppedCanvas" data-option="{ &quot;width&quot;: 780, &quot;height&quot;: 508 }">
									<span class="docs-tooltip" data-toggle="tooltip" title="cropper.getCroppedCanvas({ width: 780, height: 508 })">
										Get Cropped Canvas 780&times;508
									</span>
								</button>
							</div> -->

							<!-- Show the cropped image in modal -->
							<div class="modal fade docs-cropped" id="getCroppedCanvasModal" role="dialog" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" tabindex="-1">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="getCroppedCanvasTitle">Cropped</h4>
										</div>
										<div class="modal-body"></div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<a class="btn btn-primary" id="download" href="javascript:void(0);" download="cropped.jpg">Download</a>
										</div>
									</div>
								</div>
							</div><!-- /.modal -->


							<button type="button" class="btn btn-primary" data-method="moveTo" data-option="0">
								<span class="docs-tooltip" data-toggle="tooltip" title="cropper.moveTo(0)">
									0,0
								</span>
							</button>
							<button type="button" class="btn btn-primary" data-method="zoomTo" data-option="1">
								<span class="docs-tooltip" data-toggle="tooltip" title="cropper.zoomTo(1)">
									100%
								</span>
							</button>
							<button type="button" class="btn btn-primary" data-method="rotateTo" data-option="180">
								<span class="docs-tooltip" data-toggle="tooltip" title="cropper.rotateTo(180)">
									180°
								</span>
							</button>
							<!-- <input type="text" class="form-control" id="putData" placeholder="Get data to here or set data with this value"> -->

						</div><!-- /.docs-buttons -->

						<div class="col-md-3 docs-toggles">

						</div><!-- /.docs-toggles -->
					</div>
				</div>

			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
				<button type="button" id="btnCrop" class="btn btn-primary"><span class="glyphicon glyphicon-sent"></span> &nbsp;Crop 780&times;508 &amp; Submit</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->