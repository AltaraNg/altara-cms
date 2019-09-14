<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-default mb-5">
            <div class="container">
                <a class="navbar-brand" href="#">Altara</a>
                <!-- <div class="logo navbar-brand">
                     <a href="http://www.altaracredit.com/" class="photo logo-mini">
                         <img src="/images/altara_logo.png" height="38" alt="altara-logo">
                     </a>
                 </div>-->
                <button class="navbar-toggler"
                        type="button"
                        data-toggle="collapse"
                        data-target="#navbar-default"
                        aria-controls="navbar-default"
                        aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar-default">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <router-link to="/">Altara Credit Ltd.</router-link>
                            </div>
                            <div class="col-6 collapse-close">
                                <button type="button" class="navbar-toggler" data-toggle="collapse"
                                        aria-expanded="false" data-target="#navbar-default"
                                        aria-controls="navbar-default" aria-label="Toggle navigation">
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav ml-lg-auto">
                        <li class="nav-item">
                            <router-link class="nav-link d-flex align-items-center" to="/">
                                <i class="fas fa-home mb-1 mr-2"></i>
                                Home <span class="sr-only">(current)</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="http://www.altaracredit.com">
                                <i class="fas fa-globe-africa mb-1 mr-2"></i>
                                Go to site
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>
<script>
    export default {}
</script>