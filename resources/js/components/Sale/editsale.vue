<template>
    <div>
        <div class="container">
            <h1>Update</h1>
            <form action="/sales">
                <div class="form-group">
                    <label>Company:</label>
                    <input type="text" class="form-control" v-model="company_id">
                </div>
                <div class="form-group">
                    <label>Program:</label>
                    <input type="text" class="form-control" v-model="pro_id">
                </div>
                <div class="form-group">
                    <label>Detail:</label>
                    <input type="text" class="form-control" v-model="detail">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" v-on:click="updateData()">Update</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    props:['id'],
    data(){
        return{
            company_id:'',
            pro_id:'',
            detail:''
        }
    },mounted(){
        axios.get('/api/sales/'+this.id).then(response=>{
            //console.log(response.data);
            //console.log(this.id);
            var data = response.data;
            this.company_id=data.company_id;
            this.pro_id=data.pro_id;
            this.detail=data.detail;
        });
    },
    methods:{
        updateData(){
            axios.put('/api/sales/'+this.id,{
                company_id:this.company_id,
                pro_id:this.pro_id,
                detail:this.detail
            });
        }
    }
}
</script>