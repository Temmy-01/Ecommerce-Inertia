<template>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class="mdi mdi-home"></i>
                    </span> Dashboard
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="card">
                <div class="card-body">
                    <inertia-link class="btn btn-primary btn-sm card-title mb-4 text-right" href="/slider/create">Create</inertia-link>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th> Slider Image </th>
                                <!-- <th> Progress </th> -->
                                <th> Position </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="slider in sliders" :key="slider.id">
                                <td> {{ slider.id }}</td>
                                <td>
                                    <img :src="'/storage/'+slider.image" />
                                </td>
                                <td> {{ slider.position }} </td>

                                <td> 
                                    <inertia-link 
                                        class="btn btn-primary btn-sm"
                                        :href="`/slider/${slider.id}/edit`"
                                        >Edit
                                    </inertia-link> &nbsp;
                                    <inertia-link 
                                        class="btn btn-primary btn-sm"
                                        @click="destroy(`${slider.id}`)"
                                        as="button"
                                        >Delete
                                    </inertia-link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
        sliders:Object  //this comes from controller and becomes props
    },
    methods: {
       destroy(id){
        if(confirm("Are you sure you want to delete this record?")){
            this.$inertia.post(`/slider/${id}/delete`)
        }
       } 
    }
};
</script>

<style>
</style>
