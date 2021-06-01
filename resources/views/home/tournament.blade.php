@extends('layouts.app')

@section('content')

<div class="container fluid d-flex align-items-center border mb-2 bg-light">
  <h1>{{$tournaments->name}}</h1>
</div>
@if ( $tournaments->teams->count() < $tournaments->number_teams)
  <div class="container fluid d-flex align-items-center border mb-2 bg-light">
    <div class="container">
      <div class="row mt-2 mb-2">
        <div class="col  p-1">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createTeam">Add Time
            na
            competição</button>
        </div>
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
              <form action="{{Route('createTeam', $tournaments->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" class="form-control" name="nameTeam" placeholder="Nome do time">
                <span>Emblema</span>
                <div class="form-group">
                  <input type="file" class="form-control-file" name="emblemTeam">
                </div>
                <input type="text" maxlength="3" class="form-control mt-1" name="abreviationTeam"
                  placeholder="Abreviação">
                <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Criar</button>
                </div>
              </form>
            </div>
            <h5>Criar time</h5>
            <div class="form-group">
              <form action="{{Route('includeTeam', $tournaments->id)}}" method="POST" id="teamForm">
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
  </div>
  @else


  <div class="container fluid d-flex align-items-center border mb-2 bg-light">
    <div class="container">
      <div class="row mt-2 mb-2">
        <div class="col  p-1">
          <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#createMatchs">Sortear
            playoffs</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Create Matchs-->
  <div class="modal fade" id="createMatchs" tabindex="-1" role="dialog" aria-labelledby="createMatchsLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sortear partidas</h5>
        </div>
        <div class="modal-body">
          <h5>Escolher dois times</h5>
          <div class="form-group">
            <form action="{{Route('createStats', $tournaments->id)}}" method="POST" id="teamForm">
              @csrf
              <span>Time 1</span>
              <select class="form-select" name="team1">
                @foreach ($tournaments->teams as $team)
                <option value="{{$team->pivot->id}}">{{$team->name}}</option>
                @endforeach
              </select>
              <span>Time 2</span>
              <select class="form-select" name="team2">
                @foreach ($tournaments->teams as $team)
                <option value="{{$team->pivot->id}}">{{$team->name}}</option>
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
  </div>

  @endif

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
          @foreach ($tournaments->teams as $team)
          <tr>
            <th scope="row"><img src="{{$team->emblem}}" width="24" height="30"></th>
            <td>{{$team->name}}</td>
            <td>{{$team->abreviation}}</td>
            <td><a href="{{Route('indexTeam', $team->id)}}"><button type="button" class="btn btn-dark">Ver</button></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  @endsection