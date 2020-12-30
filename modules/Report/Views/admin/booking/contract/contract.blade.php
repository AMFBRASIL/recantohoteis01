@extends('Layout::empty')
@section('head')
    <style type="text/css">
        html, body {
            background: #f0f0f0;
        }

        .print-zone {
            background: white;
            padding: 15px;
            margin: 90px auto 40px auto;
            max-width: 1025px;
        }
    </style>
    <script>
        window.print();
    </script>

    <div class="print-zone">
        <div class="container">
            {!! $contract !!}
        </div>
    </div>
@endsection
@section('footer')

@endsection
