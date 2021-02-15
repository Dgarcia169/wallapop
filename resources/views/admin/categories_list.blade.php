@extends('components.base')

@section('prescript')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ url('resources/js/sweetAlert/mySweetAlert.js') }}" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <table id="dtCategorias" class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Categoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
    </div>
@endsection

@section('postscript')
    <script src="{{ asset('resources/js/datatables/datatable_category.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endsection
