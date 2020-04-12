/**
 *  Templates
 */
var vcMainTemplate = {
    template: '#vc-buku-search',
    props:{

    },
    data: function(){
        return{

        }
    },
    methods:{

    },
    mounted: function () {

    }
};

/**
 * init
 */
function initVue() {
    var vm = new Vue({
        el: '#app',
        data: function() {
            return {
                // adas: 'asd',
                buku: {}
            }
        },
        methods:{
            updateBuku: function (id){
                console.log('asd');
                // store data buku
                axios.post('/api/v1/buku/detail/'+id, {
                    buku: this.buku
                }).then(response => {
                    console.log(response);
                    window.location.replace("/buku");
                    this.buku = response.data;
                }).catch(error => console.error(error));
            }
        },
        mounted: function () {
            if(typeof pjax !== 'undefined'){
                pjax.refresh();
            }
        },
        components: {
            // 'vc-buku-search': vcMainTemplate
        }
    });
    $('.app-placeholder').addClass('d-none');
    $('.main_content_app').removeClass('d-none');
}
try{
    initVue();
}catch (e) {
    window.location.reload();
}
