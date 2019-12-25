/**
 * init
 */
function initVue() {
    var vm = new Vue({
        el: '#app',
        data: {
            searchQuery: '',
            searchQueryResult: '',
            dataBuku: [],
            totalItem: 0,
            itemDisplay: 0,
            isAjaxRunning: false,
            showAlert: false,
            alertType: 'warning',
            alertMessage: ''
        },
        methods:{
            doSearch: function(q){
                var vm = this;
                var url = this.$el.getAttribute('data-url-search');
                if(q === ""){
                    q = $('#app').data('search-query');
                }
                $.ajax({
                    url: url,
                    method: 'GET',
                    dataType: 'json',
                    data:{
                        q: q
                    },
                    beforeSend: function () {
                        vm.isAjaxRunning = true;
                    },
                    complete: function (xhr, s) {
                        vm.isAjaxRunning = false;
                    },
                    error: function (x, s) {
                        vm.showNotification('Something happened: '+s);
                    },
                    success: function (d, s, x) {
                        if(d.status){
                            vm.dataBuku = d.data.data;
                            vm.totalItem = d.data.total;
                            vm.itemDisplay = d.data.data.length;
                        }else{
                            vm.showNotification('Something happened: '+d.message);
                        }
                    }
                });
                this.searchQuery = q;
                this.searchQueryResult = q;
            },
            clickToSearch: function (e) {
                this.doSearch(this.searchQuery);
            },
            showNotification: function (message = '', type='warning') {
                this.showAlert = true;
                this.alertMessage = message;
                this.alertType = type;
            }

        },
        mounted: function () {
            if(typeof pjax !== 'undefined'){
                pjax.refresh();
            }
            var initQuery = $('#app').data('search-query');
            this.searchQuery = initQuery;
            this.doSearch(initQuery);
        },
        components: {
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
