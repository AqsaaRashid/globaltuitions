@extends('layouts.admin')

@section('content')
<div id="toast-container" class="admin-toast-container"></div>

<style>
@keyframes progress { from { width:100%; } to { width:0%; } }
.animate-progress { animation: progress 3s linear forwards; }
.admin-toast-container { position: fixed; top: 24px; right: 24px; z-index: 50; display: flex; flex-direction: column; gap: 12px; }
.admin-page-header { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px; margin-bottom: 24px; }
.admin-page-title { font-size: 24px; font-weight: 700; color: #0f172a; margin: 0; }
.admin-btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 12px 24px; font-size: 16px; font-weight: 600;
    background: #09515D; color: #fff;
    border: none; border-radius: 10px;
    text-decoration: none; cursor: pointer;
    transition: background 0.2s, transform 0.2s, box-shadow 0.2s;
    box-shadow: 0 4px 14px rgba(9, 81, 93, 0.3);
}
.admin-btn-primary:hover { background: #0a6573; color: #fff; transform: translateY(-1px); box-shadow: 0 6px 20px rgba(9, 81, 93, 0.4); }
.admin-btn-accent {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 10px 20px; font-size: 15px; font-weight: 600;
    background: #F47B1E; color: #0f172a;
    border: none; border-radius: 10px;
    cursor: pointer;
    transition: background 0.2s, transform 0.2s;
}
.admin-btn-accent:hover { background: #f59e0b; transform: translateY(-1px); }
.admin-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 24px rgba(15, 23, 42, 0.08), 0 0 1px rgba(15, 23, 42, 0.06);
    overflow: hidden;
    border: 1px solid #e2e8f0;
}
.admin-table { width: 100%; border-collapse: collapse; }
.admin-table thead { background: linear-gradient(180deg, #09515D 0%, #0a6573 100%); color: #fff; }
.admin-table th {
    padding: 16px 20px; text-align: left; font-size: 13px; font-weight: 700;
    letter-spacing: 0.02em; text-transform: uppercase;
}
.admin-table th.text-center { text-align: center; }
.admin-table tbody tr { border-bottom: 1px solid #e2e8f0; transition: background 0.15s; }
.admin-table tbody tr:hover { background: #f8fafc; }
.admin-table tbody tr:last-child { border-bottom: none; }
.admin-table td { padding: 16px 20px; font-size: 15px; color: #334155; vertical-align: middle; }
.admin-table td.text-center { text-align: center; }
.admin-table .admin-cell-title { font-weight: 600; color: #0f172a; }
.admin-table .admin-cell-muted { font-size: 13px; color: #64748b; margin-top: 4px; }
.admin-course-img { width: 56px; height: 56px; object-fit: cover; border-radius: 10px; border: 1px solid #e2e8f0; }
.admin-badge { display: inline-block; padding: 4px 12px; border-radius: 999px; font-size: 12px; font-weight: 600; }
.admin-badge-active { background: #d1fae5; color: #065f46; }
.admin-badge-inactive { background: #fee2e2; color: #991b1b; }
.admin-actions { display: flex; align-items: center; justify-content: center; gap: 8px; flex-wrap: wrap; }
.admin-btn-sm {
    display: inline-flex; align-items: center; padding: 6px 12px;
    border-radius: 8px; font-size: 13px; font-weight: 600;
    text-decoration: none; border: none; cursor: pointer;
    transition: background 0.2s, color 0.2s;
}
.admin-btn-edit { background: #dbeafe; color: #1d4ed8; }
.admin-btn-edit:hover { background: #bfdbfe; }
.admin-btn-topics { background: #ede9fe; color: #5b21b6; }
.admin-btn-topics:hover { background: #ddd6fe; }
.admin-btn-delete { background: #fee2e2; color: #b91c1c; }
.admin-btn-delete:hover { background: #fecaca; }
.admin-form-actions { margin-bottom: 20px; }
.admin-empty { padding: 48px 24px; text-align: center; color: #64748b; font-size: 16px; }
</style>

<script>
function showToast(message, type) {
    var container = document.getElementById('toast-container');
    if (!container) return;
    var border = type === 'success' ? '#28a745' : '#dc3545';
    var bg = type === 'success' ? 'rgba(40,167,69,0.95)' : 'rgba(220,53,69,0.95)';
    var toast = document.createElement('div');
    toast.setAttribute('role', 'toast');
    toast.style.cssText = 'background:#0f172a;color:#fff;border:2px solid ' + border + ';border-radius:12px;box-shadow:0 12px 32px rgba(0,0,0,0.2);max-width:380px;overflow:hidden;';
    toast.innerHTML = '<div style="display:flex;align-items:flex-start;padding:16px;gap:12px;">' +
        '<div style="width:40px;height:40px;border-radius:50%;background:' + bg + ';display:flex;align-items:center;justify-content:center;font-weight:700;flex-shrink:0;">' + (type === 'success' ? '✓' : '!') + '</div>' +
        '<div style="flex:1;"><strong style="color:' + (type === 'success' ? '#86efac' : '#fca5a5') + ';">' + (type === 'success' ? 'Success' : 'Error') + '</strong><p style="margin:4px 0 0;font-size:14px;color:#e2e8f0;">' + message + '</p></div>' +
        '<button onclick="this.closest(\'[role=toast]\').remove()" style="background:none;border:none;color:#94a3b8;cursor:pointer;font-size:20px;line-height:1;">×</button></div>' +
        '<div class="animate-progress" style="height:4px;background:' + border + ';"></div>';
    container.appendChild(toast);
    setTimeout(function() { toast.querySelector('.animate-progress').style.animation = 'progress 3s linear forwards'; }, 50);
    setTimeout(function() { toast.style.opacity = '0'; toast.style.transform = 'translateX(24px)'; toast.style.transition = '0.3s'; setTimeout(function() { toast.remove(); }, 300); }, 3000);
}
</script>
@if(session('success'))
<script> document.addEventListener("DOMContentLoaded", function () { showToast({{ json_encode(session('success')) }}, 'success'); }); </script>
@endif

<div class="admin-page-header">
    <h2 class="admin-page-title">Courses</h2>
    <a href="{{ route('admin.courses.create') }}" class="admin-btn-primary">+ Add Course</a>
</div>

<form id="popularForm" method="POST" action="{{ route('courses.makePopular') }}">
    @csrf
    <div class="admin-form-actions">
        <button type="submit" class="admin-btn-accent">⭐ Make Popular</button>
    </div>

    <div class="admin-card">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Course</th>
                    <th>Level</th>
                    <th>Category</th>
                    <th>Duration</th>
                    <th>Price</th>
                    <th class="text-center">Sort</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Select</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $course->image) }}" alt="" class="admin-course-img" onerror="this.style.display='none'">
                    </td>
                    <td>
                        <div class="admin-cell-title">{{ $course->title }}</div>
                        @if($course->skills)
                            <div class="admin-cell-muted">Skills: {{ \Illuminate\Support\Str::limit($course->skills, 40) }}</div>
                        @endif
                    </td>
                    <td>{{ $course->level ?? '–' }}</td>
                    <td>{{ $course->category?->name ?? 'Uncategorized' }}</td>
                    <td>
                        @if($course->duration)
                            {{ $course->duration }}
                        @elseif(isset($course->duration_value, $course->duration_unit))
                            {{ $course->duration_value }} {{ ucfirst($course->duration_unit) }}
                        @else
                            –
                        @endif
                    </td>
                    <td>{{ $course->price ? '$' . number_format($course->price, 2) : '–' }}</td>
                    <td class="text-center">{{ $course->sort_order }}</td>
                    <td class="text-center">
                        @if($course->is_active)
                            <span class="admin-badge admin-badge-active">Active</span>
                        @else
                            <span class="admin-badge admin-badge-inactive">Inactive</span>
                        @endif
                    </td>
                    <td class="text-center">
                        <input type="checkbox" name="selected_courses[]" value="{{ $course->id }}" class="course-checkbox">
                    </td>
                    <td class="text-center">
                        <div class="admin-actions">
                            <a href="{{ route('admin.courses.edit', $course) }}" class="admin-btn-sm admin-btn-edit">Edit</a>
                            <a href="{{ route('admin.courses.topics', $course) }}" class="admin-btn-sm admin-btn-topics">Topics</a>
                            <button type="button" onclick="if(confirm('Delete this course?')) document.getElementById('del-{{ $course->id }}').submit();" class="admin-btn-sm admin-btn-delete">Delete</button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="admin-empty">No courses found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</form>

@foreach($courses as $course)
<form id="del-{{ $course->id }}" action="{{ route('admin.courses.destroy', $course) }}" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>
@endforeach

<script>
document.addEventListener("DOMContentLoaded", function () {
    var form = document.getElementById('popularForm');
    if (!form) return;
    form.addEventListener('submit', function(e) {
        var checkboxes = document.querySelectorAll('.course-checkbox:checked');
        if (checkboxes.length === 0) { e.preventDefault(); showToast('Please select at least one course first.', 'error'); }
    });
});
</script>
@endsection
