<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Connexion</h4>
      </div>
      <div class="modal-body">
        <div class="loginmodal-container">
          <p id="error-login" class="text-center"></p>
          {{ Form::open(array('url' => 'connexion', 'id' => 'form-login')) }}
            <span class="error"></span>
            {{ Form::text('username', old('username'), array('placeholder' => 'Identifiant')) }}
            @if($errors->has('username')) <span class="danger">{{$errors->first('username')}}</span> @endif
            <span class="error"></span>
            {{ Form::password('password', array('placeholder' => 'Mot de passe')) }}
            @if($errors->has('password')) <span class="danger">{{$errors->first('password')}}</span> @endif
            {{Form::checkbox('remember', 'remember')}}
            {{Form::label('remember', 'Rester connecté')}}
            {{ Form::submit('Connexion', array('class' => 'login loginmodal-submit')) }}
          {{ Form::close() }}
          <div class="login-help">
            <a href="#">Mot de passe oublié ?</a>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>