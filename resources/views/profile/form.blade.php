<div class="box">
    <div class="box-header"><h2>Modificar perfil</h2></div>
    <div class="row">
        <label>Nombre</label>
        <input type="text" name="name" value="{{$user->name}}">
    </div>
    <div class="row">
        <label>Apellidos</label>
        <input type="text" name="surnames"  value="{{$user->surname}}">
    </div>
    <div class="row">
        <label>Email</label>
        <input type="email" name="email"  value="{{$user->email}}">
    </div>
    <div class="form-group text-center">
        <button class="btn btn-success btn-submit">Guardar</button>
    </div>
</div>
