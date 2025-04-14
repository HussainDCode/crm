@extends('layouts.app')

@section('content')
    {{-- <style>
        /* body {
              margin: 0;
              padding: 2rem;
              font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
              background-color: #121212;
              color: #e0e0e0;
            } */

        .card-container {
            background-color: #1e1e1e;
            padding: 2rem;
            /* border-radius: 16px; */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
            max-width: 100%;
            margin-top: 0;
            height: 100vh;
        }

        .card-container h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            font-size: 28px;
            color: #ffffff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background-color: wheat;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
        }

        th {
            color: #333;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #333;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #292929;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.4rem 0.8rem;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
        }

        .btn-update:hover {
            background-color: #1e7e34;
        }

        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                position: absolute;
                left: 1rem;
                top: 1rem;
                white-space: nowrap;
                font-weight: bold;
                content: attr(data-label);
                text-align: left;
                color: #aaa;
            }

            .action-buttons {
                justify-content: flex-end;
            }
        }
    </style>
    <div class="card-container">
        <h2>User Information</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="ID">1</td>
                    <td data-label="Name">John Doe</td>
                    <td data-label="Email">john@example.com</td>
                    <td data-label="Role">Admin</td>
                    <td data-label="Actions">
                        <div class="action-buttons">
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-update">Update</button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ID">2</td>
                    <td data-label="Name">Jane Smith</td>
                    <td data-label="Email">jane@example.com</td>
                    <td data-label="Role">User</td>
                    <td data-label="Actions">
                        <div class="action-buttons">
                            <button class="btn btn-edit">Edit</button>
                            <button class="btn btn-delete">Delete</button>
                            <button class="btn btn-update">Update</button>
                        </div>
                    </td>
                </tr>
                <!-- Add more users here -->
            </tbody>
        </table>
    </div> --}}

    <style>
        .card-container {
            background-color: #1e1e1e;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.6);
            max-width: 1000px;
            margin: auto;
        }

        .header-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .header-bar h2 {
            font-size: 28px;
            color: #ffffff;
        }

        .add-btn {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 0.6rem 1.2rem;
            text-align: center;
            font-size: 16px;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            background-color: #388e3c;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
        }

        thead {
            background-color: #2c2c2c;
        }

        th,
        td {
            padding: 1rem;
            text-align: left;
        }

        th {
            color: #ffffff;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #333;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #292929;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn {
            padding: 0.4rem 0.8rem;
            font-size: 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .btn-edit {
            background-color: #007bff;
            color: white;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }

        .btn-update {
            background-color: #28a745;
            color: white;
        }

        .btn-update:hover {
            background-color: #1e7e34;
        }

        @media (max-width: 768px) {

            table,
            thead,
            tbody,
            th,
            td,
            tr {
                display: block;
            }

            thead {
                display: none;
            }

            td {
                position: relative;
                padding-left: 50%;
                text-align: right;
            }

            td::before {
                position: absolute;
                left: 1rem;
                top: 1rem;
                white-space: nowrap;
                font-weight: bold;
                content: attr(data-label);
                text-align: left;
                color: #aaa;
            }

            .action-buttons {
                justify-content: flex-end;
            }
        }

        /* Dark mode modal styling */
        .modal-content {
            background-color: #1e1e1e;
            color: #f1f1f1;
            border-radius: 10px;
        }

        .modal-header,
        .modal-body,
        .modal-footer {
            border-color: #333;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-title {
            text-transform: capitalize !important;
        }

        .modal.right .modal-dialog {
            top: 0;
            right: 0;
            margin-right: 42px;
        }

        /* .modal-footer .btn {
                        background-color: #007bff;
                        color: white;
                        border-radius: 8px;
                        padding: 0.5rem 1rem;
                    } */
    </style>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-md-8">
                    <div class="card-container">
                        <div class="header-bar dark">
                            <h2>User Information</h2>
                            <a href="" class="add-btn" data-bs-toggle="modal" data-bs-target="#addUser"><i
                                    class="fa-solid fa-user-plus"></i> Add New User</a>
                            {{-- {{ route('users.create') }} --}}
                        </div>

                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td data-label="ID">{{ $user->id }}</td>
                                            <td data-label="Name">{{ $user->name }}</td>
                                            <td data-label="Email">{{ $user->email }}</td>
                                            <td data-label="Role">
                                                @if ($user->is_admin == 1)
                                                    <span class="badge bg-success">Admin</span>
                                                @else
                                                    <span class="badge bg-primary">User</span>
                                                @endif
                                            </td>
                                            <td data-label="Actions">
                                                <div class="action-buttons">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#editUser{{ $user->id }}" class="btn btn-edit"><i class="fa-solid fa-pen-to-square"></i>
                                                        Edit</a>


                                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-delete"
                                                            onclick="return confirm('Are you sure?')"><i
                                                                class="fa-solid fa-trash"></i> Delete</button>
                                                    </form>
                                                    <a href="" class="btn btn-update"><i class="fa-solid fa-eye"></i>
                                                        View</a>
                                                    {{-- {{ route('users.show', $user->id) }} --}}
                                                </div>
                                            </td>
                                        </tr>
                                        <div class="modal right fade" id="editUser{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title fs-5" id="exampleModalLabel"><i
                                                                class="fa fa-edit"></i> Edit User</h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('users.update', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label>Name</label>
                                                                <input type="text" name="name"
                                                                    value="{{ $user->name }}" class="form-control"
                                                                    placeholder="Enter Name" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Email</label>
                                                                <input type="email" name="email"
                                                                    value="{{ $user->email }}" class="form-control"
                                                                    placeholder="Enter Email" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label>Password</label>
                                                                <input type="password" name="password"
                                                                    value="{{ $user->password }}" class="form-control"
                                                                    placeholder="Enter Password" required readonly>
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <label for="">Confirm Password</label>
                                                                <input type="password" name="confirm_password"
                                                                    class="form-control" placeholder="Confirm Password">
                                                            </div> --}}
                                                            <div class="mb-3">
                                                                <label>Role</label>
                                                                <select name="is_admin" class="form-control">
                                                                    <option value="1"
                                                                        {{ $user->is_admin == 1 ? 'selected' : '' }}>Admin
                                                                    </option>
                                                                    <option value="0"
                                                                        {{ $user->is_admin == 2 ? 'selected' : '' }}>User
                                                                    </option>
                                                                </select>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-3">
                                {{ $users->links('pagination::bootstrap-5') }}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card-container">
                        <div class="header-bar">
                            <h2>Search</h2>
                            {{-- {{ route('users.create') }} --}}
                        </div>

                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal right fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Add User</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email"
                                required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control"
                                placeholder="Confirm Password">
                        </div>
                        <div class="mb-3">
                            <label>Role</label>
                            <select name="is_admin" class="form-control">
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save User</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
