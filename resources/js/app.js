import './bootstrap';
import {Livewire, Alpine} from '../../vendor/livewire/livewire/dist/livewire.esm';
import flatpickr from "flatpickr";

Alpine.directive('datepicker', (el) => {
    el.addEventListener('mouseup', e => {
        flatpickr(e.target, {})
    })
})

Livewire.start()
