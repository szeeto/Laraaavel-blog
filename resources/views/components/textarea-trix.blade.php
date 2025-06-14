@props(['value','id','name'])
<input id="{{ $id }}" type="hidden" name="{{ $name }}" value="{{ old($name, $value) }}">
<trix-editor input="{{ $id }}"
    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm min-h-80 text-white"
    ontrix-change="sanitizeTrixContent('{{ $id }}')"></trix-editor>

@push('scripts')
<script>
function sanitizeTrixContent(id) {
    let input = document.getElementById(id);
    if (input) {
        // Remove all <div> tags from the value
        input.value = input.value.replace(/<\/?div[^>]*>/g, '');
    }
}
</script>
@endpush
