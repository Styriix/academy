<?php $__env->startSection('mainContent'); ?>

<section class="sms-breadcrumb mb-40 white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.academic_year'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.system_settings'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.academic_year'); ?></a>
            </div>
        </div>
    </div>
</section>

<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid p-0">
        <?php if(isset($academic_year)): ?>
        <div class="row">
            <div class="offset-lg-10 col-lg-2 text-right col-md-12 mb-20">
                <a href="<?php echo e(url('academic-year')); ?>" class="primary-btn small fix-gr-bg">
                    <span class="ti-plus pr-2"></span>
                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                </a>
            </div>
        </div>
        <?php endif; ?>   
        <div class="row">
            <div class="col-lg-3">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-title">
                            <h3 class="mb-30"><?php if(isset($academic_year)): ?>
                                    <?php echo app('translator')->getFromJson('lang.edit'); ?>
                                <?php else: ?>
                                    <?php echo app('translator')->getFromJson('lang.add'); ?>
                                <?php endif; ?>
                                <?php echo app('translator')->getFromJson('lang.academic_year'); ?>
                            </h3>
                        </div>
                        <?php if(isset($academic_year)): ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'academic-year/'.$academic_year->id, 'method' => 'PUT', 'enctype' => 'multipart/form-data'])); ?>

                        <?php else: ?>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'url' => 'academic-year',
                        'method' => 'POST', 'enctype' => 'multipart/form-data'])); ?>

                        <?php endif; ?>
                        <div class="white-box">
                            <div class="add-visitor">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <?php if(session()->has('message-success')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger')); ?>

                                        </div>
                                        <?php endif; ?>
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('year') ? ' is-invalid' : ''); ?>"
                                                type="text" name="year" autocomplete="off" value="<?php echo e(isset($academic_year)? $academic_year->year:''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($academic_year)? $academic_year->id: ''); ?>">
                                            <label><?php echo app('translator')->getFromJson('lang.year'); ?> <span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('year')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('year')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>"
                                                type="text" name="title" autocomplete="off" value="<?php echo e(isset($academic_year)? $academic_year->title:''); ?>">
                                            <input type="hidden" name="id" value="<?php echo e(isset($academic_year)? $academic_year->id: ''); ?>">
                                            <label> <?php echo app('translator')->getFromJson('lang.year_title'); ?><span>*</span></label>
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('title')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('title')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row no-gutters input-right-icon mt-40">
                                    <div class="col">
                                        <div class="input-effect">
                                            <input class="primary-input date form-control<?php echo e($errors->has('starting_date') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                placeholder=" <?php echo app('translator')->getFromJson('lang.starting_date'); ?> *" name="starting_date" value="<?php echo e(isset($academic_year)? date('m/d/Y',strtotime($academic_year->starting_date)): date('m/d/Y')); ?>">
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('starting_date')): ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($errors->first('starting_date')); ?></strong>
                                            </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row no-gutters input-right-icon mt-40">
                                    <div class="col-lg-12">
                                        <div class="input-effect">
                                            <input class="primary-input date form-control<?php echo e($errors->has('ending_date') ? ' is-invalid' : ''); ?>" id="startDate" type="text"
                                                placeholder="<?php echo app('translator')->getFromJson('lang.ending_date'); ?>*" name="ending_date" value="<?php echo e(isset($academic_year)? date('m/d/Y',strtotime($academic_year->ending_date)): date('m/d/Y')); ?>">
                                            <span class="focus-border"></span>
                                            <?php if($errors->has('ending_date')): ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($errors->first('ending_date')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button class="" type="button">
                                            <i class="ti-calendar" id="start-date-icon"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="row mt-40">
                                    <div class="col-lg-12 text-center">
                                        <button class="primary-btn fix-gr-bg">
                                            <span class="ti-check"></span>
                                            <?php if(isset($academic_year)): ?>
                                                <?php echo app('translator')->getFromJson('lang.update'); ?>
                                            <?php else: ?>
                                                <?php echo app('translator')->getFromJson('lang.save'); ?>
                                            <?php endif; ?>

                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0"> <?php echo app('translator')->getFromJson('lang.academic_year'); ?> <?php echo app('translator')->getFromJson('lang.list'); ?></h3>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">

                        <table id="table_id" class="display school-table" cellspacing="0" width="100%">

                            <thead>
                                <?php if(session()->has('message-success-delete') != "" ||
                                session()->get('message-danger-delete') != ""): ?>
                                <tr>
                                    <td colspan="6">
                                        <?php if(session()->has('message-success-delete')): ?>
                                        <div class="alert alert-success">
                                            <?php echo e(session()->get('message-success-delete')); ?>

                                        </div>
                                        <?php elseif(session()->has('message-danger-delete')): ?>
                                        <div class="alert alert-danger">
                                            <?php echo e(session()->get('message-danger-delete')); ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endif; ?>
                                <tr>
                                    <th><?php echo app('translator')->getFromJson('lang.year'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.title'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.starting_date'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.ending_date'); ?></th>
                                    <th><?php echo app('translator')->getFromJson('lang.action'); ?></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $academic_years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $academic_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($academic_year->year); ?></td>
                                    <td><?php echo e($academic_year->title); ?></td>
                                    <td  data-sort="<?php echo e(strtotime($academic_year->starting_date)); ?>" >
                                        <?php echo e($academic_year->starting_date != ""? App\SmGeneralSettings::DateConvater($academic_year->starting_date):''); ?>


                                    </td>
                                    <td  data-sort="<?php echo e(strtotime($academic_year->ending_date)); ?>" >
                                       <?php echo e($academic_year->ending_date != ""? App\SmGeneralSettings::DateConvater($academic_year->ending_date):''); ?>


                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                                <?php echo app('translator')->getFromJson('lang.select'); ?>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="<?php echo e(url('academic-year', [$academic_year->id])); ?>"><?php echo app('translator')->getFromJson('lang.edit'); ?></a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#deleteAcademicYearModal<?php echo e($academic_year->id); ?>"
                                                    href="#"><?php echo app('translator')->getFromJson('lang.delete'); ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                               <!--  -->

                                <div class="modal fade admin-query" id="deleteAcademicYearModal<?php echo e($academic_year->id); ?>" >
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?php echo app('translator')->getFromJson('lang.delete'); ?> <?php echo app('translator')->getFromJson('lang.academic_year'); ?></h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <h4><?php echo app('translator')->getFromJson('lang.are_you_sure_to_delete'); ?></h4>
                                                </div>

                                                <div class="mt-40 d-flex justify-content-between">
                                                    <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->getFromJson('lang.cancel'); ?></button>
                                                     
                                                    <?php echo e(Form::open(['url' => 'academic-year/'.$academic_year->id, 'method' => 'DELETE', 'enctype' => 'multipart/form-data'])); ?>

                                                 <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->getFromJson('lang.delete'); ?></button>
                                                 <?php echo e(Form::close()); ?>

                                                     
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>