@extends('layouts.app')

@section('content')

<div class="container fluid d-flex align-items-center border mb-2 bg-light">
  @foreach ($tournaments as $tournament)
  <h1>{{$tournament->name}}</h1>
  @endforeach
</div>

<div class="container fluid d-flex align-items-center border mb-2 bg-light">
  <div class="container">
    <div class="row mt-2 mb-2">
      <div class="col  p-1">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createTeam">Add Time na
          competição</button>
      </div>
    </div>
  </div>
</div>

<div class="container fluid d-flex align-items-center border bg-light">
  <div class="card-body table-responsive p-0 mt-3">
    <h3>Times na competição</h3>
    <table class="table table-hover table-ligth">
      <thead>
        <tr>
          <th scope="col">Emblema</th>
          <th scope="col">Time</th>
          <th scope="col">Abreviação</th>
          <th scope="col">Ver</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($teams_tournament as $team_tournament)
        @foreach ($teams as $team)
        @if ($team_tournament->team_id == $team->id)
        <tr>
          <th scope="row"><img src="{{$team->emblem}}" width="24" height="30"></th>
          <td>{{$team->name}}</td>
          <td>{{$team->abreviation}}</td>
          <td><a href="{{Route('indexTeam', $team->id)}}"><button type="button" class="btn btn-dark">Ver</button></a>
          </td>
        </tr>
        @endif
        @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Modal Team-->
<div class="modal fade" id="createTeam" tabindex="-1" role="dialog" aria-labelledby="createTeamtLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Time</h5>
      </div>
      <div class="modal-body">
        <h5>Criar time</h5>
        <div class="form-group">
          <form action="{{Route('createTeam', $tournament->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" name="nameTeam" placeholder="Nome do time">
            <span>Emblema</span>
            <div class="form-group">
              <input type="file" class="form-control-file" name="emblemTeam">
            </div>
            <input type="text" maxlength="3" class="form-control mt-1" name="abreviationTeam" placeholder="Abreviação">
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Criar</button>
            </div>
          </form>
        </div>
        <h5>Criar time</h5>
        <div class="form-group">
          <form action="{{Route('includeTeam', $tournament->id)}}" method="POST" id="teamForm">
            @csrf
            <select class="form-select" name="teamSelect">
              @foreach ($teams as $team)
              <option value="{{$team->id}}">{{$team->name}}</option>
              @endforeach
            </select>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection