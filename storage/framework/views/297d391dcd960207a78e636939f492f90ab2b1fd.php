<?php if(config_item('csrf_protection')): ?>
    <!-- CSRF Token -->
    <script type="text/javascript">
        var csrfParam = "<?php echo e($token); ?>";
        var getCsrfToken = () => document.cookie.match(new RegExp(csrfParam + '=(\\w+)'))[1];
    </script>
    <script src="<?php echo e(asset('js/anti-csrf.js')); ?>"></script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\desakuansing\resources\views/admin/layouts/components/token.blade.php ENDPATH**/ ?>