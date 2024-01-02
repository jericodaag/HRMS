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
           Patient Profile Control
        </div>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-md"></i><span>My Profile</span></a>', $this->createAbsoluteUrl('account/view/' . Yii::app()->user->id), array('class'=>'nav-link')); ?>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
           Patient Management
        </div>
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-prescription"></i><span>View Prescriptions</span></a>', $this->createAbsoluteUrl('prescription/listPrescriptionHistory'), array('class'=>'nav-link')); ?>
        </li>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-prescription"></i><span>Consultation History</span></a>', $this->createAbsoluteUrl('consultationRecord/listConsultationHistory'), array('class'=>'nav-link')); ?>
        </li>

        <hr class="sidebar-divider">

        <div class="sidebar-heading">
           Account Settings
        </div>
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-cog"></i><span>Settings</span></a>', $this->createAbsoluteUrl('account/settings'), array('class'=>'nav-link')); ?>
        </li>
        <!-- Nav Item - Logout -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-sign-out-alt"></i><span>Logout</span></a>', $this->createAbsoluteUrl('site/logout'), array('class'=>'nav-link')); ?>
        </li>
    </ul>
    <!-- End of Sidebar -->