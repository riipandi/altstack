import 'alpinejs'
import { smoothScrollAnchor } from 'smooth-scroll-anchor'

//-------------------------------------------------------------------------------------------------
// Common libraries...
//-------------------------------------------------------------------------------------------------
window.axios = require('axios')
window.axios.defaults.headers.common = {
  'X-Requested-With': 'XMLHttpRequest',
  'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
}
window.axios.defaults.withCredentials = true

//-------------------------------------------------------------------------------------------------
// Extra libraries...
//-------------------------------------------------------------------------------------------------

// Smooth scrolling anchor
window.smoothScrollAnchor = new smoothScrollAnchor({
  behaviour: 'smooth', // [smooth | auto] Smooth animated scroll or instant
  block: 'start', // [start | center | end | nearest] Alignment of the target element when it's finished scrolling
  offset: 0 // Optional offset of the target scroll position. Handy if you have a fixed header!
})
