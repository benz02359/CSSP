<template>
    
</template>

<script>
export default {
    props:['id'], 
    data:{
        com:{
            id:'',
            name:'',
            email:'',
            tel:'',
            address:'',            
        },        
        agent:{
            id:'',
            name:'',
            email:'',
            tel:'',
            company_id:'id',          
        },
        user:{
            id:'',
            name:'',
            email:'',
            tel:'',
            company_id:'id',
        },
        pro:{
            id:'',
            name:'',

        }
    },
        mounted(){
            this.getComData();
            this.getAgentData();
            this.getUserData();
            this.getProData();
        },
        methods:{
            getComData(){
                console.log("ช้อมูล")
                axios.get('/api/companies/'+this.id).then(response=>{
                       console.log(response);
                    var data=response.data;
                    this.title=data.title;
                    this.text=data.text;
                    this.view=data.view;
                    this.user_id=data.user_id;
                    this.pro_id=data.pro_id;
                    this.status=data.status;
                });
            }      
        },
    }

</script>

<style lang="css">
</style>
