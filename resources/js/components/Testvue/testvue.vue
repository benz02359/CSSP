<template>
    <div>
        <div class="container">
            <h2 class="text-center">แสดงข้อมูลA</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="(data,index) in vuedata" v-bind:key="data.id">
                    <td>{{data.id}}</td>
                    <td>{{data.name}}</td>
                    <td>{{data.city}}</td>
                    <td><a :href="'/testvues/'+data.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(data.id,index)">Delete</a></td>
                </tr>
            </table>
                <a href="testvues/create" class="btn btn-primary">Add New</a>
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
                //console.log("ช้อมูล")
                axios.get('api/testvues').then(response=>{
                       // console.log(response); 
                       this.vuedata=response.data;
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/testvues/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.vuedata.splice(index,1);
                });
            }            
        },

        data(){
            return{
                vuedata:[],
                data:{
                    id:0,
                    name:'',
                    city:''
                }
            }
        }

    }
</script>

<style lang="css">
</style>
