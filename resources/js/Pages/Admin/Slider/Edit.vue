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
                <span></span>Slider/Edit
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
                    <label for="sl-position">Position</label>
                    <input
                      type="integer"
                      v-model="form.slider_position"
                      class="form-control"
                      id="sl-position"
                      
                      placeholder="Slider Position"
                    />
                    
                    <div v-if="errors.slider_position" style="color:red">
                        {{ errors.slider_position }}
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sl-img">Choose Image</label>
                    <input
                    type="file"
                    accept="image/*"
                    @input="form.slider_image =$event.target.files[0]"
                      class="form-control"
                      id="sl-img"
                    />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                      {{ form.progress.percentage }}%
                    </progress>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputPassword1"
                      placeholder="Password"
                    />
                  </div>
                  <div class="form-group">
                    <label for="exampleInputConfirmPassword1"
                      >Confirm Password</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      id="exampleInputConfirmPassword1"
                      placeholder="Password"
                    />
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" /> Remember
                      me <i class="input-helper"></i
                    ></label>
                  </div> -->
                  <button 
                    type="submit" 
                    :disabled="form.progress"
                    class="btn btn-gradient-primary me-2"
                  >
                    Submit
                  </button>
                  <inertia-link href="/slider" class="btn btn-light">
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
//   import { object } from "@babel/types";
import AdminLayout from "../../../Shared/AdminLayout";
  export default {
      
    layout: AdminLayout,
    props:{
        errors:Object,
        slider:Object  //it comes from controller
    },

    data() {
      return {
        form:this.$inertia.form({
          slider_position: this.slider.position ?? null,
          slider_image: null
        })
      };
    },
    methods:{
      submit(){
        this.form.post(`/slider/${this.slider.id}/update`);
      },
    },
  };
  
  
  
  
  
  </script>
  
  <style>
  </style>
  