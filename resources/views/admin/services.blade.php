@extends('layouts.master')

@section('title', 'Admin - Services')

@section('content')

    <!-- Success Message -->
    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <!-- Add a Service Form -->
    <section id="add-service" class="section-padding">
        <h2 class="section-title">Add a Service</h2>
        <form method="POST" action="{{ url('admin/services/add') }}">
            @csrf
            <input type="text" id="serviceName" name="name" placeholder="Enter Service Name" required>
            <input type="number" id="servicePrice" name="price" placeholder="Enter Price (USD)" required>
            <input type="text" id="turnaroundTime" name="turnaround_time" placeholder="Enter Turnaround Time (e.g., 2-4 weeks)" required>
            <button type="submit" class="btn-primary">Add Service</button>
        </form>
    </section>

    <!-- Service Management -->
    <section id="manage-services" class="section-padding">
        <h2 class="section-title">Manage Services</h2>
        <table class="pricing-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Price</th>
                    <th>Turnaround Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr id="service-row-{{ $service->id }}">
                    <td contenteditable="false" 
                        data-field="name" 
                        class="editable">
                        {{ $service->name }}
                    </td>
                    <td contenteditable="false" 
                        data-field="price" 
                        class="editable">
                        {{ number_format($service->price, 2) }}
                    </td>
                    <td contenteditable="false" 
                        data-field="turnaround_time" 
                        class="editable">
                        {{ $service->turnaround_time }}
                    </td>
                    <td class="actions-cell">
                        <button class="btn-primary edit-row" data-id="{{ $service->id }}">Edit</button>
                        <form action="{{ route('admin.services.remove', $service->id) }}" method="POST" class="inline-form">
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

    <a href="{{ route('admin.courses') }}" class="btn">Manage Courses</a>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rows = document.querySelectorAll('tr[id^="service-row-"]');

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

                        fetch(`/admin/services/${id}/update-inline`, {
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
                                alert('Service updated successfully!');
                            } else {
                                alert('Error updating service. Please try again.');
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
