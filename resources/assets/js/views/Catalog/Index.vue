<template>
<div>
    <!-- Page Content -->
    <spinner v-if="products.length === 0"/>
    <div v-if="products.length > 0" class="container-fluid">
        <div class="row">
            <sidebar></sidebar>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 portfolio-item" v-for="product in products">
                        <div class="card h-100">
                                <img class="card-img-top" :src="`/images/catalog/${product.image}`" v-if="product.image">
                                <div class="card-body">
                                    <h4 class="card-text">
                                        {{product.name}}  <span style=" float:right;font-size:12px;color:#777777"> {{product.brand}}</span>
                                    </h4>
                                    <div class="info" style="border: 1px solid #E1E1E1;border-radius:10px;">
                                          <table id="" style="font-size:12px;" class="table  ">
                   <thead>
                     <th>Plan</th>
                     <th>First Payment</th>
                      <th>Repayment</th>
                   </thead>
    <tbody>
    <tr>
    <td>20% </td>

    <td>{{ product.twenty_price *0.2 | currency('₦') }} </td>
    <td>{{ Math.round((product.twenty_price - (0.2 * product.twenty_price)) / 12) | currency('₦') }}</td>
    </tr>
    <tr>
    <td>40%</td>
    <td>{{ product.fourty_price *0.4 | currency('₦') }}</td>
    <td>{{ Math.round((product.fourty_price - (0.4 * product.fourty_price)) / 12) | currency('₦') }}</td>
    </tr>
     </tbody>

</table>
                                    </div>
                                     <div class="row">
                                         <div style="margin-top:10px;" class="col-md-12 text-center">
<button @click="showMore(product)" data-toggle="modal" class="btn btn-small btn-primary btn-front" data-target="#myModal1">More details</button>
                                         </div>
                                    </div>


                                </div>

                        </div>
                    </div>

                     <!-- Mini Modal -->
                    <div class="modal fade modal modal-primary" ref="vuemodal" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                    <div class="modal-profile">
                                        <i class="nc-icon nc-bulb-63"></i>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                            <!-- Project One -->
                                            <div class="row">
                                                <div class="col-md-5 content-right">
                                                       <img class="img-fluid rounded mb-3 mb-md-0" :src="`/images/catalog/${viewMore.image}`" v-if="viewMore.image">


                                                </div>
                                                <div class="col-md-6 content-left">
                                                    <div class="row">
                                                        <h3>{{viewMore.name}}  <span style=" float:right;font-size:16px;color:#777777"> {{viewMore.brand}}</span> </h3>
                                                    </div>
<hr>
                                                    <div class="row">
                                                        <div class="info col-md-12">
                                                              <table id="" style="font-size:16px;" class="table  ">
                   <thead>
                     <th>Plan</th>
                     <th>First Payment</th>
                      <th>Repayment</th>
                   </thead>
    <tbody>
    <tr>
    <td>20% </td>

    <td>{{ viewMore.twenty_price *0.2 | currency('₦') }} </td>
    <td>{{ Math.round((viewMore.twenty_price - (0.2 * viewMore.twenty_price)) / 12) | currency('₦') }}</td>
    </tr>
    <tr>
    <td>40%</td>
    <td>{{ viewMore.fourty_price *0.4 | currency('₦') }}</td>
    <td>{{ Math.round((viewMore.fourty_price - (0.4 * viewMore.fourty_price)) / 12) | currency('₦') }}</td>
    </tr>
     </tbody>

</table>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <h4>Product Specification</h4> <br>
                                                        <p>{{viewMore.features}}</p>
                                                    </div>
                                                    <hr>
                                            </div>
                                            <!-- /.row -->
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                          <div class="col-md-4" v-if=" authState.user_id">
                                              <router-link :to="`/product/${viewMore.id}/edit`" data-dismiss="modal" class="btn btn-link btn-simple">
                                              <i class="fa fa-undo"></i> &nbsp;Update
						                        </router-link>|
                                               <button  type="button" class="btn btn-link btn-simple" data-dismiss="modal" @click="remove" :disabled="isRemoving"><i class="fa fa-trash"></i> &nbsp; Delete </button> |
                                        </div>
                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-link btn-simple" data-dismiss="modal"><i class="fa fa-close"></i>&nbsp; Close </button>
                                        </div>
                                        <div class="col-md-6">
