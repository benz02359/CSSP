<template>
    <div>
        <div class="container">
            <h1>Add new</h1>
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
                    <button class="btn btn-primary" v-on:click="addNewData()">Add:</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            company_id:'',
            pro_id:'',
            detail:''
        }
    },
    methods:{
        addNewData(){
            //console.log(this.name);
            //console.log(this.city);
            axios.post('/api/sales',{
                company_id:this.company_id,
                pro_id:this.pro_id,
                detail:this.detail
            });
        }
    }
}
</script>