import axios from 'axios';
window.Vue = require('vue');
window._ = require('lodash');

var _URL = [];
_URL['event'] = $("#url-api-event").text();
_URL['detail'] = $("#url-event-detail").text();
_URL['register'] = $("#url-event-register").text();
$('.rm').remove();

var app = new Vue({
	el : "#event_list",
	data : {
		months : ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
		events : [],
		range : [1, 2, 3, 4],
		current_pos : 1,
		pagination_count : 1,
		pagination_max_length : 7,
		filter : '',
		onloading : false,
		onkeyup : false
	},
	watch : {
		filter : function(newVal, oldVal){
			this.onkeyup = true;
			this.debounceGetlist();
		}
	},	
	methods : {
		register : function(id){
			window.location = _URL.register.replace('/0', '/'+id);
		},
		detail : function(id){
			window.location = _URL.detail.replace('/0', '/'+id);
		},
		load_event : function(){
			let e = this;
			this.onloading = true;
			this.onkeyup = false;
			axios.post(_URL.event , {
				filter_mode : this.filter != '',
				filter : this.filter,
				paginate_position : this.current_pos
			})
			.then(function (response) {
				e.pagination_count = response.data.paginate_count;
				e.events = response.data.data;
				e.arrange_range();
				e.onloading = false;
			})
			.catch(function (error) {

			});  			
		},
		arrange_range : function(){
			this.range = [];

			let mi = 0;
			if( (this.current_pos - this.pagination_div) <= 0 ){
				mi = 1;
			}
			else if( (this.current_pos + this.pagination_div) > this.pagination_count ){
				mi = this.pagination_count - (this.pagination_max_length - 1);
			}
			else{
				mi = this.current_pos - this.pagination_div;
			}

			for(let i = mi; i <= Math.min( this.pagination_count, mi + (this.pagination_max_length-1) ) ; i++){
				this.range.push(i);
			}
		},
		get_day : function(arr){
			let s = arr[2];
			if( Number(s) < 10 )
				s = s[1];
			return s;
		},
		the_date : function(started_at, ended_at){
			let started_dates = started_at.split('-');
			let ended_dates = ended_at.split('-');
			let sd = {
				'D' : this.get_day(started_dates), 'M' : this.months[ Number(started_dates[1]) - 1], 'Y' : started_dates[0]
			};
			let ed = {
				'D' : this.get_day(ended_dates), 'M' : this.months[ Number(ended_dates[1]) - 1], 'Y' : ended_dates[0]
			};
			let sds = '';
			if( sd['Y'] != ed['Y'] ){
				sds = sd['D']+' '+sd['M']+' '+sd['Y']+'-';
			} else if( sd['M'] != ed['M'] ){
				sds = sd['D']+' '+sd['M']+'-';
			} else if( sd['D'] != ed['D'] ){
				sds = sd['D']+'-';
			}

			return sds+ed['D']+' '+ed['M']+' '+ed['Y'];			
		},
		increase_index : function(){
			if( this.current_pos == this.pagination_count )
				return;			
			this.current_pos++;
			this.load_event();
		},
		decrease_index : function(){
			if( this.current_pos == 1 )
				return;
			this.current_pos--;
			this.load_event();
		},
		first_paginate_index : function(){
			this.current_pos = 1;
			this.load_event();
		},
		last_paginate_index : function(){
			this.current_pos = this.pagination_count;
			this.load_event();
		},		
		select_pagination_index : function(index){
			this.current_pos = index;
			this.load_event();
		}
	},
	computed : {
		pagination_div : function(){
			return Math.floor( this.pagination_max_length / 2 );
		}
	},
	created : function () {
		this.load_event();
		this.debounceGetlist = _.debounce(this.load_event, 500);
	}
});