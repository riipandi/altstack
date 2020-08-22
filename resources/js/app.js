import 'alpinejs';
import { Notyf } from 'notyf';

// const isProd = process.env.NODE_ENV === 'production';

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
