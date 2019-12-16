<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <table class="table table-bordered" width="auto">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>  
                    <th>Telephone</th>       
                    <th>Language</th>        
                    <th>Position</th>  
                    <th>Department</th> 
                    <th>Program</th>          
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="(data,index) in stdata" v-bind:key="data.id">
                    <td>{{data.id}}</td>
                    <td>{{data.name}}</td>
                    <td>{{data.email}}</td>
                    <td>{{data.tel}}</td>
                    <td>{{data.language}}</td>
                    <td>{{data.position}}</td>
                    <td>{{data.dep_id}}</td>
                    <td>{{data.pro_id}}</td>
                    <td><a :href="'/staffs/'+data.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(data.id,index)">Delete</a></td>
                </tr>
            </table>
                <a href="staffs/create" class="btn btn-primary">Add New</a>
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
                axios.get('api/staffs').then(response=>{
                       //console.log(stdata.name); 
                       this.stdata=response.data;
                       console.log(response.data); 
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/staffs/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.stdata.splice(index,1);
                });
            }            
        },

        data(){
            return{
                stdata:[],
                data:{
                    id:0,
                    name:'',
                    email:'',
                    tel:'',
                    language:'',
                    position:'',
                    image:'',
                    dep_id:'',                    
                    pro_id:'',
                    user_id:''
                }
            }
        }

    }
</script>

<style lang="css">
</style>
