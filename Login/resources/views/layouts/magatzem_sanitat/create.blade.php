@extends('layouts.app')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@section('content')
    @if (Auth::user()->getRol()=='professor')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Magatzem Sanitat</div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="/magatzemsanitat">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('localitzacio') ? ' has-error' : '' }}">
                                <label for="localitzacio" class="col-md-4 control-label">Localitzacio</label>

                                <div class="col-md-6">
                                    <input id="localitzacio" type="text" class="form-control" name="localitzacio" value="{{ old('localitzacio') }}" required autofocus>

                                    @if ($errors->has('localitzacio'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('localitzacio') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                <label for="nom" class="col-md-4 control-label">Nom</label>

                                <div class="col-md-6">
                                    <input id="nom" type="text" class="form-control" name="nom" value="{{ old('nom') }}" required autofocus>

                                    @if ($errors->has('nom'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stock_inici') ? ' has-error' : '' }}">
                                <label for="stock_inici" class="col-md-4 control-label">Stock Inici</label>

                                <div class="col-md-6">
                                    <input id="stock_inici" type="number" class="form-control" name="stock_inici" value="{{ old('stock_inici') }}" required>

                                    @if ($errors->has('stock_inici'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stock_inici') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('stock_final') ? ' has-error' : '' }}">
                                <label for="stock_final" class="col-md-4 control-label">Stock Final</label>

                                <div class="col-md-6">
                                <input id="stock_final" type="number" class="form-control" name="stock_final" value="{{ old('stock_final') }}" required>
                                    @if ($errors->has('stock_final'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('stock_final') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('necessitem') ? ' has-error' : '' }}">
                                <label for="necessitem" class="col-md-4 control-label">Necessitem</label>

                                <div class="col-md-6">
                                    <input id="necessitem" type="text" class="form-control" name="necessitem" value="{{ old('necessitem') }}" required>

                                    @if ($errors->has('necessitem'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('necessitem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('proveidor') ? ' has-error' : '' }}">
                                <label for="proveidor" class="col-md-4 control-label">Proveidor</label>

                                <div class="col-md-6">
                                    <input id="proveidor" type="text" class="form-control" name="proveidor" value="{{ old('proveidor') }}" required>

                                    @if ($errors->has('proveidor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('proveidor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('referencia_proveidor') ? ' has-error' : '' }}">
                                <label for="referencia_proveidor" class="col-md-4 control-label">Referencia proveidor</label>

                                <div class="col-md-6">
                                    <input id="referencia_proveidor" type="text" class="form-control" name="referencia_proveidor" value="{{ old('referencia_proveidor') }}" required>

                                    @if ($errors->has('referencia_proveidor'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('referencia_proveidor') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Registra
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Llistat de productes</div>
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <table class="table-striped table-hover">
                                <tr>
                                    <th>Localitzacio</th>
                                    <th>Nom</th>
                                    <th>Stock Inici</th>
                                    <th>Stock Final</th>
                                    <th>Necessitem</th>
                                    <th>Proveidor</th>
                                    <th>Referencia proveidor</th>
                                </tr>
                            @foreach($productes as $item)
                                <!--?php dump($item->quantitat_actual*100/$item->quantitat_inicial<($item->percentatge_minim)) ?-->
                                @if (($item->stock_final*100/$item->stock_inici)<($item->percentatge_minim))
                                    <tr style="background-color: #F2DEDE">
                                @else
                                    <tr>
                                @endif
                                    <td>
                                        {{$item->localitzacio}}
                                    </td>
                                    <td>
                                        {{$item->nom}}
                                    </td>
                                    <td>
                                        {{$item->stock_inici}}
                                    </td>
                                    <td>
                                        {{$item->stock_final}}
                                    </td>
                                    <td>
                                        {{$item->necessitem}}
                                    </td>
                                    <td>
                                        {{$item->proveidor}}
                                    </td>
                                    <td>
                                        {{$item->referencia_proveidor}}
                                    </td>

                                    @if (Auth::user()->getRol()=='professor')
                                    <td>
                                        {{ Form::open(array('url' => 'editprod/' . $item->id, 'class' => 'pull-right')) }}
                                        {{ csrf_field() }}
                                        {{ Form::hidden('_method', 'GET') }}
                                        {{ Form::submit('Edita', array('class' => 'btn btn-primary')) }}
                                        {{ Form::close() }}
                                    </td>
                                    <td>
                                        {{ Form::open(array('url' => 'deleteprod/' . $item->id, 'class' => 'pull-right')) }}
                                        {{ csrf_field() }}
                                            {{ Form::hidden('_method', 'DELETE') }}
                                            {{ Form::submit('Elimina', array('class' => 'btn btn-primary')) }}
                                        {{ Form::close() }}
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>

                        <!--?php dump($material) ?-->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
