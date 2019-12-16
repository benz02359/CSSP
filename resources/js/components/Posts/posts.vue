<template>
    <div>
        
            
            <table class="table table-bordered table-hover  table-striped" style="background-color: #ffffff ;">                
                <tbody>
                    <tr v-for="p in postdata" v-bind:key="p.id">
                        <td><b><a :href="'/posts/'+p.id">{{p.title}}</a></b>
                            <table width="100%" style="background-color: transparent;">
                                <tr>
                                    <td width="50%" style="border:none"><font size='2'>By {{p.user_id}} created at {{p.created_at}}</font></td>
                                    <td style="text-align:right;">
                                        <font size='2' style="padding-right:2px"><a href="#">{{p.pro_id}}</a></font>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>{{p.view}}</td>
                    </tr>
                </tbody>
            </table>
                
        
    </div>

</template>

<script>
    export default {
        mounted(){
            this.getPostData();
            console.log();
        },
        methods:{
            getPostData(){
                //console.log("ช้อมูล")                
                axios.get('api/posts').then(response=>{
                       console.log(response);
                       this.postdata=response.data;
                });
            },            
            deleteData(id,index){
                //console.log(id);
                axios.delete('api/posts/'+id).then(response=>{
                       //console.log(response); 
                       //this.vuedata=response.data;
                       this.postdata.splice(index,1);
                });
            }            
        },

        data(){
            return{
                postdata:[],
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
