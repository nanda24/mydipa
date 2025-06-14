<form method="POST" action="{{ isset($menu) ? route('menus.update', $menu) : route('menus.store') }}">
    @csrf
    @if(isset($menu)) @method('PUT') @endif

    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ old('name', $menu->name ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Type</label>
        <select name="type" class="form-control">
            <option value="master" {{ (old('type', $menu->type ?? '') == 'master') ? 'selected' : '' }}>Master</option>
            <option value="transaction" {{ (old('type', $menu->type ?? '') == 'transaction') ? 'selected' : '' }}>Transaction</option>
            <option value="report" {{ (old('type', $menu->type ?? '') == 'report') ? 'selected' : '' }}>Report</option>
        </select>
    </div>

    <div class="mb-3">
        <label>URL</label>
        <input name="url" class="form-control" value="{{ old('url', $menu->url ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Icon</label>
        <input name="icon" class="form-control" value="{{ old('icon', $menu->icon ?? '') }}">
    </div>

    <div class="mb-3">
        <label>Parent Menu</label>
        <select name="parent_id" class="form-control">
            <option value="">-- None --</option>
            @foreach($parents as $parent)
                <option value="{{ $parent->id }}" {{ old('parent_id', $menu->parent_id ?? '') == $parent->id ? 'selected' : '' }}>{{ $parent->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Order</label>
        <input name="order_index" type="number" class="form-control" value="{{ old('order_index', $menu->order_index ?? 0) }}">
    </div>

    <div class="mb-3">
        <label>Is Active</label>
        <select name="is_active" class="form-control">
            <option value="1" {{ old('is_active', $menu->is_active ?? 1) == 1 ? 'selected' : '' }}>Yes</option>
            <option value="0" {{ old('is_active', $menu->is_active ?? 1) == 0 ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Assign Roles</label><br>
        @foreach($roles as $role)
            <label class="me-2">
                <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                       {{ isset($menu) && $menu->roles->contains($role->id) ? 'checked' : '' }}>
                {{ $role->name }}
            </label>
        @endforeach
    </div>

    <button class="btn btn-success">{{ isset($menu) ? 'Update' : 'Create' }}</button>
</form>
