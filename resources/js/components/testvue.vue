<template>
    <div>
        <div class="container">
            <h2 class="text-center">แสดงข้อมูล</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>City</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <tr v-for="data in vuedata">
                    <td>{{data.id}}</td>
                    <td>{{data.name}}</td>
                    <td>{{data.city}}</td>
                    <td><a href="#" class="btn btn-primary">Edit</a></td>
                    <td><a href="#" class="btn btn-danger">Delete</a></td>
                </tr>
            </table>
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
