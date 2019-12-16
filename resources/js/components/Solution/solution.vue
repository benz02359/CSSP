<template>
    <div>
        <div class="container">
            <h2 class="text-center"></h2>
            <a href="solutions/create" class="btn btn-primary">New Post</a>
            <table class="table table-bordered table-hover  table-striped" style="background-color: #ffffff ;">
                <thead>
                    <tr>
                        <th width="10%"></th>
                        <th width="60%">Title</th>
                        <th width="10%">View</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="ds in solutiondata" v-bind:key="ds.id">
                        <td></td>                        
                        <td><b><a :href="'/solutions/'+ds.id">{{ds.title}}</a></b>
                            <table width="100%" style="background-color: transparent;">
                                <tr>
                                    <td width="50%" style="border:none"><font size='2'>By {{ds.user_id}} created at {{ds.created_at}}</font></td>
                                    <td style="text-align:right;">
                                        <font size='2' style="padding-right:2px"><a href="#">{{ds.pro_id}}</a></font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>{{ds.view}}</td>
                    </tr>
                </tbody>
            </table>
                
        </div>
    </div>

</template>

<script>
    export default {
        mounted(){
            this.getSolutionData();
            console.log();
        },
        methods:{
            getSolutionData(){
                //console.log("ช้อมูล")                
                axios.get('api/solutions').then(response=>{
                       //console.log(response);
                       this.solutiondata=response.data;
                });
            },            
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/testvues/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.solutiondata.splice(index,1);
                });
            }            
        },

        data(){
            return{
                solutiondata:[],
                data:{
                    id:0,
                    title:'',
                    text:'',
                    view:'',
                    user_id:'',
                    pro_id:''
                }
            }
        },
        

    }
</script>

<style lang="css">
</style>
