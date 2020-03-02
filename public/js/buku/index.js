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
                dataBuku: []
            }
        },
        methods:{
            loadBuku: function (){
                // load data buku
                axios.get('/api/v1/buku')
                .then(response => {
                    console.log(response);
                    this.dataBuku = response.data;
                }).catch(error => console.error(error));
            }
        },
        mounted: function () {
            if(typeof pjax !== 'undefined'){
                pjax.refresh();
            }
            this.loadBuku();
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
