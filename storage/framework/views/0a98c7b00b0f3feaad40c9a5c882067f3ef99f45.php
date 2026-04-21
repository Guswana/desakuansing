
<?php echo $__env->make('admin.layouts.components.asset_validasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('title'); ?>
    <h1>
        Dokumen Persyaratan Surat
        <small><?php echo e($action); ?> Data</small>
    </h1>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(ci_route('surat_mohon')); ?>">Dokumen Persyaratan Surat</a></li>
    <li class="active"><?php echo e($action); ?> Data</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.layouts.components.notifikasi', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="box box-info">
        <div class="box-header with-border">
            <a href="<?php echo e(ci_route('surat_mohon')); ?>" class="btn btn-social btn-info btn-sm btn-sm visible-xs-block visible-sm-inline-block visible-md-inline-block visible-lg-inline-block">
                <i class="fa fa-arrow-circle-left "></i>Kembali ke Dokumen Persyaratan Surat
            </a>
        </div>
        <div class="box-body">
            <?php echo form_open($form_action, 'class="form-horizontal" id="validasi"'); ?>

            <div class="box-body">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Nama Dokumen</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control input-sm nomor_sk required" id="ref_syarat_nama" name="ref_syarat_nama" placeholder="Nama Dokumen" value="<?php echo e($ref_syarat_surat->ref_syarat_nama); ?>" />
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="reset" class="btn btn-social btn-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
                <button type="submit" class="btn btn-social btn-info btn-sm pull-right"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\desakuansing\resources\views/admin/syaratan_surat/form.blade.php ENDPATH**/ ?>