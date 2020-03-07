/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/plugin/crypto.js":
/*!***************************************!*\
  !*** ./resources/js/plugin/crypto.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

var SimpleCrypt = {
  pattern: 'xyzwWXYZabcdN34567OPQefglmnopHIV0128JKqrstuvABCDEhijkFGLMRSTU9',
  maskText: function maskText(x, length) {
    if (length < 5) {
      var pref, intr, suff;

      for (var i = 0, j = 0; i < 5 - length; i++, j += 4) {
        pref = x.substr(0, j);
        intr = this.pattern[Math.floor(Math.random() * 61)] + this.pattern[Math.floor(Math.random() * 61)];
        suff = x.substr(j);
        x = pref + intr + suff;
      }
    }

    var pattern_length = this.pattern.length;
    var ret = this.pattern[length % pattern_length] + x;
    ret = Math.floor(length / pattern_length) + 1 + ret;
    return ret;
  },
  getPos: function getPos(chr) {
    var pattern = this.pattern;

    for (var i = 0; i < pattern.length; i++) {
      if (chr == pattern[i]) return i;
    }
  },
  getText: function getText(x, length) {
    var real = [[2], [2, 6], [2, 6, 8], [2, 4, 6, 8]];
    var txt = "";
    var ptt = real[length - 1];

    for (var i = 0; i < ptt.length; i++) {
      txt += x.substr(ptt[i], 2);
    }

    return txt;
  },
  encrypt: function encrypt(text) {
    text += '';
    var length = text.length;
    var out = "";
    var rr, p, s;

    for (var i = 0; i < length; i++) {
      rr = text[i].charCodeAt(0);
      p = Math.floor(Math.random() * 3) + 2;
      s = Math.floor(rr / p);
      out += this.pattern[s] + "" + this.pattern[p * 10 + rr % p];
    }

    out = this.maskText(out, length);
    return out;
  },
  decrypt: function decrypt(x) {
    var length = this.getPos(x[1]) + (Number(x[0]) - 1) * this.pattern.length;
    x = x.substr(2);

    if (length < 5) {
      x = this.getText(x, length);
    }

    var inn = "";
    var ii, iii, p, num, sisa;

    for (var i = 0; i < x.length; i += 2) {
      ii = this.getPos(x[i]);
      iii = this.getPos(x[i + 1]);
      sisa = iii % 10;
      p = (iii - sisa) / 10;
      num = ii * p + sisa;
      inn += String.fromCharCode(num);
    }

    return inn;
  }
};
module.exports = {
  cypt: SimpleCrypt
};

/***/ }),

/***/ "./resources/js/view/events/index.js":
/*!*******************************************!*\
  !*** ./resources/js/view/events/index.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var Table;
var _URL = [];
_URL['index'] = $("#url-api-events").text();
_URL['generate_nametag'] = $("#url-api-nametags-generate").text();
_URL['generate_certificate'] = $("#url-api-certificates-generate").text();
_URL['delete'] = $("#form-delete").attr('action');
_URL['update'] = $("#form-update").attr('action');
_URL['print'] = $("#print_date").attr('href');
var current_id = null;
$("#print_date").attr({
  'href': '#'
});
$("#print_date").attr({
  'target': ''
});
$(".rm").remove();

var SimpleCrypt = __webpack_require__(/*! ../../plugin/crypto */ "./resources/js/plugin/crypto.js");

