<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">Prescription History</h6>
	    </div>
	    <div class="card-body">
	    	 <div class="table-responsive">
	    	 	<?php if(Yii::app()->user->hasFlash('success')):?>
			    <div class="border-bottom-success ">
			        <?php echo Yii::app()->user->getFlash('success'); ?>
			    </div>
			    <?php endif; ?>
			    <?php if(Yii::app()->user->hasFlash('error')):?>
			        <div class="border-bottom-danger ">
			            <?php echo Yii::app()->user->getFlash('error'); ?>
			        </div>
			    <?php endif; ?>
	    	 	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	    	 		<thead>
	                    <tr>
							<th>Doctor Account ID</th>
                            <th>Consultation ID</th>
							<th>Prescription</th>
                            <th>Prescription Date</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listOfPrescriptionHistory as $modelValue)
							{
						?>
								<tr>
									<td><?php echo $modelValue->doctorAccount->user->getFullname($modelValue->doctorAccount->user->account_id); ?></td>
                                    <td><?php echo $modelValue->consultation_id ?></td>
									<td><?php echo $modelValue->prescription ?></td>
                                    <td><?php echo $modelValue->date_of_prescription ?></td>
								</tr>
						<?php		
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>