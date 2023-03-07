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
              <span></span>Category/Create
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
                  <label for="sl-name">Category Name</label>
                  <input
                    type="integer"
                    v-model="form.category_name"
                    class="form-control"
                    id="sl-name"
                    placeholder="Brand Name"
                  />
                  <div v-if="errors.category_name" style="color:red">
                    {{ errors.category_name }}
                </div>
                </div>
                <div class="form-group">
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
                <inertia-link href="/category" class="btn btn-light">
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
        category_name:null,
      })
    };
  },
  methods:{
    submit(){
      this.form.post('/category/store')
    },
  },
};





</script>

<style>
</style>
