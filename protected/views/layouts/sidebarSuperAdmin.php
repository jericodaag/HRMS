    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
    
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php $this->createAbsoluteUrl('site/index') ?>">
            <div class="sidebar-brand-icon">
                <img style="max-width: 55px" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
            </div>
            <div class="sidebar-brand-text mx-3">LUNAS</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
        	<?php echo CHtml::link('<i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span>', $this->createAbsoluteUrl('site/index'), array('class'=>'nav-link')); ?>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
           Super Admin Controls
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-md"></i><span>Manage Doctors</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseDoctors', 'aria-expanded'=>'true', 'aria-controls'=>'collapseDoctors')); ?>

            <div id="collapseDoctors" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Doctor', $this->createAbsoluteUrl('account/createDoctor'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Doctors', $this->createAbsoluteUrl('account/listDoctor'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>


        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-clipboard"></i><span>Manage Secretary</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseSecretary', 'aria-expanded'=>'true', 'aria-controls'=>'collapseSecretary')); ?>

            <div id="collapseSecretary" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Secretary', $this->createAbsoluteUrl('account/createSecretary'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Secretary', $this->createAbsoluteUrl('account/listSecretary'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-bed"></i><span>Manage Patients</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePatients', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePatients')); ?>

            <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Adult Patient', $this->createAbsoluteUrl('account/CreateAdultPatientAdmin'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('Add Child Patient', $this->createAbsoluteUrl('account/CreateChildPatientAdmin'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Patients', $this->createAbsoluteUrl('account/listPatient'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-hospital"></i><span>Manage Clinics</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseClinics', 'aria-expanded'=>'true', 'aria-controls'=>'collapseClinics')); ?>

            <div id="collapseClinics" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Clinic', $this->createAbsoluteUrl('clinic/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Clinics', $this->createAbsoluteUrl('clinic/listClinic'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('Assign Clinic', $this->createAbsoluteUrl('clinic/AssignClinic'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List of Clinic Assignment', $this->createAbsoluteUrl('clinic/ListClinicAssignment'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-prescription"></i><span>Manage Prescriptions</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePrescriptions', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePrescriptions')); ?>

            <div id="collapsePrescriptions" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Prescription', $this->createAbsoluteUrl('prescription/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Prescriptions', $this->createAbsoluteUrl('prescription/listPrescription'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <?php echo CHtml::link('<i class=""></i><span>Manage Consultation</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseConsultation', 'aria-expanded'=>'true', 'aria-controls'=>'collapseConsultation')); ?>

            <div id="collapseConsultation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Consultation', $this->createAbsoluteUrl('consultationRecord/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Consultation', $this->createAbsoluteUrl('consultationRecord/listConsultation'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <?php echo CHtml::link('<i class=""></i><span>Manage Immunization</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapseImmunization', 'aria-expanded'=>'true', 'aria-controls'=>'collapseImmunization')); ?>

            <div id="collapseImmunization" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Immunization', $this->createAbsoluteUrl('Immunization/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List of Immunization', $this->createAbsoluteUrl('Immunization/ImmunizationList'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('Assign Immunization', $this->createAbsoluteUrl('ImmunizationRecord/create'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List of Patient Immunization', $this->createAbsoluteUrl('ImmunizationRecord/ImmunizationRecordList'), array('class'=>'collapse-item')); ?>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-cog"></i><span>Settings</span></a>', $this->createAbsoluteUrl('account/settings'), array('class'=>'nav-link')); ?>
        </li>

        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-sign-out-alt"></i><span>Logout</span></a>', $this->createAbsoluteUrl('site/logout'), array('class'=>'nav-link')); ?>
        </li>
    </ul>
    <!-- End of Sidebar -->