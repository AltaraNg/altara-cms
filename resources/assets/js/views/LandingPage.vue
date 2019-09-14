<template>
   <div class="container">
                <div class="logo">
                    <a href="http://www.creative-tim.com/" class="photo logo-mini">
                         <img src="/images/altara_logo.png" width="134" height= "50" alt="">
                    </a>
                </div>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    Altara 1.0
                </div>
            <div class="links">
                  	<router-link to="/catalog">Catalog</router-link>
                    <a href="http://altaracredit.com">Website</a>
                    <router-link to="/cms">CMS</router-link>
            </div>
        </div>
        </div>
   </div>
</template>
<script type="text/javascript">
export default {
  components: {},
  data() {
    return {};
  },
  computed: {},
  watch: {},
  created() {},
  methods: {}
};
</script>
<style>/*

.flex-center {
  align-items: center;
  display: flex;
  justify-content: center;
}

.position-ref {
  position: relative;
}

.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.content {
  text-align: center;
}

.title {
  font-size: 84px;
}

.links > a , .links > router-link {
  color: #003366;
  padding: 0 25px;
  font-size: 12px;
  font-weight: 600;
  letter-spacing: 0.1rem;
  text-decoration: none;
  text-transform: uppercase;
}

.m-b-md {
  margin-bottom: 30px;
}*/
</style>
