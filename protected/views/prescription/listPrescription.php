<div class = "row">
<div class="col-xl-12 col-lg-12">
	<div class="card shadow mb-4">
	    <div class="card-header py-3">
	        <h6 class="m-0 font-weight-bold text-primary">List of Prescription</h6>
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
							<th>Patient Account ID</th>
							<th>Doctor Account ID</th>
                            <th>Consultation ID</th>
							<th>Prescription</th>
                            <th>Prescription Date</th>
							<th>Status</th>
							<th>V</th>
							<th>E</th>
							<th>D</th>
	                    </tr>
	                </thead>
	                <tbody>
						<?php 
							foreach($listPrescription as $modelValue)
							{
						?>
								<tr>
									<td><?php echo $modelValue->patientAccount->user->getFullname($modelValue->patientAccount->user->account_id); ?></td>
									<td><?php echo $modelValue->doctorAccount->user->getFullname($modelValue->doctorAccount->user->account_id); ?></td>
                                    <td><?php echo $modelValue->consultation_id ?></td>
									<td><?php echo $modelValue->prescription ?></td>
                                    <td><?php echo $modelValue->date_of_prescription ?></td>
									<td><?php echo $modelValue->getStatus($modelValue->id) ?></td>
									<?php 
									echo "<td>".CHtml::link('<i class="fas fa-info-circle"></i>', $this->createAbsoluteUrl('prescription/view/'.$modelValue->id), array('class'=>'btn btn-info btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-edit"></i>', $this->createAbsoluteUrl('prescription/update/'.$modelValue->id),array('class'=>'btn btn-success btn-circle btn-sm'))."</td>";
		                            echo "<td>".CHtml::link('<i class="fas fa-trash"></i>', $this->createAbsoluteUrl('prescription/delete/'.$modelValue->id),array('class'=>'btn btn-danger btn-circle btn-sm', 'onclick'=>'return confirm("Are you sure you want to delete this account? Deleting this account will delete all data associated with it including unpaid obligations.")'))."</td>";
		                            ?>
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
