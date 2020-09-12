import 'alpinejs';
import { Notyf } from 'notyf';
import { smoothScrollAnchor } from 'smooth-scroll-anchor';

//-------------------------------------------------------------------------------------------------
// Common libraries...
//-------------------------------------------------------------------------------------------------
window._ = require('lodash');
window.axios = require('axios');
window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
};
window.axios.defaults.withCredentials = true;

//-------------------------------------------------------------------------------------------------
// Notyf configuration...
//-------------------------------------------------------------------------------------------------
window.notyf = new Notyf({
  duration: 4800,
  dismissible: true,
  position: {
    x: 'right',
    y: 'top'
  },
  types: [
    {
      type: 'info',
      background: 'blue',
      icon: false
    },
    {
      type: 'warning',
      background: 'orange',
      icon: false
    },
    {
      type: 'error',
      background: 'red'
    }
  ]
});

//-------------------------------------------------------------------------------------------------
// Extra libraries...
//-------------------------------------------------------------------------------------------------

// cleave.js validator
window.Cleave = require('cleave.js').default;
require('cleave.js/dist/addons/cleave-phone.id');

// Smooth scrolling anchor
window.smoothScrollAnchor = new smoothScrollAnchor({
  behaviour: 'smooth', // [smooth | auto] Smooth animated scroll or instant
  block: 'start', // [start | center | end | nearest] Alignment of the target element when it's finished scrolling
  offset: 0 // Optional offset of the target scroll position. Handy if you have a fixed header!
});
