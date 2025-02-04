@forelse ($destinations as $destination)
    <tr>
        <td><img class="avatar avatar-sm rounded-circle border border-2 border-primary me-3"
                src="{{ asset($destination->image) }}" alt=""></td>
        <td><a href="{{ route('admin.destination.show', $destination->uuid) }}">{{ $destination->title }}</a></td>
        <td>{{ $destination->start_amount }}</td>
        <td>{{ $destination->type }}</td>
        <td>
            <button class="btn btn-{{ $destination->status ? 'success' : 'danger' }} btn-xs btn-pill toggle-destination"
                    data-uuid="{{ $destination->uuid }}">
                    <i class="ti {{ $destination->status ? 'ti-eye' : 'ti-eye-off' }} me-1"></i>
                    <span class="status-text">{{ $destination->status ? 'Active' : 'Inactive' }}</span>
            </button>
        </td>
        <td>{{ $destination->is_featured }}</td>
        <td>{{ $destination->created_at->format('d-m-y') }}</td>
        <td>{{ $destination->updated_at->format('d-m-y') }}</td>
        <td>
            <div class="d-flex">
                <a href="{{ route('admin.destination.edit', $destination->uuid) }}"
                    class="btn btn-success btn-icon btn-sm me-1"> <i class="ti ti-edit fs-16"></i></a>
                <form action="{{ route('admin.destination.destroy', $destination->uuid) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-icon btn-sm"><i class="ti ti-trash"></i></button>
                </form>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="6" class="text-center">No data Available</td>
    </tr>
@endforelse
