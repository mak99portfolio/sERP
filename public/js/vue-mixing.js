var custom={
	data:function(){

		return {
			loading:$.loading(),
			response:null
		}
		
	},
	methods:{
		dFormat:function(val){
            return moment(val).format('DD MMM YYYY');
        },
	    parse_num:function(val){
	        if(typeof val=='undefined') return 0.00;
	        else if(parseFloat(val)) return parseFloat(val);
	        else return 0.00;
	    },
	    alert:function(msg='Sorry!, try again later.', type='error'){
	        new PNotify({
	          title: 'Message',
	          text: msg,
	          type: type,
	          styling: 'bootstrap3'
	        });
	    },
        fetch_resource:function(url, reference, callback=null, params=null){

        	var ref=this;
            ref.loading.open(3000);

            axios.get(url, {params: params}).then(function(response){

                reference.data=response.data.data;
                ref.loading.close();
                if(typeof callback==='function'){
                    callback();
                }

            }).catch(function(){

                ref.loading.close();
                ref.alert('Sorry!, failed to fetch remote data.');


            });

        },
        fetch_remote:function(url, callback=null, params=null){

        	var ref=this;
            ref.loading.open(3000);

            axios.get(url, {params: params}).then(function(response){

                ref.response=response.data;
                ref.loading.close();
                if(typeof callback==='function') callback();
                ref.response=null;

            }).catch(function(error){

                ref.loading.close();
                ref.alert('Sorry!, failed to fetch remote data.');


            });

        }
	}
}
