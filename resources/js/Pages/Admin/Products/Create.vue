<template>
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span>
          Dashboard
        </h3>
        <nav aria-label="breadcrumb">
          <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
              <span></span>Product/Create
              <i
                class="
                  mdi mdi-alert-circle-outline
                  icon-sm
                  text-primary
                  align-middle
                "
              ></i>
            </li>
          </ul>
        </nav>
      </div>

      <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <!-- <h4 class="card-title">Default form</h4>
              <p class="card-description">Basic form layout</p> -->
              <form class="forms-sample" @submit.prevent="submit" accept="multipart/form-data">
                <div class="form-group">
                  <label for="sl-name">Product Name</label>
                  <input
                    type="integer"
                    v-model="form.name"
                    class="form-control"
                    id="sl-name"
                    
                    placeholder="Product Name"
                  />
                  <div v-if="errors.name" style="color:red">
                      {{ errors.name }}
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="sl-name">Description</label>
                  <textarea 
                    cols="30" 
                    rows="10"
                    v-model="form.description"
                    class="form-control"
                    id="sl-name" >
                  </textarea>
                  <div v-if="errors.description" style="color:red">
                      {{ errors.description }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="sl-name">Product Qty</label>
                  <input
                    type="integer"
                    v-model="form.qty"
                    class="form-control"
                    id="sl-name"
                    
                    placeholder="Product Qty"
                  />
                  <div v-if="errors.qty" style="color:red">
                      {{ errors.qty }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="sl-name">Product Price</label>
                  <input
                    type="integer"
                    v-model="form.price"
                    class="form-control"
                    id="sl-name"
                    
                    placeholder="Product Price"
                  />
                  <div v-if="errors.price" style="color:red">
                      {{ errors.price }}
                  </div>
                </div>

                <div class="form-group">
                  <label for="sl-name">Product Sale price</label>
                  <input
                    type="integer"
                    v-model="form.sale_price"
                    class="form-control"
                    id="sl-name"
                    
                    placeholder="Product Sale Price"
                  />
                  <div v-if="errors.sale_price" style="color:red">
                      {{ errors.sale_price }}
                  </div>
                </div>
                <div class="form-group">
                  <label for="sl-img">Choose Image</label>
                  <input
                  @input="form.image =$event.target.files[0]"
                    type="file"
                    accept="image/*"
                    class="form-control"
                    id="sl-img"
                  />
                  <div v-if="errors.image" style="color:red">
                    {{ errors.image }}
                  </div>
                  <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                    {{ form.progress.percentage }}%
                  </progress>
                </div>
                
                <button 
                  type="submit" 
                  :disabled="form.progress"
                  class="btn btn-gradient-primary me-2"
                >
                  Submit
                </button>
                <inertia-link href="/product" class="btn btn-light">
                    Back
                </inertia-link>
                <!-- <a href="/slider" class="btn btn-light">Back</a> -->
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import AdminLayout from "../../../Shared/AdminLayout";
export default {
    
  layout: AdminLayout,
  props:{
        errors:Object,
    },
  data() {
    return {
      form:this.$inertia.form({
        name: null,
          description: null,
          qty: null,
          price: null,
          sale_price: null,
          image:null
      })
    };
  },
  methods:{
    submit(){
      this.form.post('/product/store')
    },
  },
};





</script>

<style>
</style>
