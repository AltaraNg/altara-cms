<template>
    <footer class="footer bg-white shadow-sm mt-4">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-lg-6">
                    <h4 class="text-primary mb-2">Thank you for patronizing us!</h4>
                    <h6 class="font-weight-bold">Let's get in touch, call us on 08100000000.</h6>
                </div>
                <div class="col-lg-6 text-lg-center btn-wrapper">
                    <a target="_blank" href="javascript:"
                       class="btn btn-neutral btn-icon-only btn-facebook btn-round btn-lg" data-toggle="tooltip"
                       data-original-title="Like us">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a target="_blank" href="javascript:"
                       class="btn btn-neutral btn-icon-only btn-dribbble btn-lg btn-round" data-toggle="tooltip"
                       data-original-title="Follow us">
                        <i class="fab fa-google"></i>
                    </a>
                </div>
            </div>
            <hr>
            <div class="row align-items-center justify-content-md-between">
                <div class="col-md-6">
                    <div class="copyright font-weight-bold">
                        © {{(new Date).getFullYear()}} Altara Credit Limited.
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav nav-footer justify-content-end">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link clearfix">
                                <i class="fas fa-home mr-1 float-left pt-1"></i>
                                <span class="pt-1 float-left">Home</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a href="http://www.altaracredit.com" class="nav-link clearfix" target="_blank">
                                <i class="fas fa-globe-africa mr-1 float-left pt-1"></i>
                                <span class="pt-1 float-left">Go to site</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {}
</script>