$('#form-add').ajaxForm({
  success: function success(data) {
    if (data.success) {
      $("#add-event").modal('toggle');
      $("#form-add").find('[name=name]').val('');
      $("#form-add").find('[name=started_date]').val('');
      $("#form-add").find('[name=ended_date]').val('');
      $("#form-add").find('[name=place]').val('');
      $("#form-add").find('[name=description]').val('');
      $("#form-add").find('[name=agency]').val('');

      _leftAlert('Berhasil', 'Data Event berhasil ditambahkan', 'success');

      Table.ajax.reload();
    } else {
      for (var i = 0; i < data.errors.length; i++) {
        _leftAlert('Perhatian !', data.errors[i], 'warning', false);
      }
    }
  }
});
$('#form-delete').ajaxForm({
  success: function success(data) {
    if (data.success) {
      _leftAlert('Berhasil', 'Data Event berhasil dihapus', 'info');

      Table.ajax.reload();
    } else {
      _leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
    }
  }
});
$("#form-update").ajaxForm({
  success: function success(data) {
    if (data.success) {
      _leftAlert('Berhasil', 'Data Event berhasil diperbarui', 'info');

      $("#edit-event").modal('toggle');
      Table.ajax.reload();
    } else {
      _leftAlert('Mohon maaf', 'Silahkan muat ulang, terjadi kesalahan sistem', 'error');
    }
  }
});
Table = $('#datatable').DataTable({
  processing: true,
  serverSide: true,
  ajax: _URL.index,
  columns: [{
    data: 'name',
    name: 'name'
  }, {
    data: 'place',
    name: 'place'
  }, {
    data: 'agency',
    name: 'agency'
  }, {
    data: '_status',
    name: '_status'
  }, {
    data: 'action',
    name: 'action',
    orderable: false,
    searchable: false
  }, {
    data: 'status',
    name: 'status',
    searchable: false
  }],
  columnDefs: [{
    orderData: [5],
    targets: [3]
  }, {
    targets: [5],
    visible: false
  }],
  "fnDrawCallback": function fnDrawCallback(oSettings) {
    $(".dropdown-trigger").dropdown();
  }
});
$('.skin-square input').iCheck({
  checkboxClass: 'icheckbox_square-red',
  radioClass: 'iradio_square-red'
});

window._delete = function (e) {
  var data = Table.row($(e).parents('tr')).data();

  _confirm(0, function () {
    $("#form-delete").attr({
      'action': _URL["delete"].replace('/0', '/' + data.id)
    });
    $("#button-delete").click();
  });
};

window._edit = function (e) {
  var data = Table.row($(e).parents('tr')).data();
  $("#form-update").find('[name=name]').val(data.name);
  $("#form-update").find('[name=started_date]').val(data.started_date);
  $("#form-update").find('[name=ended_date]').val(data.ended_date);
  $("#form-update").find('[name=place]').val(data.place);
  $("#form-update").find('[name=description]').val(data.description);
  $("#form-update").find('[name=agency]').val(data.agency);
  $("#edit-event-image").attr({
    'src': data.image
  });
  $("#edit-type-" + (data.type == '1' ? 'umum' : 'private')).iCheck('check');
  $("#form-update").attr({
    'action': _URL["delete"].replace('/0', '/' + data.id)
  });
  $("#edit-event").modal({
    show: true,
    backdrop: 'static',
    keyboard: false
  });
};

window._triger = function (e) {
  $(e.parentNode.parentNode).find("[type=file]").click();
};

window.previewFile = function (e) {
  var preview = e.parentNode.children[0].children[0];
  var file = e.files[0];
  var reader = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  };

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
};

var participants = [];
var s_count = 0;

function generate_nametags(params) {
  $.post(_URL.generate_nametag, params, function (data) {
    if (data.flag == '1') {
      participants = data.participants;

      if (participants.length == 0) {
        _leftAlert('Info', 'Belum ada peserta yang terdaftar', 'info');

        $("#generate-nametag").modal('toggle');
        return;
      }

      s_count = 0;
      $("#fetch-init").hide();
      $("#fetch-progress").show();
      var download = participants.length == 1;
      $("#generate-nametag-caption-from").text("1");
      $("#generate-nametag-caption-to").text(participants.length);
      generate_nametags({
        event_id: params.event_id,
        participant_id: participants[s_count],
        download: download
      });
    } else if (data.flag == '2') {
      s_count++;
      $("#generate-nametag-caption-from").text(s_count + 1);

      var _download = s_count == participants.length - 1;

      generate_nametags({
        event_id: params.event_id,
        participant_id: participants[s_count],
        download: _download
      });
    } else if (data.flag == '3') {
      window.open(data.download_link, '_blank');
      $("#generate-nametag").modal('toggle');
    }
  });
}

