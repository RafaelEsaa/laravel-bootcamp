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
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 44);
/******/ })
/************************************************************************/
/******/ ({

/***/ 44:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(45);


/***/ }),

/***/ 45:
/***/ (function(module, exports) {

var ids = [];
window.bootcampsSelected = function (elm) {
  var id = elm.dataset.target;
  var foundId = ids.find(function (element) {
    return element == id;
  });

  if (
  //Cuando se desmarca la opcion, se elimina del array
  (document.getElementById(id).classList.contains('bg-blue-home') || document.getElementById(id).classList.contains('bg-white-home')) && foundId) {

    //Se oculta el texto en rojo
    var b = document.getElementById(id);
    var h = b.getElementsByTagName("p");
    h[0].style.visibility = "hidden";

    //Se quita la clase para agregar fondo negro
    document.getElementById(id).classList.toggle('bootcamp-selected');

    //Se encontro en el array y se elimina
    var index = ids.indexOf(id);
    if (index > -1) {
      ids.splice(index, 1);
    }
  } else if (
  //Cuando se marca, y no se encuentra en el array
  (document.getElementById(id).classList.contains('bg-blue-home') || document.getElementById(id).classList.contains('bg-white-home')) && !foundId) {
    //No se encontro en el array

    //Se agrega la clase para fondo negro
    document.getElementById(id).classList.toggle('bootcamp-selected');

    //Valida que existan 2 opciones marcadas para hacer la peticion a la nueva pagina
    ids.push(id);
    if (ids.length > 1) {
      window.location.href = "compare/4geeks-vs-" + ids[0] + "-vs-" + ids[1];
    }

    //Se oculta el texto en rojo
    if (ids.length <= 1) {
      var _b = document.getElementById(id);
      var _h = _b.getElementsByTagName("p");
      _h[0].style.visibility = "visible";
    }
  }
};

window.changeDesktop = function () {
  var bootcamp1 = document.getElementById("selectDesktop1").value;
  var bootcamp2 = document.getElementById("selectDesktop2").value;
  window.location.href = "/compare/4geeks-vs-" + bootcamp1 + "-vs-" + bootcamp2;
};

window.change = function () {
  var bootcamp1 = document.getElementById("select1").value;
  var bootcamp2 = document.getElementById("select2").value;
  window.location.href = "/compare/4geeks-vs-" + bootcamp1 + "-vs-" + bootcamp2;
};

// DIRTY Responsive pricing table JS
window.swithBootcamp = function (li) {
  console.log(li, 'llego 1');
  var pos = $(li).index() + 2;
  $("tr").find('td:not(:eq(0))').hide();
  $('td:nth-child(' + pos + ')').css('display', 'table-cell');
  $("tr").find('th:not(:eq(0))').hide();
  $('li').removeClass('active');
  $(li).addClass('active');
};

$("ul").on("click", "li", function () {
  console.log('entro 2');
  swithBootcamp(this);
  window.location.hash = this.id;
});

// // Initialize the media query
// var mediaQuery = window.matchMedia('(min-width: 640px)');

// // Add a listen event
// mediaQuery.addListener(doSomething);

// // Function to do something with the media query
// window.doSomething = function(mediaQuery) {    
//   if (mediaQuery.matches) {
//     $('.sep').attr('colspan',5);
//   } else {
//     $('.sep').attr('colspan',2);
//   }
// }

// // On load
// window.doSomething(mediaQuery);


swithBootcamp(document.querySelector(window.location.hash == '' ? '#li-4geeks' : window.location.hash));

//Altura div menu tabla
var heightDefault = document.querySelectorAll("tr td:first-child");
var divMenuTable = document.querySelectorAll(".menu-title");

var z = void 0;
for (z = 0; z < divMenuTable.length; z++) {
  var t = heightDefault[z].getElementsByClassName('menu-title');
  t[0].style.height = heightDefault[z].offsetHeight + 'px';
}

//Medida donde no agregara altura fija a los div en gris, sobre 740px
var x = window.matchMedia("(min-width: 740px)");
if (x.matches) {
  //Agrega altura fija y fondo gris a los div
  var heightTr = document.querySelectorAll("tr");
  var i = void 0;
  var f = void 0;
  for (i = 3; i < heightTr.length; i++) {
    if (i % 2 == 0) {
      var altura = heightTr[i].offsetHeight;
      var bg_greyRow = heightTr[i].querySelectorAll(".text-bg-grey");
      for (f = 0; f < 3; f++) {
        bg_greyRow[f].style.height = altura + 'px';
      }
    }
  }
}

/***/ })

/******/ });