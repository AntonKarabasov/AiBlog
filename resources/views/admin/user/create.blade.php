@extends('admin.layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавление пользователя</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.main.index') }}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Добавление пользователя</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('admin.user.store') }}" method="post" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Имя" value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group w-50">
                            <label>Роль</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" {{ old('role') == $id ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                            <div class="text-danger"> {{ $message }} </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
