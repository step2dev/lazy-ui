import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm'

import Quill from "quill";

window.Quill = Quill;

import axios from 'axios';
window.axios = axios;

import '../../vendor/step2dev/lazy-ui/resources/js/lazy.js'

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.addEventListener('DOMContentLoaded', async (event) => {
    Livewire.start()
})
