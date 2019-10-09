<div class="row">
<?php $no=0;foreach ($GetQuestion as $question):$no++;?>
	<div class="col-xs-6 col-md-6">
		<div class="panel">
			<div class="panel-heading">
				<h3 class="panel-title"><?=$question->title?></h3>
				<div class="right">
					<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
					<!-- <button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button> -->
				</div>
			</div>
			<div class="panel-body">
                <div class="row">
                    <div style="width:100%; text-align: center">
                        <a target="_blank" href="<?=base_url('assets/img/'.$question->picture)?>">
                            <img style="width:100%;height:auto" width="400" height="400"  src="<?=base_url('assets/img/'.$question->picture)?>" controls id="myvideo" alt="">
                        </a>
                    </div>
                </div>
			</div>
			<div class="panel-footer">
				<div class="row">
                    <div style="float:right">
                        <a target="_blank" class="btn btn-primary" href="<?=base_url('assets/img/'.$question->picture)?>">view full img</a>
                    </div>
				</div>
			</div>
		</div>
    </div>
<?php endforeach ?>
</div>