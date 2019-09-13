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
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Go to site</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</template>


<script>
    /* import Auth from "../store/auth";
     import {post} from "../helpers/api";
     import Flash from "../helpers/flash";*/

    export default {
       // props: ['catalog', 'guest', 'auth'],
    }
</script>