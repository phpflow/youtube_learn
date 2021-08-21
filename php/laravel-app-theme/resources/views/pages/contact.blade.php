@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'contact'
])

@section('content')
<div class="card">
        <div class="card-header">
          <h3 class="card-title">Contact Us</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
        If you have any questions, queries or suggestions regarding the content here on phpflow.com, please feel free to get in touch.

Email: phpflow(at)gmail(dot)com

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
@endsection