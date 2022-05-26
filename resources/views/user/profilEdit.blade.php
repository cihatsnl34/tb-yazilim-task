 
@extends('user/layouts.app')
@section('content')
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Ayarlar <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"> genel
                        ayarlar </small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Ayarlar</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="{{ route('user.dashboard') }}">User Paneli</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->has('info'))
                                    
                <div class="alert alert-primary" role="alert">
                    Bilgiler başarıyla değiştirmiştir.
                </div>
                
            
        @endif
            </div>
        </div>
        <!-- You Block -->
        <div class="block block-rounded block-link-pop border-left border-primary border-4x">
            <div class="block-header">

                <h3 class="block-title">
                    User profil ayarları
                </h3>

                <div class="block-options">
                    <div class="dropdown"
                        style="border: 2px solid rgb(194, 192, 192);border-radius: 5px; padding: 2px;">
                        <button type="button" class="btn-block-option" data-toggle="modal" data-target="#edit-admin-data"
                            aria-haspopup="true" aria-expanded="false"><i class="si si-settings"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Your Block -->

    </div>
    <!-- END Page Content -->


    <!-- start edit admin info models -->
    <div class="modal fade" id="edit-admin-data" tabindex="-1" role="dialog" aria-labelledby="editLabel-1"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editLabel-1">User | profil bilgileri düzeltin.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('user.profilUpdate', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="wizard-progress2-email">Name*</label>
                            <input required class="form-control form-control-alt" type="text" name="name"
                                value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress2-email">Surname*</label>
                            <input required class="form-control form-control-alt" type="text" name="surname"
                                value="{{ $user->surname }}">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress2-email">Username*</label>
                            <input required class="form-control form-control-alt" type="text" name="username"
                                value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress2-email">Email*</label>
                            <input required class="form-control form-control-alt" type="email" name="email"
                                value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress2-lastname">Şifre</label>
                            <input class="form-control form-control-alt" type="text" name="password"
                                placeholder="Şifre değişmesini istemiyorsanız bu alanı boş bırakın.">
                        </div>
                        <div class="form-group">
                            <label for="wizard-progress2-lastname">Profil Resmi</label>
                            <img src="{{ asset('userPhoto/' . $user->username . '/anaResim/' . $user->anaResim . '')}}" alt="" width="200"
                            height="300">

                            <input class="form-control form-control-alt" type="file" id="wizard-progress2-Ana"
                            value="{{ $user->anaResim }}"  name="anaResim">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-warning">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- start edit admin info models -->
@endsection