<div class="footer">
To buy this product, Kindly visit any Altara Credit Office closest to you, or
Call Us : <a href="tel:08150479425" style="text-decoration:none"> 08150479425</a> for more enquiries
                                                    </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  End Modal -->
                </div>

            </div>
        </div>
        <hr>
    </div>
    <!-- /.container -->
</div>
</template>

<script>
import Spinner from "../../components/Spinner.vue";
import Auth from "../../store/auth";
import { get, del } from "../../helpers/api";
import Sidebar from "../../components/Sidebar.vue";
export default {
  components: {
    Sidebar,
    Spinner
  },
  data() {
    return {
      authState: Auth.state,
      isRemoving: false,
      products: [],
      viewMore: {
        brand_id: null,
        category_id: null,
        created_at: null,
        features: null,
        id: null,
        image: null,
        name: null,
        fourty_price: null,
        twenty_price: null,
        updated_at: null,
        user_id: null,
        brand: null
      }
    };
  },
  created() {
    get("/api/products").then(res => {
      let p = res.data.products;
      let b = res.data.brands;
      p.forEach(element =>
        b.forEach(element2 => {
          if (element.brand_id === element2.id) {
            element.brand = element2.brand;
          }
        })
      );
      this.products = p;
      console.log(this.products);
    });
  },
  methods: {
    showMore(productData) {
      this.viewMore.brand_id = productData.brand_id;
      this.viewMore.category_id = productData.category_id;
      this.viewMore.created_at = productData.created_at;
      this.viewMore.features = productData.features;
      this.viewMore.id = productData.id;
      this.viewMore.image = productData.image;
      this.viewMore.name = productData.name;
      this.viewMore.fourty_price = productData.fourty_price;
      this.viewMore.twenty_price = productData.twenty_price;
      this.viewMore.updated_at = productData.updated_at;
      this.viewMore.user_id = productData.user_id;
      this.viewMore.brand = productData.brand;
    },
    remove() {
      this.isRemoving = false;
      del(`/api/products/${this.$route.params.id}`).then(res => {
        if (res.data.deleted) {
          Flash.setSuccess("You have successfully deleted Product!");
          this.$router.push("/");
        }
      });
    }
  }
};
</script>
<style>/*
.card-text {
  font-weight: 800;
  font-size: 13px;
  line-height: 17px;
}
.card-text h4 {
  text-transform: capitalize;
}
.info {
  padding: 5px;
  border-radius: 0 0 5px 5px;
  margin-top: 1px;
}

!* .info:hover {

} *!
.content-right {
  border-right: 1px solid #ccc;
}
.content-left {
  margin-left: 10px;
}

.card-body:hover {
  background-color: #e0f2ff;
}
.price {
  !*width: 50%;*!
  margin-top: 3px;
}

.price h5 {
  margin: 0;
  font-size: 13px;
}

.tag-price h5 {
  margin: 0;
  font-size: 12px;
  font-weight: normal;
}

.view-more-price h5 {
  margin: 0;
  font-size: 20px;
  font-weight: 900;
}

.view-more-tag-price h5 {
  margin: 0;
  font-size: 15px;
  font-weight: bold;
}

.price-text-color {
  color: #003366;
}
.footer {
  background-color: #003366;
  color: #fff;
  font-size: 12px;
  padding: 5px;
}
.separator {
  border-top: 1px solid #e1e1e1;
}

.clear-left {
  clear: left;
}

.separator p {
  line-height: 20px;
  margin-bottom: 0;
  margin-top: 10px;
  text-align: center;
}

.separator p i {
  margin-right: 5px;
}
.btn-add {
  width: 50%;
  float: left;
}

.btn-add {
  border-right: 1px solid #e1e1e1;
}

.btn-details {
  width: 50%;
  float: left;
  padding-left: 10px;
}
.modal-lg {
  max-width: 80%;
}
.table td,
.table th {
  padding: 0.2rem;
  vertical-align: top;
  border-top: 1px solid #e9ecef;
}
.btn-front {
  display: inline-block;
  font-weight: 300;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 1px solid transparent;
  padding: 0.3rem 0.6rem;
  font-size: 0.75rem;
  line-height: 1.25;
  border-radius: 0.25rem;
  transition: all 0.15s ease-in-out;
}
.card-body {
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
}*/
</style>
