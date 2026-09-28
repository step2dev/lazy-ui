import { Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
import axios from 'axios';

import '../../vendor/step2dev/lazy-ui/resources/js/lazy.js';

window.Alpine ??= Alpine;
window.axios ??= axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
