

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper mt-2">
        <section class="content">
            <div class="row" id="editor">
                <div class="col-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">

                            <span class="font-weight-bold">Служба поддержки</span>

                        </div>
                        <div class="card-body">
                            <div class="container px-4">
                                <div class="row rounded-lg overflow-hidden shadow">
                                    <div class="col-5 px-0">
                                        <div class="bg-white">
                                            <div class="bg-gray px-4 py-2 bg-light">
                                                <p class="h5 mb-0 py-1">Recent</p>
                                            </div>
                                            <div class="messages-box">
                                                <div class="list-group rounded-0">
                                                    <a href="#"
                                                       class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                                        <div class="media-body ml-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-1">
                                                                <h6 class="mb-0">Jason Doe</h6><small
                                                                    class="small font-weight-bold">14 Dec</small>
                                                            </div>
                                                            <p class="font-italic text-muted mb-0 text-small">Lorem
                                                                ipsum dolor sit amet, consectetur. incididunt ut
                                                                labore.</p>
                                                        </div>

                                                    </a>
                                                    <a href="#"
                                                       class="list-group-item list-group-item-action list-group-item-light rounded-0">
                                                        <div class="media-body ml-4">
                                                            <div
                                                                class="d-flex align-items-center justify-content-between mb-1">
                                                                <h6 class="mb-0">Jason Doe</h6><small
                                                                    class="small font-weight-bold">9 Nov</small>
                                                            </div>
                                                            <p class="font-italic text-muted mb-0 text-small">
                                                                consectetur adipisicing elit, sed do eiusmod tempor
                                                                incididunt ut labore.</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Chat Box-->
                                    <div class="col-7 px-0">
                                        <div class="px-4 py-3 chat-box bg-white">
                                            <!-- Sender Message-->
                                            <div class="media w-75 mb-3">
                                                <div class="media-body ml-3">
                                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                                        <p class="text-small mb-0 text-muted">Test which is a new
                                                            approach all solutions</p>
                                                        <p class="small text-right m-0 mt-3">12:00 PM</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reciever Message-->
                                            <div class="media w-75 ml-auto mb-3">
                                                <div class="media-body">
                                                    <div class="bg-primary rounded py-2 px-3 mb-2">
                                                        <p class="text-small mb-0 text-white">Test which is a new
                                                            approach to have all solutions</p>
                                                        <p class="small text-right m-0 mt-3">12:00 PM</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- Sender Message-->
                                            <div class="media w-75 mb-3">
                                                <div class="media-body ml-3">
                                                    <div class="bg-light rounded py-2 px-3 mb-2">
                                                        <p class="text-small mb-0 text-muted">Test, which is a new
                                                            approach to have</p>
                                                        <p class="small text-right m-0 mt-3">12:00 PM</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Typing area -->
                                        <form action="#" class="bg-light">
                                            <div class="input-group">
                                                <input type="text" placeholder="Type a message"
                                                       aria-describedby="button-addon2"
                                                       class="form-control rounded-0 border-0 py-4 bg-light">
                                                <div class="input-group-append">
                                                    <button id="button-addon2" type="submit" class="btn btn-link"><i
                                                            class="fa fa-paper-plane"></i></button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin._layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\extra_cinema\cinema_back\resources\views/admin/support/index.blade.php ENDPATH**/ ?>