<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Detail</th>
                    <th>Maintain</th>
                    <th>Sold</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Company</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="(d,index) in data" v-bind:key="d.id">
                    <td>{{d.id}}</td>
                    <td>{{d.name}}</td>
                    <td>{{d.detail}}</td>
                    <td>{{d.maintainstatus}}</td>
                    <td>{{d.solddate}}</td>
                    <td>{{d.startdate}}</td>
                    <td>{{d.enddate}}</td>
                    <td>{{d.company_id}}</td>
                    <td><a :href="'/programs/'+d.id+'/edit'" class="btn btn-primary">Edit</a></td>
                    <td><a href="javascript:;" class="btn btn-danger" v-on:click="deleteData(d.id,index)">Delete</a></td>
                </tr>
            </table>
                <a href="programs/create" class="btn btn-primary">Add New</a>
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
                axios.get('api/programs').then(response=>{
                       // console.log(response); 
                       this.data=response.data;
                });
            },
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/programs/'+id).then(response=>{
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
                    detail:'',
                    maintainstatus:'',
                    solddate:'',
                    startdate:'',
                    enddate:'',
                    company_id:''
                }
            }
        }

    }
</script>

<style lang="css">
</style>
