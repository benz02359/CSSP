<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <table class="table table-bordered" width="auto">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="(d,index) in data" v-bind:key="d.id">
                    <td>{{d.id}}</td>
                    <td>{{d.name}}</td>
                    <td><a :href="'/deps/'+d.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(d.id,index)">Delete</a></td>
                </tr>
            </table>
                <a href="deps/create" class="btn btn-primary">Add New</a>
        </div>
    </div>

</template>

<script>
    export default {
        mounted(){
            this.getVueData();
        },
        methods:{
            getVueData(){
                //console.log("ข้อมูล")
                axios.get('api/deps').then(response=>{
                       //console.log(stdata.name); 
                       this.data=response.data;
                       //console.log(response.data); 
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/deps/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.data.splice(index,1);
                });
            }            
        },

        data(){
            return{
                data:[],
                data:{
                    id:0,
                    name:'',
                }
            }
        }

    }
</script>

<style lang="css">
</style>
