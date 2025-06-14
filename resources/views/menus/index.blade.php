@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success mb-3">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('menus.create') }}" class="btn btn-primary mb-3">+ Add Menu</a>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>URL</th>
                    <th>Parent</th>
                    <th>Roles</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menus as $menu)
                    <tr>
                        <td>{{ $menu->name }}</td>
                        <td>{{ ucfirst($menu->type) }}</td>
                        <td>{{ $menu->url }}</td>
                        <td>{{ $menu->parent?->name ?? '-' }}</td>
                        <td>{{ implode(', ', $menu->roles->pluck('name')->toArray()) }}</td>
                        <td>
                            <span class="badge bg-{{ $menu->is_active ? 'success' : 'secondary' }}">
                                {{ $menu->is_active ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td class="text-nowrap">
                            <a href="{{ route('menus.edit', $menu) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Edit
                            </a>

                            <form action="{{ route('menus.destroy', $menu) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($menus->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center text-muted">No menu data found.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection
