<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <table class="table table-bordered" width="auto">
                <!--<tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>  
                    <th>Telephone</th>       
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>-->
                <tr v-for="c in cdata" v-bind:key="c.id">
                    <!--<td>{{data.id}}</td>-->
                    <td ><a :href="'/companies/'+c.id">{{c.name}}</a></td>
                    <!--<td>{{data.email}}</td>
                    <td>{{data.tel}}</td>
                    <td>{{data.address}}</td>
                    <td><a :href="'/companies/'+data.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(data.id,index)">Delete</a></td>-->
                </tr>
            </table>
                <!--<a href="companies/create" class="btn btn-primary">Add New</a>-->
        </div>
    </div>

</template>

<script>
    export default {
        mounted(){
            this.getComData();
        },
        methods:{
            getComData(){
                //console.log("ข้อมูล")
                axios.get('api/companies').then(response=>{
                       //console.log(stdata.name); 
                       this.cdata=response.data;
                       //console.log(response.data); 
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/companies/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.cdata.splice(index,1);
                });
            }            
        },

        data(){
            return{
                cdata:[],
                data:{
                    id:0,
                    name:'',
                    email:'',
                    tel:'',
                    address:'',
                }
            }
        }

    }
</script>

<style lang="css">
</style>
