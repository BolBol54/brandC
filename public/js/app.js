class Errors{
    constructor()
    {
        this.errors = {};
    }
    get(field)
    {
        if(this.errors[field])
        {
           return this.errors[field][0];
        }
    }
    record(errors)
    {
        this.errors = errors
    }
}
new Vue({
    el: "#app",
    data :{
        name : "",
        description : "",
        errors : new Errors()
    },
    methods: {
        onSubmit : function() {
            axios.post('/categories',this.$data).then(response=> alert('success')
            ).catch(error =>this.errors.record(error.response.data));
            console.log(this.errors);
        }
    },
})
