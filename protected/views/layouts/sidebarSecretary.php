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
           Secretary Controls
        </div>

        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-user-md"></i><span>My Profile</span></a>', $this->createAbsoluteUrl('account/view/' . Yii::app()->user->id), array('class'=>'nav-link')); ?>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <?php echo CHtml::link('<i class="fas fa-fw fa-bed"></i><span>Manage Patients</span>', '', array('class'=>'nav-link collapsed', 'data-toggle'=>'collapse', 'data-target'=>'#collapsePatients', 'aria-expanded'=>'true', 'aria-controls'=>'collapsePatients')); ?>

            <div id="collapsePatients" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Actions:</h6>
                    <?php echo CHtml::link('Add Adult Patient', $this->createAbsoluteUrl('account/CreateAdultPatientDoc'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('Add Child Patient', $this->createAbsoluteUrl('account/CreateChildPatientDoc'), array('class'=>'collapse-item')); ?>
                    <?php echo CHtml::link('List Patients', $this->createAbsoluteUrl('account/listPatientSec'), array('class'=>'collapse-item')); ?>
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