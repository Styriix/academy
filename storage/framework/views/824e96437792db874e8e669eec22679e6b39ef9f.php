<?php $__env->startSection('mainContent'); ?>
<section class="sms-breadcrumb mb-40 up_breadcrumb white-box">
    <div class="container-fluid">
        <div class="row justify-content-between">
            <h1><?php echo app('translator')->getFromJson('lang.student_history'); ?></h1>
            <div class="bc-pages">
                <a href="<?php echo e(url('dashboard')); ?>"><?php echo app('translator')->getFromJson('lang.dashboard'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.reports'); ?></a>
                <a href="#"><?php echo app('translator')->getFromJson('lang.student_history'); ?></a>
            </div>
        </div>
    </div>
</section>
<section class="admin-visitor-area up_admin_visitor">
    <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="main-title">
                        <h3 class="mb-30"><?php echo app('translator')->getFromJson('lang.select_criteria'); ?> </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <?php if(session()->has('message-success') != ""): ?>
                        <?php if(session()->has('message-success')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session()->get('message-success')); ?>

                        </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div class="white-box">
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student_history_search', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'search_student'])); ?>

                            <div class="row">
                                <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                                <div class="col-lg-6 mt-30-md">
                                    <select class="w-100 niceSelect bb form-control <?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>" name="class">
                                        <option data-display="<?php echo app('translator')->getFromJson('lang.select_class'); ?> *" value=""><?php echo app('translator')->getFromJson('lang.select_class'); ?> *</option>
                                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($class->id); ?>"  <?php echo e(isset($class_id)? ($class_id == $class->id? 'selected': ''):''); ?>><?php echo e($class->class_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('class')): ?>
                                    <span class="invalid-feedback invalid-select" role="alert">
                                        <strong><?php echo e($errors->first('class')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-lg-6 mt-30-md">
                                    <select class="w-100 niceSelect bb form-control<?php echo e($errors->has('current_section') ? ' is-invalid' : ''); ?>" name="admission_year">
                                        <option data-display="<?php echo app('translator')->getFromJson('lang.select_admission_year'); ?>" value=""><?php echo app('translator')->getFromJson('lang.select_admission_year'); ?></option>
                                        <?php $__currentLoopData = $years; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>" <?php echo e(isset($year)? ($year == $key? 'selected': ''):''); ?>><?php echo e($key); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                </div>
                                <div class="col-lg-12 mt-20 text-right">
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->getFromJson('lang.search'); ?>
                                    </button>
                                </div>
                            </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
            
<?php if(isset($students)): ?>

            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 no-gutters">
                            <div class="main-title">
                                <h3 class="mb-0"><?php echo app('translator')->getFromJson('lang.student_report'); ?></h3>
                            </div>
                        </div>
                    </div>

                

                    <!-- <div class="d-flex justify-content-between mb-20"> -->
                        <!-- <button type="submit" class="primary-btn fix-gr-bg mr-20" onclick="javascript: form.action='<?php echo e(url('student-attendance-holiday')); ?>'">
                            <span class="ti-hand-point-right pr"></span>
                            mark as holiday
                        </button> -->

                        
                    <!-- </div> -->
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="table_id" class="display school-table" cellspacing="0" width="100%">
                                <thead>
                                    <?php if(session()->has('message-danger') != ""): ?>
                                    <tr>
                                        <td colspan="9">
                                            <?php if(session()->has('message-danger')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(session()->get('message-danger')); ?>

                                            </div>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endif; ?>
                                    <tr>
                                        <th><?php echo app('translator')->getFromJson('lang.admission'); ?> <?php echo app('translator')->getFromJson('lang.no'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('lang.name'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('lang.admission'); ?> <?php echo app('translator')->getFromJson('lang.date'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('lang.class'); ?>(<?php echo app('translator')->getFromJson('lang.start_end'); ?>)</th>
                                        <th><?php echo app('translator')->getFromJson('lang.session'); ?>(<?php echo app('translator')->getFromJson('lang.start_end'); ?>)</th>
                                        <th><?php echo app('translator')->getFromJson('lang.mobile'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('lang.guardian'); ?> <?php echo app('translator')->getFromJson('lang.name'); ?></th>
                                        <th><?php echo app('translator')->getFromJson('lang.guardian_phone'); ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($student->admission_no); ?></td>
                                        <td><?php echo e($student->first_name.' '.$student->last_name); ?></td>
                                        <td  data-sort="<?php echo e(strtotime($student->admission_date)); ?>" >                                            
                                        <?php echo e($student->admission_date != ""? App\SmGeneralSettings::DateConvater($student->admission_date):''); ?>


                                        </td>
                                        

                                        <td>
                                            <?php
                                                $histories = $student->promotion;
                                                if(count($histories) != 0){
                                                    $maxClass = App\SmStudent::classPromote($student->promotion->max('current_class_id'));
                                                    $minClass = App\SmStudent::classPromote($student->promotion->min('previous_class_id'));
                                                    echo $minClass.' - '. $maxClass;
                                                }else{
                                                    echo $student->className->class_name.' - '.$student->className->class_name;
                                                }
                                            ?>
                                        </td>

                                        <td>
                                            <?php
                                                $histories = $student->promotion;
                                                if(count($histories) != 0){
                                                    $maxSession = App\SmStudent::sessionPromote($student->promotion->max('current_session_id'));
                                                    $minSession = App\SmStudent::sessionPromote($student->promotion->min('previous_session_id'));
                                                    echo $minSession.' - '. $maxSession;
                                                }else{
                                                    echo $student->session->session.' - '.$student->session->session;
                                                }
                                            ?>
                                        </td>
                                        <td><?php echo e($student->mobile); ?></td>
                                        <td><?php echo e($student->parents !=""?$student->parents->guardians_name:""); ?></td>
                                        <td><?php echo e($student->parents !=""?$student->parents->guardians_mobile:""); ?></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

<?php endif; ?>

    </div>
</section>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>