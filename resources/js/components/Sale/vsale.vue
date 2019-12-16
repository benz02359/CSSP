<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Company</th>
                    <th>Program</th>  
                    <th>Detail</th>                    
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="(d,index) in data" v-bind:key="d.id">
                    <td>{{d.id}}</td>
                    <td>{{d.company_id}}</td>
                    <td>{{d.pro_id}}</td>
                    <td>{{d.detail}}</td>
                    <td><a :href="'/sales/'+d.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(d.id,index)">Delete</a></td>
                </tr>
            </table>
                <a href="sales/create" class="btn btn-primary">Add New</a>
        </div>
    </div>

</template>

<script>
    export default {
        mounted(){
            this.getVueData();
            console.log("ข้อมูล")
        },
        methods:{
            getVueData(){
                //console.log("ช้อมูล")
                axios.get('api/sales').then(response=>{
                       console.log(response); 
                       this.data=response.data;
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/sales/'+id).then(response=>{
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
                    company_id:'',
                    pro_id:'',
                    detail:''
                }
            }
        }

    }
</script>

<style lang="css">
</style>
