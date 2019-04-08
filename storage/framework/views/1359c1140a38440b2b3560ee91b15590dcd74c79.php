<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div>
                    <h3><?php echo e($settings->name); ?></h3>
                </div>
                <p></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div>
                    <a href="#"><?php echo e($settings->contact_number); ?></a>
                    <p>Mon-Fri 9am-6pm</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div>
                    <a href="#"><?php echo e($settings->email); ?></a>
                    <p>Online support</p>
                </div>            
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div>
                    <a href=""><?php echo e($settings->contact_address); ?></a>
                </div>
            </div>
        </div>
    </div>
</footer>