window._nametags = function () {
  $("#detail-event").modal('toggle');
  $("#proses-caption").text("Generate Name Tag Progress");
  $("#generate-nametag").modal({
    show: true,
    backdrop: 'static',
    keyboard: false
  });
  $("#fetch-init").show();
  $("#fetch-progress").hide();
  generate_nametags({
    event_id: current_id,
    get_participants: true
  });
};

function generate_certificates(params) {
  $.post(_URL.generate_certificate, params, function (data) {
    if (data.flag == '1') {
      participants = data.participants;

      if (participants.length == 0) {
        _leftAlert('Info', 'Belum ada peserta yang terdaftar', 'info');

        $("#generate-nametag").modal('toggle');
        return;
      }

      s_count = 0;
      $("#fetch-init").hide();
      $("#fetch-progress").show();
      $("#generate-nametag-caption-from").text("1");
      $("#generate-nametag-caption-to").text(participants.length);
      generate_certificates({
        event_id: params.event_id,
        participant_id: participants[s_count]
      });
    } else {
      s_count++;
      $("#generate-nametag-caption-from").text(s_count + 1);

      if (s_count == participants.length) {
        $("#generate-nametag").modal('toggle');

        _leftAlert('Berhasil', 'E-Sertifikat berhasil dikirim ke peserta pada acara terpilih.', 'success');

        return;
      }

      generate_certificates({
        event_id: params.event_id,
        participant_id: participants[s_count]
      });
    }
  });
}

window._certificates = function () {
  $("#detail-event").modal('toggle');
  $("#proses-caption").text("Sending E-Certificate Progress");
  $("#generate-nametag").modal({
    show: true,
    backdrop: 'static',
    keyboard: false
  });
  $("#fetch-init").show();
  $("#fetch-progress").hide();
  generate_certificates({
    event_id: current_id,
    get_participants: true
  });
};

function get_normal_date(date) {
  var z = date.split('-');
  var mn = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  return z[2] + ' ' + mn[Number(z[1]) - 1] + ' ' + z[0];
}

window._detail = function (e) {
  var data = Table.row($(e).parents('tr')).data();
  current_id = data.id;
  $("#detail-event").find('[name=name]').val(data.name);
  $("#detail-event").find('[name=type]').val(data.type == '1' ? 'Umum' : 'In House');
  $("#detail-event").find('[name=started_date]').val(get_normal_date(data.started_date));
  $("#detail-event").find('[name=ended_date]').val(get_normal_date(data.ended_date));
  $("#detail-event").find('[name=place]').val(data.place);
  $("#detail-event").find('[name=description]').val(data.description);
  $("#detail-event").find('[name=agency]').val(data.agency);
  $("#detail-event").find("[name=participant]").val(data._participant_count);
  $("#detail-image").attr({
    'src': data.image
  });
  $("#detail-event").attr({
    'action': _URL["delete"].replace('/0', '/' + data.id)
  });
  $("#detail-event").modal({
    show: true
  });
};

window.setPreference = function () {
  // SimpleCrypt
  if ($('#started_date_d').val() == '' || $('#ended_date_d').val() == '') {
    $("#print_date").attr({
      'href': '#'
    });
    $("#print_date").attr({
      'target': ''
    });
  } else {
    var str = JSON.stringify({
      started_date: $('#started_date_d').val(),
      ended_date: $('#ended_date_d').val()
    });
    $("#print_date").attr({
      'href': _URL.print + '/' + SimpleCrypt.cypt.encrypt(str)
    });
    $("#print_date").attr({
      'target': 'blank'
    });
  }
};

/***/ }),

/***/ 2:
/*!*************************************************!*\
  !*** multi ./resources/js/view/events/index.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/OnIt/bms-event/resources/js/view/events/index.js */"./resources/js/view/events/index.js");


/***/ })

/******/ });