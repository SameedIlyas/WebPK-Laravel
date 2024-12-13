@extends('layouts.master')

@section('title', 'Admin - Courses')

@section('content')

    <!-- Success Message -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add a Course Form -->
    <section id="add-course" class="section-padding">
        <h2 class="section-title">Add a Course</h2>
        <form method="POST" action="{{ url('/admin/courses/add') }}">
            @csrf
            <input type="text" id="courseName" name="name" placeholder="Enter Course Name" required>
            <textarea id="courseDescription" name="description" placeholder="Enter Course Description" required></textarea>
            <button type="submit" class="btn-primary">Add Course</button>
        </form>
    </section>


    <!-- Course Management -->
    <section id="manage-courses" class="section-padding">
        <h2 class="section-title">Manage Courses</h2>
        <table class="pricing-table">
            <thead>
                <tr>
                    <th>Course</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr id="course-row-{{ $course->id }}">
                    <td contenteditable="false" 
                        data-field="name" 
                        class="editable">
                        {{ $course->name }}
                    </td>
                    <td contenteditable="false" 
                        data-field="description" 
                        class="editable">
                        {{ $course->description }}
                    </td>
                    <td class="actions-cell">
                        <button class="btn-primary edit-row" data-id="{{ $course->id }}">Edit</button>
                        <form action="{{ route('admin.courses.remove', $course->id) }}" method="POST" class="inline-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>

    <a href="{{ route('admin.services') }}" class="btn">Manage Services</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rows = document.querySelectorAll('tr[id^="course-row-"]');

            rows.forEach(row => {
                const editButton = row.querySelector('.edit-row');
                const fields = row.querySelectorAll('[contenteditable]');

                editButton.addEventListener('click', function () {
                    if (editButton.textContent === 'Edit') {
                        // Enable editing
                        fields.forEach(field => field.setAttribute('contenteditable', 'true'));
                        editButton.textContent = 'Save';
                        editButton.classList.add('btn-success');
                        editButton.classList.remove('btn-primary');
                    } else {
                        // Save changes
                        const id = editButton.getAttribute('data-id');
                        const data = {};

                        fields.forEach(field => {
                            const fieldName = field.getAttribute('data-field');
                            data[fieldName] = field.textContent.trim();
                            field.setAttribute('contenteditable', 'false');
                        });

                        fetch(`/admin/courses/${id}/update-inline`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify(data),
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Course updated successfully!');
                            } else {
                                alert('Error updating course. Please try again.');
                            }
                        })
                        .catch(error => console.error('Error:', error));

                        editButton.textContent = 'Edit';
                        editButton.classList.add('btn-primary');
                        editButton.classList.remove('btn-success');
                    }
                });
            });
        });
    </script>

@endsection
