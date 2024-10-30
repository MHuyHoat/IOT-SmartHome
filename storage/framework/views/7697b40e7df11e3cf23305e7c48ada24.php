<?php $__env->startSection('content'); ?>
<div class="container mt-3">
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-tint fa-2x"></i>
                    <p>75%</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-thermometer-half fa-2x"></i>
                    <p>27°C</p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body text-center">
                    <i class="fas fa-bolt fa-2x"></i>
                    <p>55kWh</p>
                </div>
            </div>
        </div>
    </div>
    <h5 class="mt-3">Rooms</h5>
    <div class="d-flex">
        <div class="card room-card active">
            <div class="card-body text-center">
                <p>Living Room</p>
                <p>3 devices</p>
            </div>
        </div>
        <div class="card room-card">
            <div class="card-body text-center">
                <p>Bedroom</p>
                <p>4 devices</p>
            </div>
        </div>
        <div class="card room-card">
            <div class="card-body text-center">
                <p>Kitchen</p>
                <p>2 devices</p>
            </div>
        </div>
    </div>
    <div class="gauge">
        <div class="percentage">0%</div>
    </div>
    <h5>Lights</h5>
    <div class="switch">
        <span>Overhead</span>
        <span>Off</span>
        <input class="form-check-input" type="checkbox">
    </div>
    <div class="switch">
        <span>Lamp</span>
        <span>On</span>
        <input class="form-check-input" type="checkbox" checked>
    </div>
    <div class="switch">
        <span>Pendant</span>
        <span>Off</span>
        <input class="form-check-input" type="checkbox">
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Web nhúng\IOT-SmartHome\resources\views/pages/dashboard.blade.php ENDPATH**/ ?>