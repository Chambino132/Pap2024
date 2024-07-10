import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;
import focus from '@alpinejs/focus'
import persist from '@alpinejs/persist'
 
Alpine.plugin(persist)
Alpine.plugin(focus)
// Alpine.start();
