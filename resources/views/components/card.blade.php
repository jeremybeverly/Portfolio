<div {{$attributes->merge(['class'=>'bg-white p-6 rounded-lg shadow-md w-44'])}}>
    <div class="modal-header">
        {{$header}}
    </div>
    <div class="modal-body">
        {{$slot}}
    </div>
</div>
