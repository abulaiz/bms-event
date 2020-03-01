require('../../plugin/custom_toastr.js');

import axios from 'axios';
var _URL = [];
_URL['scan'] = $("#url-api-attendance-scan").text();
_URL['index'] = $("#url-api-attendance-list").text();
_URL['events'] = $("#url-api-event-active").text();

var selectizes = $('.selectizes').selectize();
var s = selectizes[0].selectize;

// window._leftAlert('title', 'text', 'info');

axios.get(_URL.events)
.then(function (response) {
  for(let i = 0; i < response.data.length; i++){
    s.addOption({value : response.data[i].id, text : response.data[i].name});
  }
});

var history = new Vue({
  el : "#scan-history",
  data : {
    registrant : [],
    displayed : false
  },
  methods : {
    load_registrant : function(){
      let e = this;
      axios.get( _URL.index.replace('/0', '/'+s.items[0]) )
      .then(function (response) {
          e.registrant = [];
          for(let i = 0; i < response.data.length; i++){
            e.registrant.push( response.data[i] );
          }
      })        
    }
  }
});

var scanner = new Vue({
      el: '#scan',
      data : {
          decodedContent: '',
          errorMessage: '',
          scanMode : false,
          result_name : '',
          displayed : false
      },

      methods: {
        onDecode(content) {
          let e = this;
          this.decodedContent = content;
          if(this.decodedContent == '') return;
          axios.post(_URL.scan , {
            event_id :  s.items[0] ,
            flag : this.decodedContent
          })
          .then(function (response) {
            if(response.data.success){
              e.result_name = response.data.name;
              window._leftAlert('Yeay !', 'Successfully scan QrCode as '+response.data.name, 'success');
              history.load_registrant();
            } else {
              window._leftAlert('Failed !', response.data.message, 'error');
            }

          })
          .catch(function (error) {
            window._leftAlert('Failed !', 'Something wrong :(', 'error');
          });           
        },

        onInit(promise) {
          promise.then(() => {
              console.log('Successfully initilized! Ready for scanning now!')
            })
            .catch(error => {
              if (error.name === 'NotAllowedError') {
                this.errorMessage = 'Hey! I need access to your camera'
              } else if (error.name === 'NotFoundError') {
                this.errorMessage = 'Do you even have a camera on your device?'
              } else if (error.name === 'NotSupportedError') {
                this.errorMessage = 'Seems like this page is served in non-secure context (HTTPS, localhost or file://)'
              } else if (error.name === 'NotReadableError') {
                this.errorMessage = 'Couldn\'t access your camera. Is it already in use?'
              } else if (error.name === 'OverconstrainedError') {
                this.errorMessage = 'Constraints don\'t match any installed camera. Did you asked for the front camera although there is none?'
              } else {
                this.errorMessage = 'UNKNOWN ERROR: ' + error.message
              }
            })
        }
      }
})

s.on('change', function(){
  if(s.items.length == 0) {
    history.$data.displayed = false;
    scanner.$data.displayed = false;
  } else {
    history.load_registrant();
    history.$data.displayed = true;
    scanner.$data.displayed = true;    
  }
    
});